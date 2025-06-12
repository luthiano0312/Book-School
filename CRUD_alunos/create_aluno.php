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

        if (!$usuario) {
            if ($nome && $email && $senha) {
                $hash = password_hash($senha,PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO alunos (NOME, EMAIL, SENHA, ID_ESCOLA) VALUES (:nome, :email, :senha, :id);");  
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":senha", $hash);
                $stmt->bindValue(":id", $_SESSION["id_escola"]);

                if ($stmt->execute()) {
                    echo "Dados cadastrados com sucesso";
                } else {
                    echo "Erro no cadastro";
                }
            } else {
                echo "Prencha os campos";
            }  
        } else {
            echo "Aluno ja existente";
        }
    ?>
    <a href="dashboard.php">voltar</a>
</body>
</html>
