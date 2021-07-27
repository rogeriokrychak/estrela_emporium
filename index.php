<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="3.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Estrela Emporium-Distribuidora de Bebidas</title>
</head>
<body>
    <header>
        <img src="3.png" alt="" id="img"><h1>Estrela Emporium-Distribuidora de Bebidas</h1>
    </header>

    <?php @$link = $_GET["link"]; ?>

    <section>
        <nav>
            <?php include "menu.html" ?>
        </nav>

        <article>
            <?php include "conteudo.php" ?>
        </article>
    </section>

    <footer>
        <p>Você nos encontra nas Redes Sociais    <a href="http://www.facebook.com" target="_blanck"><img src="icone-facebook.png" id="rede"></a> <a href="http://www.instagram.com" target="_blanck"><img src="icone-instagram.png" id="rede"></a>e faça seu pedido pelo<a href="https://wa.me/5541995600852" target="_blanck"><img src="icone-whatsapp.png" id="rede"></a><p>
        <h4>&copy; Desenvolvido por Rogerio Krychak-4o Período de Análise e Desenvolvimento de Sistemas <?= date('Y'); ?></h4>
    </footer>
    
</body>
</html>