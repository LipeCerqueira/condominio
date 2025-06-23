<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");


    
    mysqli_query($con, "DELETE FROM `classificados` WHERE id = '$id'");


$destino = "../view/meusAnuncios.php";
$msg = "Anúncio excluido com sucesso!";
$_SESSION['alertMsg'] = "Anúncio excluido";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>