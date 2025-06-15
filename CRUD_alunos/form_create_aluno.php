<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/create.css">

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
    <form action="create_aluno.php" method="post" id="form">
        <div id="containerTitle">
            <p id="title">Cadastrar aluno</p>
        </div>

        <div class="containerInput">
            <label for="nome">Nome </label>
            <input type="text" name="nome" id="nome" class="input">
        </div>

        <div class="containerInput">
            <label for="email">Email </label>
            <input type="email" name="email" id="email" class="input">
        </div>

        <div class="containerInput">
            <label for="senha">Senha </label>
            <input type="password" name="senha" id="senha" class="input">
        </div>
        
        <div id="containerButtons">
            <a href="dashboard.php" id="cancelar">cancelar</a>
            <input type="submit" value="cadastrar" id="cadastrar">
        </div>
    </form>
    
</body>
</html>