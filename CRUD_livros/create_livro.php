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
        $id_escola = $_SESSION["id_escola"];
        
        $titulo = $_POST["titulo"] ?? "";
        $autor = $_POST["autor"] ?? "";
        $ano_publicacao = $_POST["ano_publicacao"] ?? "";
        $genero = $_POST["genero"] ?? "";
        $editora = $_POST["editora"] ?? "";
        
        if ($titulo && $autor && $ano_publicacao && $genero && $editora) {

            $stmt = $conn->prepare("INSERT INTO livros (titulo, autor, ano_publicacao, genero, editora, id_escola) VALUES (:titulo, :autor, :ano, :genero, :editora, :id)");

            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":autor", $autor);
            $stmt->bindValue(":ano", $ano_publicacao);
            $stmt->bindValue(":genero", $genero);
            $stmt->bindValue(":editora", $editora);
            $stmt->bindValue(":id", $id_escola);

            if ($stmt->execute()) {
                echo "Dados cadastrados com sucesso";
            } else {
                echo "Erro no cadastro";
            } 
        } else {
            echo "Prencha os campos";
        }
    ?>
    <a href="dashboard_livros.php">voltar</a>
</body>
</html>
