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
        th,td { border: 1px solid black; text-align:center;}
    </style>
</head>
<body>
    PESQUISAR PRODUTOS<form action="index.php?link=pesquisaproduto.php" method="post">
        <select name="tipo" id="input">
            <option value="nome" id="input">Nome do Produto</option>
            <option value="quantidade" id="input">Quantidade</option>
        </select>
        <input type="text" name="txtpesquisa" id="input" required><br>
        <input type="submit" id="input" value="BUSCA">
    </form><hr>
</body>
</html>

<?php
    /*require "conectar.php"; //ESTE CÓDIGO É QUANDO É PRA FAZER INSERÇÃO DE PESQUISA DE UM ITEM
	$nome = @$_REQUEST["nome"];
	if(!empty($nome)){  // se não estiver em branco o campo nome

    $sql = "SELECT *FROM produto WHERE nome='$nome'";*/

    include_once "conectar.php";
    if(isset($_POST["tipo"])) {
        $tipo = $_POST["tipo"];
        $pesquisa = $_POST["txtpesquisa"];

        $sql = "SELECT *FROM produto WHERE $tipo like '%$pesquisa%'";

        $res = mysqli_query($con,$sql);
        
        if(mysqli_affected_rows($con)==0) {
            echo "<br><br>REGISTRO NÃO ENCONTRADO!";
            }
            else {
                echo "<table><tr><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Obs</th><th>EDITAR</th></tr>";
                while($registro=mysqli_fetch_assoc($res)) {
                    $cod = $registro["codigo"];
                    $nome = $registro["nome"];
                    $quantidade = $registro["quantidade"];
                    $preco = $registro["preco"];
                    $obs = $registro["obs"];
                    echo "<tr><td>$nome</td><td>$quantidade</td><td>$preco</td><td>$obs</td><td><a href='index.php?link=pesquisaproduto.php&cod=$cod'>X</td></tr>";
                }
                echo "</table>";
            }
        }
?>

<?php
    if(isset($_GET["cod"])) {
		 $cod = $_GET["cod"]; 
		 
   	     $sql = "SELECT *FROM produto WHERE codigo=$cod";
	
		 $res = mysqli_query($con,$sql);

		 $registro = mysqli_fetch_assoc($res);
	 	 $cod = $registro["codigo"];
	 	 $nome = $registro["nome"];
	 	 $quantidade = $registro["quantidade"];
	 	 $preco = $registro["preco"];
         $obs = $registro["obs"];
	 	 
		
	    echo "<form action='index.php?link=alterarproduto.php' method='post'>
	    Nome: <input type='text' id='input' value='$nome' name='nome' required><br>";
	       
	   
	      echo "
          Quantidade: <input type='text' name='quantidade' id='input'  value='$quantidade' readonly><br>
          Preco: <input type='text' name='preco' id='input' value=''><br>
          Observação:<br>
          <textarea name='obs' id='input' rows='5' cols='50'>
          $obs 
          </textarea><br>
          <input type='submit' id='input' value='ALTERAR'>
          <a href='index.php?link=excluirproduto.php&cod=$cod' style='text-decoration:none;'>
          <input type='button' id='input' value='EXCLUIR'></a>
          <input type='button' id='input' value='IMPRIMIR' onclick='window.print()'>
          </form>"; 
          } 
?>