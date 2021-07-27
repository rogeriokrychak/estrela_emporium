<?php
    require "conectar.php";
    $nome = $_POST["nome"];
    $sexo = $_POST["sexo"];
    $email = $_POST["email"];
    $rua = $_POST["rua"];
    $telefone = $_POST["telefone"];
    $obs = $_POST["obs"];

    $campos = "nome='$nome',sexo='$sexo',email='$email',rua='$rua',telefone='$telefone',obs='$obs'";

    $sql = "UPDATE cliente SET $campos WHERE email='$email'";

    if(mysqli_query($con, $sql)) {
        echo "CADASTRO ATUALIZADO COM SUCESSO.";
        }
        else {
            echo "ERRO AO ATUALIZAR CADASTRO" .mysqli_error($con);
            }
    echo "<hr><a href='index.php?link=pesquisacliente.php'>VOLTAR</a>";
    mysqli_close($con);
?>