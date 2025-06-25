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
        
        $titulo = trim($_POST["titulo"]) ?? "";
        $autor = trim($_POST["autor"]) ?? "";
        $ano_publicacao = trim($_POST["ano_publicacao"]) ?? "";
        $genero = trim($_POST["genero"]) ?? "";
        $editora = trim($_POST["editora"]) ?? "";
        
        if ($titulo && $autor && $ano_publicacao && $genero && $editora) {

            $stmt = $conn->prepare("INSERT INTO livros (titulo, autor, ano_publicacao, genero, editora, id_escola) VALUES (:titulo, :autor, :ano, :genero, :editora, :id)");

            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":autor", $autor);
            $stmt->bindValue(":ano", $ano_publicacao);
            $stmt->bindValue(":genero", $genero);
            $stmt->bindValue(":editora", $editora);
            $stmt->bindValue(":id", $id_escola);

            if ($stmt->execute()) {
                header("location: dashboard_livros.php?sucesso=Cadastrado com sucesso");
            } else {
                header("location: form_create_livro.php?erro=Erro no cadastro");
            } 
        } else {
            header("location: form_create_livro.php?erro=Por favor preencha os campos");
        }
    ?>
    <a href="dashboard_livros.php">voltar</a>
</body>
</html>
