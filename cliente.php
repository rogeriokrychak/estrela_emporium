<?php
    include_once "conectar.php";
    $nome = $_POST["nome"];
    $sexo = $_POST["sexo"];
    $email = $_POST["email"];
    $rua = $_POST["rua"];
    $telefone = $_POST["telefone"];
    $obs = $_POST["obs"];

    $sql = "INSERT INTO cliente(nome,sexo,email,rua,telefone,obs)VALUES('$nome','$sexo','$email','$rua','$telefone','$obs')";

    mysqli_query($con,$sql)or die("Erro:" .mysqli_error());
    echo "<br><br>CADASTRO REALIZADO COM SUCESSO!";

    mysqli_close($con);
?>