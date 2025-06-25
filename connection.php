<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=bookschool;charset=utf8mb4","root","3128");
    } catch (PDOException $e) {
        echo "erro: " . $e->getmessage();
    }
?>