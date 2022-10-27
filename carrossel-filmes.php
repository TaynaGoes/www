<?php
include_once('./app/controllers/conexao.php');

$query_filmes = "SELECT
                        F.id As FilmeId, 
                        F.nome As FilmeNome,
                        F.filme_categorias_id As CategoriaId,
                        F.capa As FilmeImagem,
                        F.faixa_etaria As FilmeClassificacao,
                        F.audio As FilmeAudio,
                        F.ano As FilmeAno,
                        C.nome As CategoriaNome
                    FROM filmes As F
                    INNER JOIN filme_categorias C ON C.id = F.filme_categorias_id
                    ORDER BY F.id DESC";

$result_filmes = $conexao->prepare($query_filmes);
$result_filmes->execute();

?>

    <section>
        <ul class="container-films">
            <?php while ($row_filme = $result_filmes->fetch(PDO::FETCH_ASSOC)) {extract($row_filme); ?>
                    <li class="box-content_films">
                        <div class="content-films_img">
                            <a href="selecao-etapas.php?id=<?= $FilmeId ?>"><img src="./imagens/filmes/<?= $FilmeImagem ?>" class="img-film" /></a>
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
                                <a href="selecao-etapas.php?id=<?= $FilmeId ?>">
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
