
<?php
    session_start();

    if (!$_SESSION["id_user"]) {
        header("location: login.php");
        exit;
    }

    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>pagina protegida</h1>
    <form action="index.php" method="post">
        <input type="submit" value="voltar">
    </form>
</body>
</html>