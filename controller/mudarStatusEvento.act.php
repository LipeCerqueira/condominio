<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");

if($status == 1){
    
    mysqli_query($con, "UPDATE `evento` set status = 0 WHERE idEvento = '$id'");
}else{
    mysqli_query($con, "UPDATE `evento` set status = 1 WHERE idEvento = '$id'");
}

$destino = "../view/gerenciamentoEvento.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>