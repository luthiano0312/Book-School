
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update_aluno.php" method="post">

        <h1>cadastre-se</h1>

        <input type="hidden" name="id_aluno" value="<?php echo $_POST["id_aluno"];?>">

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" value="<?php echo $_POST["nome"];?>">

        <br> <br>   

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?php echo $_POST["email"];?>">

        <br> <br>

        <input type="submit" value="atualizar">
    </form>
</body>
</html>