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

        $nome = $_POST["nome"] ?? "";
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";

        $stmt = $conn->prepare("SELECT * FROM alunos WHERE EMAIL = :email;");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($nome && $email && $senha) {
            if (!$usuario) {
                $hash = password_hash($senha,PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO alunos (NOME, EMAIL, SENHA, ID_ESCOLA) VALUES (:nome, :email, :senha, :id);");  
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":senha", $hash);
                $stmt->bindValue(":id", $_SESSION["id_escola"]);

                if ($stmt->execute()) {
                    header("location: form_create_aluno.php?sucesso=Cadastrado com sucesso");
                } else {
                    header("location: form_create_aluno.php?erro=Erro no cadastro");
                }
            } else {
                header("location: form_create_aluno.php?erro=Usuário já existente"); 
            }  
        } else {
            header("location: form_create_aluno.php?erro=Preencha os campos");
        }
    ?>
    <a href="dashboard.php">voltar</a>
</body>
</html>
