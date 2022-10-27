<?php
    $host = 'localhost';
    $dbname = 'cinetec';
    $user = 'root';
    $pass = 'dwHandle';

    try {
        $conexao = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
    } catch (PDOException $err) {
        echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
    }

    