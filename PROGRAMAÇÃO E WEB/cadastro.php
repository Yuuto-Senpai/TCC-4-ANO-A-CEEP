<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $datanasc = $_POST["datanasc"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    
    $conn = new PDO("pgsql:host=localhost;dbname=DIGASPARINI", "postgres", "jesussalva22*");

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO tb_clientes (nomecli, cpf, datanasc, email, senha, telefone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $cpf, $datanasc, $email, $senha, $telefone]);

    
    $conn = null;

    
    header("Location: home.php");
    exit();
}
?>
