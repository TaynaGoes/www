<!DOCTYPE html>
<html lang="en">

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

        <style>
            .section-tabs {
                padding: 3vh 0;
                background-color: var(--background-second);
            }
        </style>
    </head>

<body>
    <?php
    include_once('header.php');
    include_once('./app/controllers/conexao.php');

    $id = $_GET["id"];

    $query_filmes = "SELECT
                        F.id As FilmeId, 
                        F.nome As FilmeNome,
                        F.sinopse As FilmeSinopse,
                        F.capa As FilmeImagem,
                        F.duracao As FilmeDuracao,
                        F.faixa_etaria As FilmeClassificacao,
                        F.audio As FilmeAudio,
                        F.ano As FilmeAno, 
                        F.diretor_principal As FilmeDiretor,
                        F.ator_principal_1 As FilmeAtor1,
                        F.ator_principal_2 As FilmeAtor2,
                        F.ator_principal_3 As FilmeAtor3,
                        F.filme_categorias_id As CategoriaId, 
                        C.nome As CategoriaNome
                    FROM filmes As F
                    INNER JOIN filme_categorias C ON C.id = F.filme_categorias_id 
    
                    WHERE F.id = $id
                    ORDER BY F.id DESC";

    $result_filmes = $conexao->prepare($query_filmes);
    $result_filmes->execute();

    $row_filme = $result_filmes->fetch(PDO::FETCH_ASSOC);

    extract($row_filme);
    ?>
    
    <section class="section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <input type="radio" id="filmes" name="tab-control" checked>
                        <input type="radio" id="poltronas" name="tab-control">
                        <input type="radio" id="bomboniere" name="tab-control">
                        <input type="radio" id="pagamento" name="tab-control">
                        <input type="radio" id="ingresso" name="tab-control">
                        <ul>
                            <li title="Filme">
                                <label for="filmes" role="button">
                                    <img src="./imagens/arquivos-site/movie.png" alt="">
                                    <span>Filmes</span>
                                </label>
                            </li>

                            <li title="Selecionar Poltronas">
                                <label for="poltronas" id="label_poltronas" role="button">
                                    <img src="./imagens/arquivos-site/seat.png" alt="">
                                    <span>Poltronas</span>
                                </label>
                            </li>

                            <li title="Produtos da Bomboniere">
                                <label for="bomboniere" role="button">
                                    <img src="./imagens/arquivos-site/popcorn.png" alt="">
                                    <span>Bomboniere</span>
                                </label>
                            </li>

            
                        </ul>

                        <div class="slider">
                            <div class="indicator"></div>
                        </div>

                        <!-- conteudo tabs -->
                        <form action="selecao-pagamento.php" method="post">
                            <div class="content">
                                <!-- filmes -->
                                <section class="section-content-film">
                                    <?php include("section-tab-films.php"); ?>
                                </section>
                                <!-- poltronas -->
                                <section class="section-poltronas">
                                    <?php include("section-tab-poltronas.php"); ?>
                                </section>
                                <!-- bomboniere -->
                                <section class="section-bomboniere">
                                    <?php include("section-tab-bomboniere.php"); ?>
                                </section>
                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>