<?php
    include_once('./app/controllers/conexao.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    
    <h2>Upload Produto</h2>
    <a href="./listar-produto.php">Listar</a>

    <?php
        // $dados = todas informa��es do input 
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        // Verificar se btn foi clicado
        if(!empty($dados['Salvar'])){
            $arquivoImg = $_FILES['imagem_produto'];
            echo '<pre>';
            var_dump($dados);
            echo '</pre>';
            echo '<pre>';
            var_dump($arquivoImg);
            echo '</pre>';

            // Query para database
            $query_produtos = "INSERT INTO produtos 
                            (`categoria_id`, `nome`, `imagem`, `preco`)
                            VALUES 
                            (:categoria_produto, :nome_produto, :imagem_produto, :preco_produto)";
            $cad_produtos = $conexao->prepare($query_produtos);
            $cad_produtos->bindParam('categoria_produto',$dados['categoria_produto']);
            $cad_produtos->bindParam('nome_produto',$dados['nome_produto']);
            $cad_produtos->bindParam('imagem_produto',$arquivoImg['name']);
            $cad_produtos->bindParam('preco_produto',$dados['preco_produto']);
            $cad_produtos->execute();
            
            // verificar se foi cadastrado com sucesso
            if($cad_produtos->rowCount()){

                if((isset($arquivoImg['name'])) and (!empty(['name']))){

                    $diretorio = "./imagens/produtos/";

                    $arquivoImg['name'];
                    move_uploaded_file($arquivoImg['tmp_name'], $diretorio . $arquivoImg['name']);
                    echo "img e cadastro deu bom";

                } else{

                }

            }else{
                echo"ih rapaz";
            }
        }
    ?>


    <form action="" method="POST" action enctype="multipart/form-data">
        <input type="number" name="categoria_produto" id="categoria_produto"> <br> <br>
        <input type="text" name="nome_produto" id="nome_filme" placeholder="nome Produto"> <br> <br>
        <input type="text" name="preco_produto" id="preco_produto" placeholder="preco_produto"> <br> <br>
        <input type="file" name="imagem_produto" id="imagem_produto" > <br>
        <input type="submit" value="Cadastrar" name="Salvar">
    </form>


</body>
</html>