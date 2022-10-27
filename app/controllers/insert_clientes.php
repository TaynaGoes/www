<?php
  session_start();

  include_once 'conexao.php';

  // Verifica se btn foi cadastrado se campos preenchidos, inserir o banco
  $btnCadCliente = filter_input(INPUT_POST, 'btnCadCliente', FILTER_SANITIZE_STRING);

  if ($btnCadCliente) {
    //Receber os dados do formulário
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    //Inserir no BD
    $result_cliente = "INSERT INTO clientes
                          (cpf, nome, sobrenome, celular, email, senha)
                        VALUES 
                          (:cpf, :nome, :sobrenome, :celular, :email, :senha)";

    $result_cliente = $conexao->prepare($result_cliente);
    $result_cliente->bindParam(':cpf', $cpf);
    $result_cliente->bindParam(':nome', $nome);
    $result_cliente->bindParam(':sobrenome', $sobrenome);
    $result_cliente->bindParam(':celular', $celular);
    $result_cliente->bindParam(':email', $email);
    $result_cliente->bindParam(':senha', $senha);

    if ($result_cliente->execute()) {
      $_SESSION['session_cliente'] = "<script>alert('Deu certo!');</script>";
    } 
    else {
      $_SESSION['session_cliente'] = "<p style='color:red;'>usuario nao cadastrado</p>";
      header("Location: /cinetec_cine/page-conta.php");
    }
  } 
  else {
    $_SESSION['session_cliente'] = "<p style='color:red;'>formulario errado</p>";
    header("Location: index.php");
  }
