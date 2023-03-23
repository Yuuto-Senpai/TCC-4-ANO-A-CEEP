<?php
$servername = "localhost";
$username = "root";
$password = "********";
$dbname = "digasparini_modas";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// Checa conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    // Prepara e vincula
    $stmt = $conn->prepare("INSERT INTO clientes (nome, sobrenome, email, senha, telefone, endereco) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $sobrenome, $email, $senha, $telefone, $endereco);

    // Executa SQL e exibe mensagem de sucesso ou erro
    if ($stmt->execute()) {
      echo "Cadastro realizado com sucesso!";
    } else {
      echo "Erro ao realizar cadastro: " . $conn->error;
    }

    // Fecha conexão
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Formulário de Cadastro</title>
</head>
<body>
	<h1>Cadastro de Cliente</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="nome">Nome:</label>
		<input type="text" name="nome"><br><br>
		<label for="sobrenome">Sobrenome:</label>
		<input type="text" name="sobrenome"><br><br>
		<label for="email">Email:</label>
		<input type="email" name="email"><br><br>
        <label for="senha">Senha:</label>
		<input type="password" name="senha"><br><br>
		<label for="telefone">Telefone:</label>
		<input type="text" name="telefone"><br><br>
		<label for="endereco">Endereço:</label>
		<input type="text" name="endereco"><br><br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>

