<?php
    $query_produtos = "SELECT
                            p.id As ProdutoId, 
                            p.nome As ProdutoNome,
                            p.produto_categorias_id As CategoriaId, 
                            p.preco As PrecoProduto,
                            p.imagem As ProdutoImagem,
                            cp.nome As ProdutoCategoriaNome
                        FROM produtos As p
                        INNER JOIN produto_categorias cp ON cp.id = p.produto_categorias_id
                        ORDER BY p.nome ASC";


    $result_produtos = $conexao->prepare($query_produtos);
    $result_produtos->execute();
    $row_produtos = $result_produtos->fetch(PDO::FETCH_ASSOC);
    extract($row_produtos);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="box-select">
                <span class="span-filter">Filtrar por Categoria: </span>
                <select class=" custom-select categoria-produto" placeholder="Categoria">
                    <?php while ($row_produtos = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_produtos); ?>
                        <option value=""><?= $ProdutoCategoriaNome ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="box_products-list">
                <li class="product_card-item" id="card">
                    <div class="product-box-img">
                        <img class='product-picture' src="./imagens/produtos/<?= $ProdutoImagem ?>" class="img-film" />
                    </div>
                    <div class="card-details">
                        <h3 class="product-name"><?= $ProdutoNome ?></h3>
                        <div class="bottom-row">
                            <p class="price">R$<?= $PrecoProduto ?>,00</p>
                        </div>
                        <div class="qty">
                            <input type="text" name="qty" maxlength="12" value="1" title="" class="input-text" />
                            <div class="qty_inc_dec">
                                <i class="increment" onclick="incrementQty()">+</i>
                                <i class="decrement" onclick="decrementQty()">-</i>
                            </div>
                        </div>
                        <div class="product-categoria">
                            <span><?= $ProdutoCategoriaNome ?></span>
                        </div>
                    </div>
                </li>

            </ul>
            <div class="box_btn-next">
                <div class="button_click-next" onclick="selecionarAbaNavegacao()"><img src="./imagens/arquivos-site/arrow-next.png" alt=""></div>
            </div>

        </div>
    </div>
</div>