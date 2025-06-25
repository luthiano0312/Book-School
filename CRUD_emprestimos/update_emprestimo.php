<?php 
    require_once "../connection.php";
    session_start();
    $id_livro = trim($_GET["id_livro"]) ?? "";
    $id_aluno = trim($_GET["id_aluno"]) ?? "";
    $id_emprestimo = trim($_GET["id_emprestimo"]) ?? "";
    $nomeAluno = trim($_GET["aluno"]) ?? "";
    $nomeLivro = trim($_GET["livro"]) ?? "";
    $id_bibliotecario = $_SESSION["id_usuario"];
    $data_emprestimo = trim($_GET["data_emprestimo"]) ?? "";
    $data_devolucao = trim($_GET["data_devolucao"]) ?? "";
    $status = trim($_GET["status"]) ?? "";

    $stmt = $conn->prepare("SELECT * FROM alunos WHERE nome = :n");
    $stmt->bindValue(":n", $nomeAluno);
    $stmt->execute();
    $aluno = $stmt->fetch();

    $stmt = $conn->prepare("SELECT * FROM livros WHERE titulo = :t");
    $stmt->bindValue(":t", $nomeLivro);
    $stmt->execute();
    $livro = $stmt->fetch();
    
    if ($nomeAluno && $nomeLivro && $data_devolucao && $data_emprestimo && $status && $id_emprestimo && $id_livro && $id_aluno) {
        if ($aluno && $livro) {
            $stmt = $conn->prepare("UPDATE emprestimos SET id_aluno = :id_aluno, id_livro = :id_livro, data_emprestimo = :data_emprestimo, data_devolucao = :data_devolucao, status = :status WHERE id_emprestimo = :id");
            $stmt->bindValue(":id_aluno", $aluno["id_aluno"]);
            $stmt->bindValue(":id_livro", $livro["id_livro"]);
            $stmt->bindValue(":data_emprestimo", $data_emprestimo);
            $stmt->bindValue(":data_devolucao", $data_devolucao);
            $stmt->bindValue(":status", $status);
            $stmt->bindValue(":id", $id_emprestimo);

            if ($stmt->execute()) {
                header("location: dashboard_emprestimos.php?sucesso=Atualizado com sucesso");
            }
        } else {
            header("location: form_update_emprestimo.php?erro=Aluno ou livro não encontrado&id_emprestimo=$id_emprestimo&id_livro=$id_livro&id_aluno=$id_aluno&&data_emprestimo=$data_emprestimo&data_devolucao=$data_devolucao&status=$status");
        }
    } else {
        
        header("location: form_update_emprestimo.php?erro=Preencha todos os campos&id_emprestimo=$id_emprestimo&id_livro=$id_livro&id_aluno=$id_aluno&&data_emprestimo=$data_emprestimo&data_devolucao=$data_devolucao&status=$status"); 
    }
    
?>