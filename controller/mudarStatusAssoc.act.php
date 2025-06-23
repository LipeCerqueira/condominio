<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");

if($status == 1){
    
    mysqli_query($con, "UPDATE `usuario` set status = 0 WHERE id = '$id'");
}else{
    mysqli_query($con, "UPDATE `usuario` set status = 1 WHERE id = '$id'");
}

$destino = "../view/gerenciamento.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>