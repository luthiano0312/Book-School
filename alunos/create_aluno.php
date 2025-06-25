
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        
        require "../connection.php";

        $nome = trim($_POST["nome"]) ?? "";
        $email = trim($_POST["email"]) ?? "";
        $senha = trim($_POST["senha"]) ?? "";
        $serie = trim($_POST["serie"]) ?? "";
        $matricula = trim($_POST["matricula"]) ?? "";

        $stmt = $conn->prepare("SELECT * FROM alunos WHERE EMAIL = :email;");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($nome && $email && $senha && $serie && $matricula) {
            if (!$usuario) {
                $hash = password_hash($senha,PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO alunos (NOME, EMAIL, SENHA, SERIE, MATRICULA, ID_ESCOLA) VALUES (:nome, :email, :senha, :serie, :matricula, :id);");  
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":senha", $hash);
                $stmt->bindValue(":matricula", $matricula);
                $stmt->bindValue(":serie", $serie);
                $stmt->bindValue(":id", $_SESSION["id_escola"]);

                if ($stmt->execute()) {
                    header("location: dashboard.php?sucesso=Cadastrado com sucesso");
                } else {
                    header("location: form_create_aluno.php?erro=Erro no cadastro");
                }
            } else {
                header("location: form_create_aluno.php?erro=Esse email já está sendo usado"); 
            }  
        } else {
            header("location: form_create_aluno.php?erro=Por favor preencha os campos");
        }
    ?>
    <a href="dashboard.php">voltar</a>
</body>
</html>