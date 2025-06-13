<?php 
    require "../protect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>id do livro</th>
            <th>id da escola</th>
            <th>titulo</th>
            <th>autor</th>
            <th>ano_publicacao</th>
            <th>genero</th>
            <th>quantidade</th>

        </thead>

        <tbody>
            <?php

            require_once "../connection.php";

            $id_escola = $_SESSION["id_escola"] ?? "";

            $stmt = $conn->prepare("SELECT * FROM livros WHERE id_escola = :id;");
            $stmt->bindValue(":id", $id_escola);
            if ($stmt->execute()) {
                while ($rows = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?php echo $rows->id_livro ?></td>
                        <td><?php echo $rows->id_escola; ?></td>
                        <td><?php echo $rows->titulo; ?></td>
                        <td><?php echo $rows->autor; ?></td>
                        <td><?php echo $rows->ano_publicacao; ?></td>
                        <td><?php echo $rows->genero; ?></td>
                        <td><?php echo $rows->editora; ?></td>
                        <td>
                            <form action="form_update_livro.php" method="post">
                                <input type="hidden" name="id_livro" value="<?php echo $rows->id_livro; ?>">
                                <input type="hidden" name="titulo" value="<?php echo $rows->titulo; ?>">
                                <input type="hidden" name="autor" value="<?php echo $rows->autor; ?>">
                                <input type="hidden" name="ano_publicacao" value="<?php echo $rows->ano_publicacao; ?>">
                                <input type="hidden" name="genero" value="<?php echo $rows->genero; ?>">
                                <input type="hidden" name="editora" value="<?php echo $rows->editora; ?>">
                                <input type="submit" value="editar">
                            </form>
                        </td>
                        <td>
                            <form action="delete_livro.php" method="post">
                                <input type="hidden" name="id_livro" value="<?php echo $rows->id_livro; ?>">
                                <input type="submit" value="excluir">
                            </form>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "Escola não encontrada";
            }
            
            ?>

        </tbody>
    </table>
    
    <a href="form_create_livro.php">cadastrar</a>

    <form action="logout.php" method="post">
        <input type="submit" value="sair">
    </form>
</body>
</html>