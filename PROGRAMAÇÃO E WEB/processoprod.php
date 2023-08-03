<?php
// processa_cadastro_produtos.php

// Inclua o arquivo config.php usando require_once
require_once 'config.php';

$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter os dados do formulário
    $nomeprod = $_POST["nomeprod"];
    $descricao = $_POST["descricao"];
    $valorprod = $_POST["valorprod"];
    $idimg_fk = $_POST["idimg_fk"];

    // Preparar a consulta SQL para inserir o produto na tabela tb_produtos
    $query = "INSERT INTO tb_produtos (nomeprod, descricao, valorprod, idimg_fk) VALUES ($1, $2, $3, $4)";

    // Executar a consulta SQL com parâmetros para evitar injeção de SQL
    $result = pg_query_params($connection, $query, array($nomeprod, $descricao, $valorprod, $idimg_fk));

    // Verificar se a consulta foi executada com sucesso
    if ($result) {
        echo "<h2>Produto cadastrado com sucesso!</h2>";
        header("refresh:3;url=cadastro_produtos_cli.php");
    } else {
        echo "<h2>Falha ao cadastrar o produto. Verifique os dados informados.</h2>";
        
    }
}
?>
