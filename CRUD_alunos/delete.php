<?php 

    require "../connection.php";

    $id_aluno = $_POST["id_aluno"] ?? "";
    if ($id_aluno) {
        $stmt = $conn->prepare("DELETE FROM alunos WHERE id_aluno = :id");
        $stmt->bindValue(":id", $id_aluno);
    
        if ($stmt->execute()) {
            header("location: dashboard.php");
        }else {
            echo "deu errado";
        }
    }
    
?>