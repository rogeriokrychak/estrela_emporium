<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="3.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Estrela Emporium-Distribuidora de Bebidas</title>
    <style>
        th,td { border: 1px solid black; text-align:center; }
    </style>
</head>
<body>
    <h1>RELATÓRIO DE PRODUTOS</h1>
    <form action="index.php?link=relatorioproduto.php" method="post">
    Nome do Produto: <input type="text" name="nome" id="input" maxlength="40"><br>
    <input type="submit" id="input" value="PESQUISAR">
    </form><hr>
</body>
</html>

<?php
    require "conectar.php";

    $nome = @$_REQUEST["nome"];

    $sql = "SELECT *FROM produto WHERE nome LIKE '%$nome%' ORDER BY nome ASC";

    $res = mysqli_query($con,$sql);

    if(mysqli_affected_rows($con)==0) {
        echo "CADASTRO NÃO ENCONTRADO!";
        }
        else {
            echo "<table border=2>
            <tr><th>Nome</th><th>Quantidade</th><th>Preco</th><th>Obs</th></tr>";

        while($registro=mysqli_fetch_assoc($res)) {
        $cod = $registro["codigo"];
        $nome = $registro["nome"];
        $quantidade = $registro["quantidade"];
        $preco = $registro["preco"];
        $obs = $registro["obs"]; 

        echo "<tr><td>$nome</td><td>$quantidade</td><td>$preco</td><td>$obs</td></tr>";
        }
        echo "</table>";

        echo "<hr><input type='button' id='input' value='IMPRIMIR' onclick='javascript:window.print()'>";
        echo "<a href='index.php?link=pesquisaproduto.php' style='text-decoration:none;'>
        <input type='button' id='input' value='VOLTAR'></a>"; 
        }

?>