<?php 


@$id =  $_GET["id"];

require("../model/connect.php");

    
    mysqli_query($con, "DELETE FROM `profissional` WHERE id = '$id'");


$destino = "../view/minhasIndicacoes.php";
$msg = "Indicação excluida alterado com sucesso!";
$_SESSION['alertMsg'] = "Sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>