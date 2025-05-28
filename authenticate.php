<?php
    require "connection.php";

    session_start();

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";
    
    if (!$senha || !$email) {
        $_SESSION["erro"] = "prencha os campos";
        header("location: login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM alunos WHERE EMAIL = :email;");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $aluno = $stmt->fetch();
    
    if ($aluno && password_verify($senha, $aluno["senha"])) {
        $_SESSION["id_aluno"] = $aluno["id_aluno"];
        header("location: protect.php");
        exit;
    } else {
        $_SESSION["erro"] = "senha ou email incorretos";
        header("location: login.php");
        exit;
    }

?>