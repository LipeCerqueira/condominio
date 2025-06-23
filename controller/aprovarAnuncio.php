<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");


    
    mysqli_query($con, "UPDATE `classificados` set status = 'Aprovado' WHERE id = '$id'");


$destino = "../view/adm.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>