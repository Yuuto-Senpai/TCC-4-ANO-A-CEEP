<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos - Digasparini Modas</title>
    <link rel="stylesheet" href="stylescadprod.css">
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
        <h2>Cadastro de Produtos</h2>
        <form action="processoprod.php" method="POST">
            <label for="nomeprod">Nome do Produto:</label>
            <input type="text" id="nomeprod" name="nomeprod" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <label for="valorprod">Valor do Produto:</label>
            <input type="number" step="0.01" id="valorprod" name="valorprod" required>

            <label for="idimg_fk">Link da Imagem:</label>
            <input type="number" id="idimg_fk" name="idimg_fk" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <div class="footer">
        <p>Todos os direitos reservados &copy; <?php echo date("Y"); ?> DIGASPARINI</p>
        <p>Em tudo dai Graças ; 1 Tessalonicenses 5:18 </p>
    </div>
</body>
</html>