<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "../connection.php";

        $id_aluno = $_POST["id_aluno"] ?? "";
        $email = $_POST["email"] ?? "";
        $nome = $_POST["nome"] ?? "";

        $stmt = $conn->prepare("SELECT * FROM alunos WHERE email = :e");
        $stmt->bindValue(":e", $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if (!$usuario) {
            if ($id_aluno && $email && $nome) {
                $stmt = $conn->prepare("UPDATE alunos SET nome = :n, email = :e WHERE id_aluno = :id");
    
                $stmt->bindValue(":n", $nome);
                $stmt->bindValue(":e", $email);
                $stmt->bindValue(":id", $id_aluno);
        
                if($stmt->execute()) {
                    header("location: dashboard.php?sucesso=Atualizado com sucesso");
                } else {
                    header("location: form_update_aluno.php?erro=Erro na atualização");
                }
            } else {
                header("location: form_update_aluno.php?erro=Por favor preencha os campos&id_aluno=$id_aluno&email=$email&nome=$nome");
            }
        }else {
            header("location: form_update_aluno.php?erro=Email já cadastrado&id_aluno=$id_aluno&email=$email&nome=$nome");
        }
    ?>

    <a href="dashboard.php">voltar</a>  
</body>
</html>