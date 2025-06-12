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

        if ($id_aluno && $email && $nome) {
            $stmt = $conn->prepare("UPDATE alunos SET nome = :n, email = :e WHERE id_aluno = :id");

            $stmt->bindValue(":n", $nome);
            $stmt->bindValue(":e", $email);
            $stmt->bindValue(":id", $id_aluno);
    
            if($stmt->execute()) {
                echo "dados atualizados";
            } else {
                echo "erro na atualização";
            }
        } else {
            echo "Preencha os campos";
        }

    ?>

    <a href="dashboard.php">voltar</a>  
</body>
</html>