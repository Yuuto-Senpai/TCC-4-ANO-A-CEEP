<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Produto - Digasparini Modas</title>
    <link rel="stylesheet" href="styleproduto.css">
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
        <?php
        // Inclua o arquivo config.php usando require_once
        require_once 'config.php';

        $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        // Verifica se o parâmetro "id" está presente na URL
        if (isset($_GET['id'])) {
            // Obter o ID do produto da URL
            $idProduto = $_GET['id'];

            // Consulta SQL para buscar os detalhes do produto pelo ID
            $query = "SELECT * FROM tb_produtos WHERE idprod = $1";
            $result = pg_query_params($connection, $query, array($idProduto));

            // Verifica se a consulta foi executada com sucesso e se o produto foi encontrado
            if ($result && pg_num_rows($result) > 0) {
                // Exibe as informações detalhadas do produto
                $row = pg_fetch_assoc($result);
                $nomeProduto = $row['nomeprod'];
                $descricaoProduto = $row['descricao'];
                $valorProduto = $row['valorprod'];
                $imagemProduto = "product_image_$idProduto.jpg"; // Supondo que as imagens têm o formato product_image_id.jpg
        ?>
                <h2><?php echo $nomeProduto; ?></h2>
                <div class="product">
                    <img src="<?php echo $imagemProduto; ?>" alt="<?php echo $nomeProduto; ?>">
                    <p>Descrição: <?php echo $descricaoProduto; ?></p>
                    <p>Valor: R$ <?php echo number_format($valorProduto, 2, ',', '.'); ?></p>
                </div>
        <?php
            } else {
                echo "<p>Produto não encontrado.</p>";
            }
        } else {
            echo "<p>Produto não especificado.</p>";
        }
        ?>
    </div>

    <div class="footer">
        <p>Todos os direitos reservados &copy; <?php echo date("Y"); ?> DIGASPARINI</p>
        <p>Em tudo dai Graças ; 1 Tessalonicenses 5:18 </p>
    </div>
</body>
</html>
