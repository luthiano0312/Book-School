<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create_livro.php" method="post">

        <h1>Cadastrar Livro</h1>

        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" required>

        <br><br>

        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor" required>

        <br><br>

        <label for="ano_publicacao">Ano de Publicação: </label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" min="1000" max="9999" required>

        <br><br>

        <label for="genero">Gênero: </label>
        <input type="text" name="genero" id="genero">

        <br><br>

        <label for="editora">Editora: </label>
        <input type="text" name="editora" id="editora">

        <br><br>

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>