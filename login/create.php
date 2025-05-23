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

        $name = $_POST["name"] ?? "";
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        if ($name && $email && $password) {
            $hash = password_hash($password,PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO LEITORES (NAME, EMAIL, PASSWORD) VALUES (:name, :email, :password);");

            $stmt->bindValue(":name", $name);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":password", $hash);

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
