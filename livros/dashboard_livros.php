<?php 
    require "../protect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard livros</title>
    <link rel="stylesheet" href="../assets/dashboard_style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <header id="header"> 
        <div id="containerLogo">
            <svg id="imgLogo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="none">
                <path d="M9.92842 39.0625H45.3125V1.5625H9.83076C8.26104 1.56755 6.75704 2.19336 5.64707 3.30332C4.53711 4.41329 3.9113 5.91729 3.90625 7.48701V42.0166H3.90732C3.90732 42.0313 3.90625 42.0459 3.90625 42.0608C3.90625 45.5179 6.61934 48.4378 9.83076 48.4378H45.3125V45.3125H9.83076C8.36562 45.3125 7.03125 43.7626 7.03125 42.0605C7.03125 40.4355 8.35791 39.0625 9.92842 39.0625ZM35.1562 4.72002V21.5966L30.4297 17.4472L25.7812 21.5723V4.72002H35.1562ZM22.6562 4.6875V25.7812H25.7462L30.441 21.6153L35.186 25.7812H38.2812V4.6875H42.1875V35.9375H13.2891L13.2812 4.6875H22.6562ZM9.83076 4.6875H10.1562L10.1637 35.9375H9.92803C8.9119 35.9377 7.91342 36.2031 7.03125 36.7073V7.51143C7.02886 6.76597 7.32226 6.05 7.84709 5.52059C8.37192 4.99119 9.08531 4.69158 9.83076 4.6875Z" fill="white"/>
            </svg>

            <p id="BookSchool">Book <br> school</p>
        </div>   

        <div id="containerHeader">
            <p>Gerenciamento de livros</p>
        </div>

        <div id="containerLogo">
            <!-- div sem conteudo -->
        </div>
    </header>

    <div id="containerBody">
        <aside id="sideBar">
            <div id="containerSideBar">
                <a href="../CRUD_alunos/dashboard.php">Alunos</a>
                
                <a href="../CRUD_livros/dashboard_livros.php">Livros</a>
                
                <a href="../CRUD_emprestimos/dashboard_emprestimos.php">Emprestimos</a>
            </div>

            <form action="../login/logout.php" method="post">
                <input type="submit" value="sair" id="logout">
            </form>
        </aside>
        
        <main id="main">
            <div id="containerMain">
            <div id="containerCadastro">
                    <?php 
                        if (isset($_GET["sucesso"])) {?>
                            <p id="sucesso"><?php echo $_GET["sucesso"];?> </p><?php 
                            unset($_GET["sucesso"]);
                        }
                    ?>
                    <script>
                        setTimeout(() => {
                            const msg = document.querySelector('#sucesso');
                            if (msg) {
                            msg.style.display = 'none';
                            }
                        }, 5000);
                    </script>

                    <a href="form_create_livro.php" id="cadastrar">cadastrar</a>
                </div>

                <div id="tableWrapper">
                    <table id="table">
                        <thead id="tableHead">
                                <th>ID do livro</th>
                                <th>Ttulo</th>
                                <th>Autor</th>
                                <th>Ano de publicação</th>
                                <th>Genero</th>
                                <th>Quantidade</th>
                                <th></th>
                                <th></th>
                        </thead>

                        <tbody id="tableBody">
                            <?php

                            require_once "../connection.php";

                            $id_escola = $_SESSION["id_escola"] ?? "";

                            $stmt = $conn->prepare("SELECT * FROM livros WHERE id_escola = :id;");
                            $stmt->bindValue(":id", $id_escola);
                            if ($stmt->execute()) {
                                while ($rows = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                                    <tr>
                                        <td><?php echo $rows->id_livro ?></td>
                                        <td><?php echo $rows->titulo; ?></td>
                                        <td><?php echo $rows->autor; ?></td>
                                        <td><?php echo $rows->ano_publicacao; ?></td>
                                        <td><?php echo $rows->genero; ?></td>
                                        <td><?php echo $rows->editora; ?></td>
                                        <td>
                                            <form action="form_update_livro.php" method="get">
                                                <input type="hidden" name="id_livro" value="<?php echo $rows->id_livro; ?>">
                                                <input type="hidden" name="titulo" value="<?php echo $rows->titulo; ?>">
                                                <input type="hidden" name="autor" value="<?php echo $rows->autor; ?>">
                                                <input type="hidden" name="ano_publicacao" value="<?php echo $rows->ano_publicacao; ?>">
                                                <input type="hidden" name="genero" value="<?php echo $rows->genero; ?>">
                                                <input type="hidden" name="editora" value="<?php echo $rows->editora; ?>">
                                                <button type="submit" class="button">
                                                    <svg class="icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51 50" fill="none">
                                                        <path d="M43.6458 14.6668C44.4583 13.8543 44.4583 12.5001 43.6458 11.7293L38.7708 6.85429C38 6.04179 36.6458 6.04179 35.8333 6.85429L32 10.6668L39.8125 18.4793M6.75 35.9376V43.7501H14.5625L37.6042 20.6876L29.7917 12.8751L6.75 35.9376Z" fill="black"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form class="form" action="delete_livro.php" method="post" >
                                                <input type="hidden" name="id_livro" value="<?php echo $rows->id_livro; ?>">
                                                <button type="submit" class="button">
                                                    <svg class="icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51 50" fill="none">
                                                        <path d="M38 10.4166V39.5833C38 40.625 36.9583 41.6666 35.9167 41.6666H25.5H15.0833C14.0417 41.6666 13 40.625 13 39.5833V10.4166" stroke="black" stroke-width="4.16667" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8.83325 10.4166H42.1666" stroke="black" stroke-width="4.16667" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M21.3333 8.33328H29.6666M21.3333 18.7499V33.3333M29.6666 18.7499V33.3333" stroke="black" stroke-width="4.16667" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
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
                </div>
            </div>
        </main>
    </div>
</body>
</html>