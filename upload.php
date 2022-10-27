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
    
    <h2>Upload</h2>
    <a href="./listar.php">Listar</a>

    <?php
        // $dados = todas informa��es do input 
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        // Verificar se btn foi clicado
        if(!empty($dados['Salvar'])){
            $arquivo = $_FILES['imagem_filme'];
            
            echo '<pre>';
            var_dump($dados);
            echo '</pre>';
            echo '<pre>';
            var_dump($arquivo);
            echo '</pre>';

            // Query para database
            $query_filmes = "INSERT INTO filmes 
                            (`categoria_id`, `nome`, `sinopse`, `duracao`, `imagem`)
                            VALUES 
                            (:categoria_filme, :nome_filme, :sinopse_filme, :duracao_filme, :imagem_filme)";

            $cad_filme = $conexao->prepare($query_filmes);
            $cad_filme->bindParam('categoria_filme',$dados['categoria_filme']);
            $cad_filme->bindParam('nome_filme',$dados['nome_filme']);
            $cad_filme->bindParam('sinopse_filme',$dados['sinopse_filme']);
            $cad_filme->bindParam('duracao_filme',$dados['duracao_filme']);
            $cad_filme->bindParam('imagem_filme',$arquivo['name']);
            $cad_filme->execute();
            
            // verificar se foi cadastrado com sucesso
            if($cad_filme->rowCount()){

                if((isset($arquivo['name'])) and (!empty(['name']))){

                    $diretorio = "./imagens/";

                    $arquivo['name'];
                    move_uploaded_file($arquivo['tmp_name'], $diretorio . $arquivo['name']);
                    echo "img e cadastro deu bom";

                } else{

                }

            }else{
                echo"ih rapaz";
            }
        }
    ?>

    <form action="" method="POST" action enctype="multipart/form-data">
        <input type="number" name="categoria_filme" id="categoria_filme" placeholder="Categoria do filme"> <br> <br>
        <input type="text" name="nome_filme" id="nome_filme" placeholder="Nome do filme"> <br> <br>
        <input type="text" name="sinopse_filme" id="sinopse_filme" placeholder="Sinopse do filme"> <br> <br>
        <input type="text" name="duracao_filme" id="duracao_filme" placeholder="Dura��o do filme"> <br> <br>
        <input type="file" name="imagem_filme" id="imagem_filme" > <br>
        <input type="submit" value="Cadastrar" name="Salvar">
    </form>

</body>
</html>