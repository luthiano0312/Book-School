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

        $nome = $_POST["nome"] ?? "1";
        $email = $_POST["email"] ?? "1@1";
        $senha = $_POST["senha"] ?? "1";
        $escola = $_POST["escola"] ?? "EEEP";

        $stmt = $conn->prepare("SELECT * FROM ESCOLAS WHERE NOME = :escola");
        $stmt->bindValue(":escola", $escola);
        $stmt->execute();
        $escolaBD = $stmt->fetch();

        $stmt = $conn->prepare("SELECT * FROM bibliotecarios WHERE EMAIL = :email;");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if (!$usuario) {
            if ($escolaBD) {
                if ($nome && $email && $senha) {
                    $hash = password_hash($senha,PASSWORD_DEFAULT);

                    $stmt = $conn->prepare("INSERT INTO bibliotecarios (NOME, EMAIL, SENHA, ID_ESCOLA) VALUES (:nome, :email, :senha, :id);");  
                    $stmt->bindValue(":nome", $nome);
                    $stmt->bindValue(":email", $email);
                    $stmt->bindValue(":senha", $hash);
                    $stmt->bindValue(":id", $escolaBD["id_escola"]);

                    if ($stmt->execute()) {
                        header("location: login/login.php");
                    } else {
                        echo "Erro no cadastro";
                    }
                } else {
                    echo "Prencha os campos";
                }  
            } else {
                echo "Escola não encontrada";
            }
        } else {
            if ($usuario["email"] == "1@1") {
                header("location: login/login.php");
            }else {
                echo "Bilbiotecario ja existente";
            }
        }

    ?>

    <form action="index.php" method="post">
        <input type="submit" value="voltar">
    </form>
</body>
</html>
