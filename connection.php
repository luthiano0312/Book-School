<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=bookschool;charset=utf8mb4","root","aluno");
    } catch (PDOException $e) {
        echo "erro: " . $e->getmessage();
    }
?>