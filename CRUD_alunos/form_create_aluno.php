<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="../assets/create.css"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        if (isset($_GET["erro"])) {
            echo $_GET["erro"];
            unset($_GET["erro"]);
        }

        if (isset($_GET["sucesso"])) {
            echo $_GET["sucesso"];
            unset($_GET["sucesso"]);
        }
    ?>
    <form action="create_aluno.php" method="post">

        <h1>cadastrar</h1>

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
    <a href="dashboard.php">cancelar</a>
</body>
</html>