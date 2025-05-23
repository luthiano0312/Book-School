<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        session_start();

        if (isset($_SESSION["erro"])) {
            echo $_SESSION["erro"];
            $_SESSION["erro"] = "";
        }

        if (isset($_SESSION["id_user"])) {
            header("location: protect.php");
        }
    ?>
    <form action="authenticate.php" method="post" id="loginForm">
        <h1 id="title">login</h1>

        <div class="containerInput">
            <label for="email" class="label">Email: </label>    
            <input type="email" name="email" id="email" class="input">
        </div>

        <div class="containerInput">
            <label for="password" class="label">Senha: </label>
            <input type="password" name="password" id="password" class="input">
        </div>

        <div class="containerInput">
            <input type="submit" value="Entrar" id="button" class="input">
        </div>
    </form>
</body>
</html>