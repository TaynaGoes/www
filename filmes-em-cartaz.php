<?php
    include_once('./app/controllers/conexao.php');

    $query_filmes = "SELECT
                            F.id As FilmeId, 
                            F.nome As FilmeNome,
                            F.filme_categorias_id As CategoriaId,
                            F.capa As FilmeImagem,
                            F.faixa_etaria As FilmeClassificacao,
                            F.audio As FilmeAudio
                            F.ano As FilmeAno,
                            C.nome As CategoriaNome

                        FROM filmes As F
                        INNER JOIN filme_categorias C ON C.id = F.filme_categorias_id
                        ORDER BY F.id DESC";

    $result_filmes = $conexao->prepare($query_filmes);
    $result_filmes->execute();
?>

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">   
            <title>CINETEC - Cinema</title>
            <link rel="stylesheet" href="./assets/css/styles.css">
            <!-- bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <!-- slick js -->
            <link rel="stylesheet" type=" text/css " href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
            <link rel="stylesheet" type=" text/css " href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">   
        </head>
    
    <body>

        <?php  include_once('header.php'); ?>    
   
        <section>
            <ul class="container-films">
                <?php while ($row_filme = $result_filmes->fetch(PDO::FETCH_ASSOC)) {extract($row_filme); ?>
                    <li class="box-content_films">
                        <div class="content-films_img">
                            <a href="selecao-etapas?id=<?= $FilmeId ?>"><img src="./imagens/filmes/<?= $FilmeImagem ?>" class="img-film" /></a>
                            <div class="movie-tags">
                                <div class="selo-rating">
                                    <div class="movie-rating rating-<?= $FilmeClassificacao ?>">
                                        <span><?= $FilmeClassificacao ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="categoria-position"><?= $CategoriaNome ?></span>
                        <div class="ticket-container">
                            <div class="ticket__content">
                                <h2 class="ticket__movie-title"><?= $FilmeNome ?></h2>
                                <a href="selecao-etapas?id=<?= $FilmeId ?>">
                                    <button class="ticket_button-buy">Adicionar</button>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </section>
    </body>
</html>