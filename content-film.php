<?php
include_once('./app/controllers/conexao.php');

$id = $_GET["id"];

$query_filmes = "SELECT
                        F.id As FilmeId, 
                        F.categoria_id As CategoriaId, 
                        F.nome As FilmeNome,
                        C.nome As CategoriaNome,
                        F.imagem As FilmeImagem,
                        F.duracao As FilmeDuracao,
                        F.sinopse As FilmeSinopse
                    FROM filmes As F
                    INNER JOIN filme_categorias C
                    ON C.id = F.categoria_id
                    WHERE F.id = $id
                    ORDER BY F.id DESC";

$result_filmes = $conexao->prepare($query_filmes);
$result_filmes->execute();

$row_filme = $result_filmes->fetch(PDO::FETCH_ASSOC);

extract($row_filme);
?>

<section class="section-content-film">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container-info-film">
                    <div class="col-3 container-info-img">
                        <figure>
                            <img src="./imagens/<?= $FilmeImagem ?>" alt="">
                        </figure>
                    </div>
                    <div class="col-9 info-text-filme">
                        <h1><?= $FilmeNome ?></h1>
                        <span><?= $FilmeDuracao ?> min</span>
                        <span class="span-ator">Diretor</span>
                        <p><?= $FilmeSinopse ?></p>




                        <form action="" method="post" class="form-add-filme">
                            <!-- data -->
                            <select name="data-sessao" id="data-sessao" class="custom-select data-sessao" placeholder="Data">
                                <option value="27">27/09</option>
                                <option value="28">28/09</option>
                                <option value="29">29/09</option>
                            </select>
                            <!-- horario -->
                            <select name="horario-sessao" id="horario-sessao" class="custom-select horario-sessao" placeholder="Horários">
                                <option value="13">13:30</option>
                                <option value="14">14:45</option>
                                <option value="17">17:00</option>
                            </select>

                            <div class="">
                                <input type="radio" id="inteira" name="radio-group" checked>
                                <label for="inteira">Inteira</label>

                                <input type="radio" id="meia" name="radio-group">
                                <label for="meia">Meia Entrada</label>
                            </div>
                            <button class="addtocart">
                                <div class="pretext">
                                    <i class="fas fa-cart-plus"></i> adicionar ao carrinho
                                </div>

                                <div class="pretext done">
                                    <div class="posttext"><i class="fas fa-check"></i> ADDED</div>
                                </div>

                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>



<!--scripts bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- slick | jquery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
    $(".custom-select").each(function() {
        var classes = $(this).attr("class"),
            id = $(this).attr("id"),
            name = $(this).attr("name");
        var template = '<div class="' + classes + '">';
        template +=
            '<span class="custom-select-trigger">' +
            $(this).attr("placeholder") +
            "</span>";
        template += '<div class="custom-options">';
        $(this)
            .find("option")
            .each(function() {
                template +=
                    '<span class="custom-option ' +
                    $(this).attr("class") +
                    '" data-value="' +
                    $(this).attr("value") +
                    '">' +
                    $(this).html() +
                    "</span>";
            });
        template += "</div></div>";

        $(this).wrap('<div class="custom-select-wrapper"></div>');
        $(this).hide();
        $(this).after(template);
    });

    $(".custom-select-trigger").on("click", function() {
        $("html").one("click", function() {
            $(".custom-select").removeClass("opened");
        });
        $(this).parents(".custom-select").toggleClass("opened");
        event.stopPropagation();
    });
    $(".custom-option").on("click", function() {
        $(this)
            .parents(".custom-select-wrapper")
            .find("select")
            .val($(this).data("value"));
        $(this)
            .parents(".custom-options")
            .find(".custom-option")
            .removeClass("selection");
        $(this).addClass("selection");
        $(this).parents(".custom-select").removeClass("opened");
        $(this)
            .parents(".custom-select")
            .find(".custom-select-trigger")
            .text($(this).text());
    });
</script>