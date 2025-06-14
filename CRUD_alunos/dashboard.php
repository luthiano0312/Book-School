<?php 
    require "../protect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/dashboard_alunos_style.css">
</head>
<body>
    <header id="header"> 
        <div id="containerLogo">Book school</div>   
        <div id="containerHeader">Gerenciamento de alunos</div>
    </header>

    <div id="containerBody">
        <aside id="sideBar">
            <a href="../CRUD_livros/dashboard_livros.php">Livros</a>

            <a href="../CRUD_alunos/dashboard.php">Alunos</a>

            <form action="logout.php" method="post">
                <input type="submit" value="sair">
            </form>
        </aside>
        <main id="main">
            <table>
                <thead>
                    <th>id do aluno</th>
                    <th>id da escola</th>
                    <th>nome</th>
                    <th>email</th>
                </thead>

                <tbody>
                    <?php

                    require_once "../connection.php";

                    $id_escola = $_SESSION["id_escola"];

                    $stmt = $conn->prepare("SELECT * FROM alunos WHERE id_escola = :id;");
                    $stmt->bindValue(":id", $id_escola);
                    if ($stmt->execute()) {
                        while ($rows = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?php echo $rows->id_aluno; ?></td>
                                <td><?php echo $rows->id_escola; ?></td>
                                <td><?php echo $rows->nome; ?></td>
                                <td><?php echo $rows->email; ?></td>
                                <td>
                                    <form action="form_update_aluno.php" method="post">
                                        <input type="hidden" name="id_aluno" value="<?php echo $rows->id_aluno; ?>">
                                        <input type="hidden" name="nome" value="<?php echo $rows->nome; ?>">
                                        <input type="hidden" name="email" value="<?php echo $rows->email; ?>">
                                        <input type="submit" value="editar">
                                    </form>
                                </td>
                                <td>
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="id_aluno" value="<?php echo $rows->id_aluno; ?>">
                                        <input type="submit" value="excluir">
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } ?>

                </tbody>
            </table>
            
            <a href="form_create_aluno.php">cadastrar</a>
        </main>
    </div>

</body>
</html>