<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atualizar</title>

    <link rel="stylesheet" href="../assets/update_sytle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php
        if (isset($_GET["erro"])) {?>
            <p id="erro"><?php echo $_GET["erro"];?> </p><?php 
            unset($_GET["erro"]);
        }
    ?>
    <form action="update_livro.php" method="post" id="form" style="height: 90vh;">

        <input type="hidden" name="id_livro" id="id_livro" value="<?php echo $_GET["id_livro"]?>">

        <div id="containerTitle">
            <p id="title">Atualizar cadastro</p>
        </div>

        <div class="containerInput">
            <label for="titulo">titulo </label>
            <input type="text" name="titulo" id="titulo" class="input" value="<?php echo $_GET["titulo"];?>">
        </div>

        <div class="containerInput">
            <label for="autor">autor </label>
            <input type="text" name="autor" id="autor" class="input" value="<?php echo $_GET["autor"];?>">
        </div>

        <div class="containerInput">
            <label for="ano_publicacao">Ano de Publicação </label>
            <input type="text" name="ano_publicacao" id="ano_publicacao" class="input" value="<?php echo $_GET["ano_publicacao"];?>">
        </div>

        <div class="containerInput">
            <label for="genero">Gênero </label>
            <input type="text" name="genero" id="genero" class="input" value="<?php echo $_GET["genero"];?>">
        </div>

        <div class="containerInput">
            <label for="editora">Editora </label>
            <input type="text" name="editora" id="editora" class="input" value="<?php echo $_GET["editora"];?>">
        </div>
        
        <div id="containerButtons">
            <a href="dashboard_livros.php" id="cancelar">cancelar</a>
            <input type="submit" value="atualizar" id="atualizar">
        </div>
    </form>
</body>
</html>