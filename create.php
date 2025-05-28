<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "connection.php";

        $nome = $_POST["nome"] ?? "";
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";

        if ($nome && $email && $senha) {
            $hash = password_hash($senha,PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO alunos (NOME, EMAIL, SENHA) VALUES (:nome, :email, :senha);");

            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", $hash);

            if ($stmt->execute()) {
                echo "dados cadastrados com sucesso";
            } else {
                echo "erro no cadastro";
            }
        } else {
            echo "prencha os campos";
        }
    ?>

    <form action="index.php" method="post">
        <input type="submit" value="voltar">
    </form>
</body>
</html>
