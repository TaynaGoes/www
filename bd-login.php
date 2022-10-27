<?php
    session_start();

    include_once('./app/controllers/conexao.php');

    $dados_formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados_formulario['input-submit-login'])) {
        var_dump($dados_formulario);

        $query_cliente = "SELECT email, senha, nome, cpf
                        FROM clientes 
                        WHERE email =:email 
                        LIMIT 1";

        $result_cliente = $conexao->prepare($query_cliente);
        $result_cliente->bindParam(':email', $dados_formulario['email'], PDO::PARAM_STR);

        $result_cliente->execute();

        if (($result_cliente) and ($result_cliente->rowCount() != 0)) {
            $row_cliente = $result_cliente->fetch(PDO::FETCH_ASSOC);
            
            if ($dados_formulario['senha'] == $row_cliente['senha']) {
                $_SESSION['cpf'] = $row_cliente['cpf'];
                $_SESSION['nome'] = $row_cliente['nome'];

                header("Location: index.php"); 
            } else {
                $_SESSION['msg_erro'] = "Senha Incorreta!";
            }
        } 
        else {
        }
    }

    if (isset($_SESSION['msg_erro'])) {
        echo $_SESSION['msg_erro'];
        unset($_SESSION['msg_erro']);
    }

    // '".$dados_formulario['email']."'
