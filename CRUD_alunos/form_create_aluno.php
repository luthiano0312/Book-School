<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create_aluno.php" method="post">

        <h1>cadastre-se</h1>

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome">

        <br> <br>   

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <br> <br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha">

        <br> <br>

        <input type="submit" value="cadastrar">
    </form>
</body>
</html>