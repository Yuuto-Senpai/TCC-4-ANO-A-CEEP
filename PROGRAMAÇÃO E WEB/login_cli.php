<?php
session_start();
// Verifica se o usuário já está conectado (possui uma sessão ativa)
if (isset($_SESSION['idcliente'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Digasparini Modas</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <div class="header">
        <div class="logo">Digasparini Modas</div>
        <div class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="cadastro_cli.php">Cadastro</a></li>
                <li><a href="login_cli.php">Login</a></li>
                <li><a href="cadastro_produtos_cli.php">Cadastro de Produtos</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <h2>Login</h2>
        <form action="processo_login.php" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <input type="submit" value="Entrar">
        </form>
    </div>

    <div class="footer">
    <p>Todos os direitos reservados &copy; <?php echo date("Y"); ?> DIGASPARINI</p>
        <p>Em tudo dai Graças ; 1 Tessalonicenses 5:18 </p>
    </div>
</body>
</html>
