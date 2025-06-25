<?php 

    require "../connection.php";

    $id_emprestimo = $_GET["id_emprestimo"] ?? "";

    if ($id_emprestimo) {
        $stmt = $conn->prepare("DELETE FROM emprestimos WHERE id_emprestimo = :id");
        $stmt->bindValue(":id", $id_emprestimo);
    
        if ($stmt->execute()) {
            header("location: dashboard_emprestimos.php");
        }else {
            echo "deu errado";
        }
    } else {
        echo "deu asdasdasd";
    }
    
?>