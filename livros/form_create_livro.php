<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar</title>
    
    <link rel="stylesheet" href="../assets/create_sytle.css">

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
    <form action="create_livro.php" method="post" id="form">
        <div id="containerTitle">
            <p id="title">Cadastrar Livro</p>
        </div>

        <div class="containerInput">
            <label for="titulo">Titulo </label>
            <input type="text" name="titulo" id="titulo" class="input">
        </div>

        <div class="containerInput">
            <label for="autor">Autor </label>
            <input type="text" name="autor" id="autor" class="input">
        </div>

        <div class="containerInput">
            <label for="ano_publicacao">Ano de publicação</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" min="1000" max="9999" class="input">
        </div>

        <div class="containerInput">
            <label for="genero">Gênero </label>
            <input type="text" name="genero" id="genero" class="input">
        </div>

        <div class="containerInput">
            <label for="editora">Editora </label>
            <input type="text" name="editora" id="editora" class="input">
        </div>

        <div id="containerButtons">
            <a href="dashboard_livros.php" id="cancelar">cancelar</a>
            <input type="submit" value="cadastrar" id="cadastrar">
        </div>
    </form>
</body>
</html>