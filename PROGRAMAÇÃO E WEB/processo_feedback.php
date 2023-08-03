<?php
// Inclua o arquivo config.php usando require_once
require_once 'config.php';

$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter o comentário do formulário
    $comentario = $_POST["comentario"];

    // Verificar se o comentário não está vazio
    if (!empty($comentario)) {
        // Preparar a consulta SQL para inserir o feedback na tabela feedbacks
        $query = "INSERT INTO feedbacks (comentario, data_hora) VALUES ($1, NOW())";

        // Executar a consulta SQL com parâmetros para evitar injeção de SQL
        $result = pg_query_params($connection, $query, array($comentario));

        // Verificar se o feedback foi inserido com sucesso
        if ($result) {
            echo "<h2>Feedback enviado com sucesso! Obrigado por deixar sua opinião</h2>";
            header("refresh:3;url=home.php");
        } else {
            echo "<h2>Falha ao enviar o feedback. Tente novamente mais tarde.</h2>";
        }
    } else {
        echo "<h2>Por favor, preencha o campo de comentário antes de enviar o feedback.</h2>";
    }
}
?>
