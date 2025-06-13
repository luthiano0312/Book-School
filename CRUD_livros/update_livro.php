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

        $id_livro = $_POST["id_livro"] ?? "";
        $titulo = $_POST["titulo"] ?? "";
        $autor = $_POST["autor"] ?? "";
        $ano_publicacao = $_POST["ano_publicacao"] ?? "";
        $genero = $_POST["genero"] ?? "";
        $editora = $_POST["editora"] ?? "";

        if ($id_livro && $titulo && $autor && $ano_publicacao && $genero && $editora) {
            $stmt = $conn->prepare("UPDATE livros SET titulo = :titulo, autor = :autor, ano_publicacao = :ano, genero = :genero, editora = :editora WHERE id_livro = :id");
        
            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":autor", $autor);
            $stmt->bindValue(":ano", $ano_publicacao);
            $stmt->bindValue(":genero", $genero);
            $stmt->bindValue(":editora", $editora);
            $stmt->bindValue(":id", $id_livro);
    
            if($stmt->execute()) {
                echo "Dados atualizados";
            } else {
                echo "Erro na atualização";
            }
        } else {
            echo "Preencha os campos";
        }

    ?>

    <a href="dashboard_livros.php">voltar</a>  
</body>
</html>