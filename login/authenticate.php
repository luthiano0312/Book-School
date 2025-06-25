<?php
    require "../connection.php";

    session_start();

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";
    
    if (!$senha || !$email) {
        $_SESSION["erro"] = "Prencha os campos";
        header("location: login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM bibliotecarios WHERE EMAIL = :email;");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $usuario = $stmt->fetch();
    
    if ($usuario && password_verify($senha, $usuario["senha"])) {
        $_SESSION["id_usuario"] = $usuario["id_bibliotecario"];
        $_SESSION["id_escola"] = $usuario["id_escola"];
        header("location: ../alunos/dashboard.php");
        exit;
    } else {
        $_SESSION["erro"] = "Senha ou email incorretos";
        header("location: login.php");
        exit;
    }

?>
<!-- cuidado luthiano vou tomar cuidado -->