<?php
$host = "localhost";
$port = "5432"; 
$dbname = "DIGASPARINI";
$user = "postgres";
$password = "jesussalva22*";

try {
    $conexao = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
