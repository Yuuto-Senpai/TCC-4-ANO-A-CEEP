<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DIGASPARINI - Feedback</title>
    <link rel="stylesheet" href="stylefeedback.css">
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
        <br>
        <br>
        <h1>Deixe o seu Feedback</h1>
        <form action="processo_feedback.php" method="POST">
            <label for="comentario">Comentário:</label>
            <textarea id="comentario" name="comentario" rows="5" required></textarea>

            <input type="submit" value="Enviar Feedback">
        </form>
    </div>

    <!-- Rodapé -->
    <footer class="footer">
        <p>Todos os direitos reservados &copy; <?php echo date("Y"); ?> DIGASPARINI</p>
        <p>Em tudo dai Graças ; 1 Tessalonicenses 5:18 </p>
    </footer>
</body>
</html>
