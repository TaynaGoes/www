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
    $query_produtos = "SELECT
                            P.id As ProdutoId, 
                            P.categoria_id As CategoriaId, 
                            P.nome As ProdutoNome,
                            CP.nome As CategoriaNomeProduto,
                            P.imagem As ProdutoImagem,
                            P.preco As PrecoProduto
                        FROM produtos As P
                        INNER JOIN produto_categorias CP
                        ON CP.id = P.categoria_id
                        ORDER BY P.id DESC";
    

    $result_produtos = $conexao->prepare($query_produtos);
    $result_produtos->execute();

    while ($row_produtos = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row_produtos);
        extract($row_produtos);


        echo "ID:  $ProdutoId <br>";
        echo "Id da categoria do produto:  $CategoriaId <br>";
        echo "Nome do Produto: $ProdutoNome <br>";
        echo "Nome da Categoria do Produto:  $CategoriaNomeProduto <br>";
        echo "<img src='imagens/produtos/$ProdutoImagem ' width='150'>";
        echo "<hr>";
    }
    ?>
    <!-- <section>
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
    </section> -->




</body>

</html>