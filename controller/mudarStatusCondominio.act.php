<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");

if($status == 'Ativo'){
    
    mysqli_query($con, "UPDATE `condominios` set status = 'Inativo' WHERE id = '$id'");
}else{
    mysqli_query($con, "UPDATE `condominios` set status = 'Ativo' WHERE id = '$id'");
}

$destino = "../view/listarCondominio.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>