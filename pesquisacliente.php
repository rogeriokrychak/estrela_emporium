<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="3.png" type="image/x-icon">
    <link rel="stylesheet" href="estilo.css">
    <title>Estrela-Distribuidora de Bebidas</title>
    <style>
        th,td { border: 1px solid black; text-align:center; }
    </style>
</head>
<body>
PESQUISAR CLIENTES<form action="index.php?link=pesquisacliente.php" method="post"> 
<select name="tipo" id="input">
 <option value="nome" id="input">Nome</option>
 <option value="email" id="input">Email</option>
</select>
<input type="text" name="txtpesquisa" id="input" required><br>
<input type="submit" value="busca" id="input">
</form><hr>
</body>
</html>

<?php
	include_once "conectar.php";
	if(isset($_POST["tipo"])){
   	$tipo = $_POST["tipo"];
   	$pesquisa = $_POST["txtpesquisa"];  
  	 
		$sql = "SELECT *FROM cliente WHERE $tipo like '%$pesquisa%'";
		$res = mysqli_query($con,$sql);

		if(mysqli_affected_rows($con)==0) { // retorna o nº de linhas da pesquisa
			echo "<br><br>REGISTRO NÃO ENCONTRADO!";
		}
		else{
			echo "<table><tr><th>Nome</th><th>Email</th><th>Rua</th><th>Telefone</th><th>EDITAR</th></tr>";
	 		while($registro=mysqli_fetch_assoc($res)){
	 			$cod = $registro["codigo"];
	 			$nome = $registro["nome"];
	 			$sexo = $registro["sexo"];
	 			$email = $registro["email"];
                $rua = $registro["rua"];
	 			$telefone = $registro["telefone"];
	 			$obs = $registro["obs"];
	 			echo "<tr><td>$nome</td><td>$email</td><td>$rua</td><td>$telefone</td>
	 			<td><a href='index.php?link=pesquisacliente.php&cod=$cod'>X</td></tr>"; 
			}
			echo "</table>";
		} 
	}
?>

<?php	
	if(isset($_GET["cod"])) {
		 $cod = $_GET["cod"]; 
   	     $sql = "SELECT *FROM cliente WHERE codigo=$cod";
	
		 $res = mysqli_query($con,$sql);

		 $registro = mysqli_fetch_assoc($res);
	 	 $cod = $registro["codigo"];
	 	 $nome = $registro["nome"];
	 	 $sexo = $registro["sexo"];
	 	 $email = $registro["email"];
         $rua = $registro["rua"];
	 	 $telefone = $registro["telefone"];
   	 	 $obs = $registro["obs"];
		
	    echo "<form action='index.php?link=alterarcliente.php' method='post'>
	    Nome: <input type='text' value='$nome' name='nome' id='input' required><br>";
	       
	    if($sexo=='M') {
    	     echo "<input type='radio' name='sexo' id='input' value='M' checked>Masculino
	        <input type='radio' name='sexo' id='input' value='F'>Feminino<br>";
	    }else {
    	     echo "<input type='radio' name='sexo' id='input' value='M'>Masculino
	   		 		<input type='radio' name='sexo' value='F' checked>Feminino<br>";	       	
	    }
	       echo "
          Email: <input type='text' name='email' maxlength='40' id='input' value='$email' readonly><br>
          Rua: <input type='text' name='rua' id='input' value='$rua'><br>
          Telefone: <input type='text' name='telefone' maxlength='15' id='input' value='$telefone'><br>
          Observação:<br>
          <textarea name='obs' id='input' rows='3' cols='50'>
          $obs 
          </textarea><br>
          <input type='submit' id='input' value='ALTERAR'>
          <a href='index.php?link=excluircliente.php&cod=$cod' style='text-decoration:none;'>
          <input type='button' id='input' value='EXCLUIR'></a>
          <input type='button' id='input' value='IMPRIMIR' onclick='window.print()'>
          </form>";
       }        		 
  ?>  