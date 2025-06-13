<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update_livro.php" method="post">

        <h1>Cadastrar Livro</h1>

        <input type="hidden" name="id_livro" id="id_livro" value="<?php echo $_POST["id_livro"]?>" >

        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $_POST["titulo"]?>" required>

        <br><br>

        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor" value="<?php echo $_POST["autor"]?>" required>

        <br><br>

        <label for="ano_publicacao">Ano de Publicação: </label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" min="1000" max="9999" value="<?php echo $_POST["ano_publicacao"]?>" required>

        <br><br>

        <label for="genero">Gênero: </label>
        <input type="text" name="genero" id="genero" value="<?php echo $_POST["genero"]?>" >

        <br><br>

        <label for="editora">Editora: </label>
        <input type="text" name="editora" id="editora" value="<?php echo $_POST["editora"]?>" >

        <br><br>

        <input type="submit" value="atualizar">

    </form>
</body>
</html>