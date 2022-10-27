<?php
    include_once('./app/controllers/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<body>

    <h2>Listar</h2>

    <?php
    $query_filmes = "SELECT * 
                        FROM filmes
                        ORDER BY id DESC";
    $result_filmes = $conexao->prepare($query_filmes);
    $result_filmes->execute();

    while ($row_filmes = $result_filmes->fetch(PDO::FETCH_ASSOC)) {
        // var_dump($row_filmes);
        extract($row_filmes);

        echo "ID:  $id <br>";
        echo "Categoria:  $categoria_id <br>";
        echo "Nome:  $nome <br>";
        echo "Foto: " . $row_filmes['imagem'] . "<br>";
        echo "<img src='imagens/$id" . $row_filmes['imagem'] . "' width='150'>";
        echo "<hr>";
    }
    ?>
    <section>
        <ul class="container-films">
            <li class="box-content_films">
                <div class="content-films_img">
                    <a href="#"><img src="https://i.ibb.co/ThPNnzM/blade-runner.jpg" class="img-film" /></a>
                </div>
                <div class="ticket-container">
                    <div class="ticket__content">
                        <h2 class="ticket__movie-title"></h2>
                        <p class="ticket__movie-slogan"></p>
                        <a href="#!" class="ticket__info">Sinopse</a>
                        <button class="ticket_button-buy">Adicionar</button>
                    </div>
                </div>
            </li>
            ?>
        </ul>
    </section>




</body>

</html>