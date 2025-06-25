<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar</title>

    <link rel="stylesheet" href="../assets/create_sytle.css">

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
    <form action="create_emprestimo.php" method="post" id="form">
        <div id="containerTitle">
            <p id="title">Emprestimo</p>
        </div>

        <div class="containerInput">
            <label for="email">Email </label>
            <input type="email" name="email" id="email" class="input">
        </div>

        <div class="containerInput">
            <label for="id_livro">Codigo do livro </label>
            <input type="number" name="id_livro" id="id_livro" class="input">
        </div>

        <div class="containerInput">
            <label for="data_emprestimo">Data do emprestimo </label>
            <input type="date" name="data_emprestimo" id="data_emprestimo" class="input">
        </div>

        <div class="containerInput">
            <label for="data_devolucao">Data da devolução </label>
            <input type="date" name="data_devolucao" id="data_devolucao" class="input">
        </div>
        
        <div id="containerButtons">
            <a href="dashboard_emprestimos.php" id="cancelar">cancelar</a>
            <input type="submit" value="cadastrar" id="cadastrar">
        </div>
    </form>
    
</body>
</html>