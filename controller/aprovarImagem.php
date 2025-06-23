<?php 


@$id =  $_GET["id"];


require("../model/connect.php");


    
    mysqli_query($con, "UPDATE `galeriaFotos` set status = 1 WHERE idFoto = '$id'");


$destino = "../view/adm.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>