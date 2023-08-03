<!DOCTYPE html>
<html>
<head>
    <title>DIGASPARINI - HOME</title>
    <link rel="stylesheet" href="styleshome.css">
</head>
<body>
    <!-- Cabeçalho fixo -->
    <header class="header">
        <div class="logo">DIGASPARINI-MODAS</div>
        <nav class="nav">
            <ul>
                <li><a href="cadastro_cli.php">Cadastro</a></li>
                <li><a href="login_cli.php">Login</a></li>
                <li><a href="cadastro_produtos_cli.php">Cadastro de Produtos</a></li>
                <li><a href="feedback.php">FEEDBACK!</a></li>
            </ul>
        </nav>
    </header>

<!-- Conteúdo da página -->
<div class="content">
    <h1>Bem-vindo à Página Inicial da Loja DIGASPARINI</h1>
    <div class="grid">
        <?php
        require_once 'config.php';

        $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        // Consulta SQL para buscar os dados dos produtos cadastrados
        $query = "SELECT * FROM tb_produtos ORDER BY idprod DESC LIMIT 9";
        $result = pg_query($connection, $query);

        // Verifica se a consulta foi executada com sucesso
        if ($result && pg_num_rows($result) > 0) {
            // Exibe os produtos na grid
            while ($row = pg_fetch_assoc($result)) {
                $nomeProduto = $row['nomeprod'];
                $idProduto = $row['idprod'];
                $imagemProduto = "product_image_$idProduto.jpg"; // Supondo que as imagens têm o formato product_image_id.jpg
        ?>
                <div class="product">
                    <a href="produtopag.php?id=<?php echo $idProduto; ?>">
                        <img src="<?php echo $imagemProduto; ?>" alt="<?php echo $nomeProduto; ?>">
                        <p><?php echo $nomeProduto; ?></p>
                    </a>
                </div>
                
        <?php
            }
        } else {
            echo "<p>Nenhum produto cadastrado.</p>";
        }
        ?>
    </div>
</div>
<div class="feedbacks">
            <h2>Feedbacks dos Clientes</h2>
            <?php

            require_once 'config.php';

$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
            // Consulta SQL para recuperar os feedbacks do banco de dados
            $query = "SELECT comentario, data_hora FROM feedbacks ORDER BY data_hora DESC LIMIT 5";
            $result = pg_query($connection, $query);

            // Verifica se há algum feedback para exibir
            if (pg_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr><th>Comentário</th><th>Data e Hora</th></tr>';
                while ($row = pg_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['comentario'] . '</td>';
                    echo '<td>' . $row['data_hora'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>Nenhum feedback disponível. Deixe o seu feedback abaixo:</p>';
            }
            ?>


    <!-- Rodapé -->
    <footer class="footer">
        <p>Todos os direitos reservados &copy; <?php echo date("Y"); ?> DIGASPARINI</p>
        <p>Em tudo dai Graças ; 1 Tessalonicenses 5:18 </p>
    </footer>
</body>
</html>
