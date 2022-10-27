<?php
    $query_produtos = "SELECT
                            p.id As ProdutoId, 
                            p.nome As ProdutoNome,
                            p.produto_categorias_id As CategoriaId, 
                            p.preco As PrecoProduto,
                            p.imagem As ProdutoImagem,
                            c.nome As ProdutoCategoriaNome
                        FROM produtos As p
                        LEFT OUTER JOIN produto_categorias As c ON
                            p.produto_categorias_id = c.id
                        ORDER BY p.nome ASC";


    $result_produtos = $conexao->prepare($query_produtos);
    $result_produtos->execute();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="box-select">
                <span class="span-filter">Filtrar por Categoria: </span>
                <select class=" custom-select categoria-produto" placeholder="Categoria">      
          
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="box_products-list">
                <?php 
                    while ($row = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                ?>

                <li class="product_card-item" id="card_<?= $ProdutoId; ?>">
                    <div class="product-box-img">
                        <img class='product-picture' src="./imagens/produtos/<?= $ProdutoImagem ?>" class="img-film" />
                    </div>
                    <div class="card-details">
                        <h3 class="product-name"><?= $ProdutoNome ?></h3>
                        <div class="bottom-row">
                            <p class="price" id="price_<?= $ProdutoId; ?>">R$ <?= $PrecoProduto ?>,00</p>
                        </div>
                        <div class="qty">
                            <input type="text" name="qty_<?= $ProdutoId; ?>" maxlength="12" value="0" title="" class="input-text" />
                            <div class="qty_inc_dec">
                                <i class="increment" onclick="incrementQty(<?= $ProdutoId; ?>, <?= $PrecoProduto ?>)">+</i>
                                <i class="decrement" onclick="decrementQty(<?= $ProdutoId; ?>, <?= $PrecoProduto ?>)">-</i>
                            </div>
                        </div>
                        <div class="product-categoria">
                            <?php 
                                // Adiciona 'sem categoria' se voltar como nulo ou não declarado.
                                $temp_categoria_nome = 'SEM CATEGORIA';

                                if (isset($ProdutoCategoriaNome)) {
                                    if ($ProdutoCategoriaNome != NULL) {
                                        $temp_categoria_nome = $ProdutoCategoriaNome;
                                    }
                                }       

                                echo  '<span>'. $temp_categoria_nome . '</span>';
                            ?>
                        </div>
                    </div>
                </li>

                <?php } ?>
            </ul>
            <div class="box_btn-next">
                <div class="button_click-next" onclick="selecionarAbaNavegacao()"><img src="./imagens/arquivos-site/arrow-next.png" alt=""></div>
            </div>

        </div>
    </div>
</div>