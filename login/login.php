<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <form action="authenticate.php" method="post" id="loginForm">
        <h1 id="title" class="font-marope-blue">login</h1>

        <?php
            session_start();

            if (isset($_SESSION["erro"])) {?>
                <p class="font-marope-blue"><?php echo $_SESSION["erro"];?></p><?php
                $_SESSION["erro"] = "";
            }

            if (isset($_SESSION["id_aluno"])) {
                header("location: dashboard.php");
            }

            if (isset($_SESSION["sas"])) {?>
                <p class="font-marope-blue"><?php echo $_SESSION["sas"];?></p><?php
                
            }
        ?>

        <div class="containerInput">
            <label for="email" class="label font-marope-blue">Email: </label>    
            <input type="email" name="email" id="email" class="input font-marope-blue">
        </div>

        <div class="containerInput">
            <label for="senha" class="label font-marope-blue">Senha: </label>
            <input type="password" name="senha" id="senha" class="input font-marope-blue">
        </div>

        <div class="containerInput">
            <input type="submit" value="Entrar" id="button" class="font-marope-blue">
        </div>
    </form>
</body>
</html>