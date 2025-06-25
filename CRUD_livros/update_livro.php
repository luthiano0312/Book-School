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

        $id_livro = trim($_POST["id_livro"]) ?? "";
        $titulo = trim($_POST["titulo"]) ?? "";
        $autor = trim($_POST["autor"]) ?? "";
        $ano_publicacao = trim($_POST["ano_publicacao"]) ?? "";
        $genero = trim($_POST["genero"]) ?? "";
        $editora = trim($_POST["editora"]) ?? "";

        if ($id_livro && $titulo && $autor && $ano_publicacao && $genero && $editora) {
            $stmt = $conn->prepare("UPDATE livros SET titulo = :titulo, autor = :autor, ano_publicacao = :ano, genero = :genero, editora = :editora WHERE id_livro = :id");
        
            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":autor", $autor);
            $stmt->bindValue(":ano", $ano_publicacao);
            $stmt->bindValue(":genero", $genero);
            $stmt->bindValue(":editora", $editora);
            $stmt->bindValue(":id", $id_livro);
    
            if($stmt->execute()) {
                header("location: dashboard_livros.php?sucesso=Atualizado com sucesso");
            } else {
                header("location: form_update_aluno.php?erro=Erro na atualização&id_livro=$id_livro&titulo=$titulo&autor=$autor&ano_publicacao=$ano_publicacao&genero=$genero&editora=$editora&id_livro=$id_livro");
            }
        } else {
            header("location: form_update_livro.php?erro=Por favor preencha os campos&id_livro=$id_livro&titulo=$titulo&autor=$autor&ano_publicacao=$ano_publicacao&genero=$genero&editora=$editora&id_livro=$id_livro");
        }

    ?>

    <a href="dashboard_livros.php">voltar</a>  
</body>
</html>