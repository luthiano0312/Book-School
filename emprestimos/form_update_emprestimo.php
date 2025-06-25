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

        require "../connection.php";
        session_start();

        $id_escola = $_SESSION["id_escola"];
        
        $id_emprestimo = trim($_GET["id_emprestimo"]) ?? "";
        $id_aluno = trim($_GET["id_aluno"]) ?? "";
        $id_livro = trim($_GET["id_livro"]) ?? "";
        $id_bibliotecario = $_SESSION["id_usuario"];
        $data_emprestimo = trim($_GET["data_emprestimo"]) ?? "";
        $data_devolucao = trim($_GET["data_devolucao"]) ?? "";
        $status = trim($_GET["status"]) ?? "";

        $stmt = $conn->prepare("SELECT * FROM alunos WHERE id_escola = :id AND id_aluno = :id_aluno;");
        $stmt->bindValue(":id", $id_escola);
        $stmt->bindValue(":id_aluno", $id_aluno);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_OBJ);
        
        $stmt = $conn->prepare("SELECT * FROM livros WHERE id_escola = :id AND id_livro = :id_livro;");
        $stmt->bindValue(":id", $id_escola );
        $stmt->bindValue(":id_livro", $id_livro);
        $stmt->execute();
        $livro = $stmt->fetch(PDO::FETCH_OBJ);
            
    ?>
    <form action="update_emprestimo.php" method="get" id="form" style="height: 90vh;">

        <input type="hidden" name="id_livro" id="id_livro" value="<?php echo $id_livro;?>">
        <input type="hidden" name="id_emprestimo" id="id_emprestimo" value="<?php echo $id_emprestimo;?>">
        <input type="hidden" name="id_aluno" id="aluno" value="<?php echo $id_aluno;?>">

        <div id="containerTitle">
            <p id="title">Editar emprestimo</p>
        </div>

        <div class="containerInput">
            <label for="aluno">Aluno </label>
            <input type="text" name="aluno" id="aluno" class="input" value="<?php echo $aluno->nome;?>">
        </div>

        <div class="containerInput">
            <label for="livro">Livro </label>
            <input type="text" name="livro" id="livro" class="input" value="<?php echo $livro->titulo?>"></label>
        </div>

        <div class="containerInput">
            <label for="data_emprestimo">Data do emprestimo </label>
            <input type="date" name="data_emprestimo" id="data_emprestimo" class="input" value="<?php echo $data_emprestimo;?>"></label>
        </div>

        <div class="containerInput">
            <label for="data_devolucao">Data da devolução </label>
            <input type="date" name="data_devolucao" id="data_devolucao" class="input" value="<?php echo $data_devolucao;?>"></label>
        </div>

        <div class="containerInput">
            <label for="status">Status </label>
            <input type="text" name="status" id="status" class="input" value="<?php echo $status;?>"></label>
        </div>  

        <div id="containerButtons">
            <a href="dashboard_emprestimos.php" id="cancelar">cancelar</a>
            <input type="submit" value="atualizar" id="atualizar">
        </div>
    </form>
</body>
</html>