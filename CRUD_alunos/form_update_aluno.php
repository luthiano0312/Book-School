
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/update_sytle.css">

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
    <form action="update_aluno.php" method="post" id="form">
        <input type="hidden" name="id_aluno" value="<?php echo $_GET["id_aluno"];?>">
        <div id="containerTitle">
            <p id="title">Atualizar cadastro</p>
        </div>

        <div class="containerInput">
            <label for="nome">Nome </label>
            <input type="text" name="nome" id="nome" class="input" value="<?php echo $_GET["nome"];?>">
        </div>

        <div class="containerInput">
            <label for="email">Email </label>
            <input type="email" name="email" id="email" class="input" value="<?php echo $_GET["email"];?>">
        </div>
        
        <div id="containerButtons">
            <a href="dashboard.php" id="cancelar">cancelar</a>
            <input type="submit" value="atualizar" id="atualizar">
        </div>
    </form>
</body>
</html>