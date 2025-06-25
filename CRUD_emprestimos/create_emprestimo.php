<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        $id_bibliotecario = $_SESSION["id_usuario"];
        require "../connection.php";
        
        $email = trim($_POST["email"]) ?? "";
        $id_livro = trim($_POST["id_livro"]) ?? "";
        $data_emprestimo = trim($_POST["data_emprestimo"]) ?? "";
        $data_devolucao = trim($_POST["data_devolucao"]) ?? "";

        $stmt = $conn->prepare("SELECT * FROM alunos WHERE EMAIL = :email;");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $aluno = $stmt->fetch();

        $stmt = $conn->prepare("SELECT * FROM livros WHERE ID_LIVRO = :id");
        $stmt->bindValue(":id", $id_livro);
        $stmt->execute();
        $livro = $stmt->fetch();

        if ($email && $id_livro && $data_emprestimo && $data_devolucao) {
            if ($aluno) {
                if ($livro) {
                    
                    $stmt = $conn->prepare("INSERT INTO emprestimos (ID_ALUNO, ID_LIVRO, ID_BIBLIOTECARIO, DATA_EMPRESTIMO, DATA_DEVOLUCAO, STATUS) VALUES (:id_aluno, :id_livro,:id_bibliotecario, :data_emprestimo, :data_devolucao, :status);"); 
                    $stmt->bindValue(":id_aluno", $aluno["id_aluno"]);
                    $stmt->bindValue(":id_livro", $livro["id_livro"]);
                    $stmt->bindValue(":id_bibliotecario", $id_bibliotecario);
                    $stmt->bindValue(":data_emprestimo", $data_emprestimo);
                    $stmt->bindValue(":data_devolucao", $data_devolucao);
                    $stmt->bindValue(":status", "ativo");

                    if ($stmt->execute()) {
                        header("location: dashboard_emprestimos.php?sucesso=Cadastrado com sucesso");
                    } else {
                        header("location: form_create_emprestimo.php?erro=Erro no cadastro");
                    }
                } else { 
                    header("location: form_create_emprestimo.php?erro=livro não existente,verifique se o livro está cadastrado");
                }
            } else {
                header("location: form_create_emprestimo.php?erro=Email não existente,verifique se o aluno está cadastrado"); 
            }
            
        } else {
            header("location: form_create_emprestimo.php?erro=Por favor preencha os campos");
        }
    ?>
    <a href="dashboard.php">voltar</a>
</body>
</html>
