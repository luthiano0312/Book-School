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
        $escola = $_POST["escola"] ?? "";

        $stmt = $conn->prepare("SELECT * FROM ESCOLAS WHERE NOME = :escola");
        $stmt->bindValue(":escola", $escola);
        $stmt->execute();
        $escolaBD = $stmt->fetch();

        $stmt = $conn->prepare("SELECT * FROM alunos WHERE EMAIL = :email;");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $aluno = $stmt->fetch();

        if ($aluno) {
            if ($escolaBD) {
                if ($nome && $email && $senha) {
                    $hash = password_hash($senha,PASSWORD_DEFAULT);

                    $stmt = $conn->prepare("INSERT INTO alunos (NOME, EMAIL, SENHA, ID_ESCOLA) VALUES (:nome, :email, :senha, :id);");  
                    $stmt->bindValue(":nome", $nome);
                    $stmt->bindValue(":email", $email);
                    $stmt->bindValue(":senha", $hash);
                    $stmt->bindValue(":id", $escolaBD["id_escola"]);

                    if ($stmt->execute()) {
                        echo "dados cadastrados com sucesso";
                    } else {
                        echo "erro no cadastro";
                    }
                } else {
                    echo "prencha os campos";
                }  
            } else {
                echo "escola não encontrada";
            }
        } else {
            echo "aluno ja existente";
        }

    ?>

    <form action="index.php" method="post">
        <input type="submit" value="voltar">
    </form>
</body>
</html>
