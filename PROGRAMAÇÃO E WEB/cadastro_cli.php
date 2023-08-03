<!DOCTYPE html>
<html>
<head>
    <title>CADASTRO DIGASPARINI</title>
    <link rel="stylesheet" href="stylecad.css">
</head>
<body>
    <!-- Cabeçalho fixo -->
    <header class="header">
        <div class="logo">DIGASPARINI-MODAS</div>
        <nav class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="cadastro_cli.php">Cadastro</a></li>
                <li><a href="login_cli.php">Login</a></li>
                <li><a href="cadastro_produtos_cli.php">Cadastro de Produtos</a></li>
            </ul>
        </nav>
    </header>

    <!-- Conteúdo da página -->
    <div class="content">
        <h2>Cadastro de Cliente</h2>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="datanasc">Data de Nascimento:</label>
            <input type="date" id="datanasc" name="datanasc" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">

            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <!-- Rodapé -->
    <footer class="footer">
        <p>Todos os direitos reservados &copy; <?php echo date("Y"); ?> DIGASPARINI</p>
        <p>Em tudo dai Graças ; 1 Tessalonicenses 5:18 </p>
    </footer>
</body>
</html>
