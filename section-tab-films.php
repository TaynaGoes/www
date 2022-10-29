<style>
    .select-menu {
        max-width: 250px;
    }

    .span_btn-text {
        margin-top: 0 !important;
    }

    .select-menu .select-btn {
        display: flex;
        height: 55px;
        background: var(--clr-blue);
        padding: 20px;
        border-radius: 8px;
        align-items: center;
        cursor: pointer;
        justify-content: space-between;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .select-menu .options {
        position: absolute;
        width: 250px;
        overflow-y: auto;
        max-height: 295px;
        padding: 10px;
        margin-top: 1px;
        border-radius: 8px;
        background: var(--clr-blue);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation-name: fadeInDown;
        -webkit-animation-name: fadeInDown;
        animation-duration: 0.35s;
        animation-fill-mode: both;

    }

    .select-menu .options .option {
        width: 232px;
        display: flex;
        height: 30px;
        cursor: pointer;
        border-radius: 8px;
        align-items: center;
        padding: 5px;
    }

    .select-menu .options .option:hover {
        background: #023c5c;
    }

    .select-menu .options .option i {
        font-size: 25px;
        margin-right: 12px;
    }

    .select-menu .options .option .option-text {
        margin-top: 0;
        font-size: 18px;
        color: #333;
    }

    .select-btn i {
        font-size: 25px;
        transition: 0.3s;
    }

    .select-menu.active .select-btn svg {
        transform: rotate(-180deg);
    }

    .select-menu.active .options {
        display: block;
        opacity: 0;
        z-index: 10;
        animation-name: fadeInUp;
        animation-duration: 0.4s;
        animation-fill-mode: both;
    }

    @keyframes fadeInUp {
        from {
            transform: translate3d(0, 30px, 0);
        }

        to {
            transform: translate3d(0, 0, 0);
            opacity: 1;
        }
    }

    @keyframes fadeInDown {
        from {
            transform: translate3d(0, 0, 0);
            opacity: 1;
        }

        to {
            transform: translate3d(0, 20px, 0);
            opacity: 0;
        }
    }
</style>

<?php

$query_sessoes = "SELECT
                        se.id As sessaoID,
                        se.salas_id As sessaoSalaID,
                        se.filmes_id As sessaoFIlmeID,
                        se.data As sessaoData,
                        se.hora_inicio As sessaoHorario,
                        se.status As sessaoStatus,
                        sa.nome As salaNome,
                        fi.nome As filmeNome
                    FROM sessoes As se
                    INNER JOIN salas sa ON sa.id = se.salas_id
                    INNER JOIN filmes fi ON fi.id = se.filmes_id

                    ORDER BY se.data ASC";

$result_sessoes = $conexao->prepare($query_sessoes);
$result_sessoes->execute();

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="container-info-film">
                <div class="col-4 container-info-img">
                    <figure>
                        <img src="./imagens/filmes/<?= $FilmeImagem ?>" alt="<?= $FilmeImagem ?>">
                    </figure>
                </div>

                <div class="col-8 info-text-filme">
                    <h1><?= $FilmeNome ?> <span class="span-film-classificacao rating-<?= $FilmeClassificacao ?>"><?= $FilmeClassificacao ?></span></h1>
                    <p><?= $FilmeSinopse ?></p>
                    <div class="container-desc">
                        <div class="row-info-film">
                            <img src="./imagens/arquivos-site/timer.png" alt="">
                            <span class="span-film"><?= $FilmeDuracao ?> min</span>
                        </div>
                        <div class="row-info-film">
                            <img src="./imagens/arquivos-site/year.png" alt="">
                            <span class="span-film"><?= $FilmeAno ?></span>
                        </div>
                        <div class="row-info-film">
                            <img src="./imagens/arquivos-site/elenco.png" alt="">
                            <span class="span-film">Diretor: <?= $FilmeDiretor ?> </span>  
                        </div>
                        <div class="row-info-film">
                            <img src="./imagens/arquivos-site/elenco.png" alt="">
                            <span class="span-film">Atores: <?= $FilmeAtor1 ?>, <?= $FilmeAtor2 ?>, <?= $FilmeAtor3 ?> </span>  
                        </div>
                        <div class="row-info-film">
                            <img src="./imagens/arquivos-site/price.png" alt="">
                            <span class="span-film">Inteira: R$40,00 | Meia: R$20,00</span>  
                        </div>
                    </div>

                    <div class="select-menu">
                        <div class="select-btn">
                            <span class="span_btn-text">Sessões</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </div>
                        <ul class="options">
<?php
    foreach($result_sessoes as $row_sessoes) {extract($row_sessoes);
    $dateSessao = $sessaoData; 
    $dateSessaoFormat = date("l. d-m-y", strtotime($dateSessao));
?>
                            <li class="option">
                                <span class="option-text"><?= $dateSessaoFormat; ?> </span>
                            </li>
<?php } ?>
                        </ul>
                    </div>
                    
                    <div class="box_btn-next">
                        <div class="button_click-next" onclick="selecionarAbaNavegacao()"><img src="./imagens/arquivos-site/arrow-next.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<SCRipt>

    const containerSelect = document.querySelector(".select-menu"),
        selectBtn =  containerSelect.querySelector(".select-btn"),
        options =  containerSelect.querySelectorAll(".option"),
        sBtn_text =  containerSelect.querySelector(".span_btn-text");

    selectBtn.addEventListener("click", () =>
        containerSelect.classList.toggle("active")
    );

    options.forEach((option) => {
        option.addEventListener("click", () => {
            let selectedOption = option.querySelector(".option-text").innerText;
            sBtn_text.innerText = selectedOption;
            containerSelect.classList.remove("active");
        });
    });
</SCRipt>