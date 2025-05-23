<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
        <h1>cadastre-se</h1>
        <label for="name">Nome: </label>
        <input type="name" name="name" id="name">
        <br> <br>   
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br> <br>
        <label for="password">Senha: </label>
        <input type="password" name="password" id="password">
        <br> <br>
        <input type="submit" value="cadastrar-se">
    </form>

    <br>
    <hr>
    <br>
    
    <form action="login.php" method="post">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>