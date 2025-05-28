
<?php
    session_start();

    if (!$_SESSION["id_aluno"]) {
        header("location: login.php");
        exit;
    }
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
    <form action="logout.php" method="post">
        <input type="submit" value="Sair">
    </form>
</body>
</html>