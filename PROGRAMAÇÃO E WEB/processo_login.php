<?php
// Dados de conexão ao banco de dados PostgreSQL
$host = 'localhost'; // Substitua pelo endereço do servidor do PostgreSQL, se necessário
$port = '5432';      // Porta padrão do PostgreSQL
$dbname = 'DIGASPARINI'; // Substitua pelo nome do banco de dados que você criou
$user = 'postgres';          // Substitua pelo usuário do PostgreSQL
$password = 'jesussalva22*';        // Substitua pela senha do PostgreSQL

// Conexão ao banco de dados
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connection) {
    die("Falha na conexão com o banco de dados.");
}

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Preparar a consulta SQL para verificar o login do cliente
    $query = "SELECT idcliente, nomecli FROM tb_clientes WHERE email = $1 AND senha = $2";

    // Executar a consulta SQL com parâmetros para evitar injeção de SQL
    $result = pg_query_params($connection, $query, array($email, $senha));

    // Verificar se a consulta foi executada com sucesso e se encontrou um cliente correspondente
    if ($result && pg_num_rows($result) > 0) {
        $cliente = pg_fetch_assoc($result);
        echo "<center><h2>Olá, " . $cliente["nomecli"] . "! Você está logado com sucesso.</h2>";
        header("refresh:3;url=home.php");
    exit;
    } else {
        echo "<h2>Login falhou. Verifique suas credenciais.</h2>";
    }
    
}

// Fechamento da conexão
?>
