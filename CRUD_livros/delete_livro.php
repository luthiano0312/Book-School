<?php 

    require "../connection.php";

    $id_livro = $_POST["id_livro"] ?? "";
    if ($id_livro) {
        $stmt = $conn->prepare("DELETE FROM livros WHERE id_livro = :id");
        $stmt->bindValue(":id", $id_livro);
    
        if ($stmt->execute()) {
            header("location: dashboard_livros.php");
        }else {
            echo "Deu errado";
        }
    } else {
        echo "Livro não encontrado";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="dashboard_livros.php">voltar</a>
</body>
</html>