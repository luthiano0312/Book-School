<?php
    require "connection.php";

    session_start();

    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if (!$password || !$email) {
        $_SESSION["erro"] = "prencha os campos";
        header("location: login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM LEITORES WHERE EMAIL = :email;");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["id_user"] = $user["id"];
        header("location: protect.php");
        exit;
    } else {
        $_SESSION["erro"] = "senha ou email incorretos";
        header("location: login.php");
        exit;
    }

?>