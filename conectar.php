<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "estrela";

    $con = mysqli_connect($servidor,$usuario,$senha,$banco);

    if(!$con) die("Falha ao conectar" . mysqli_connect_error());

    //echo"Conexão realizada com sucesso.";
?>