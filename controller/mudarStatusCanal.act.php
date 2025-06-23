<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");

if($status == 1){
    
    mysqli_query($con, "UPDATE `canais` set status = 0 WHERE idCanal = '$id'");
}else{
    mysqli_query($con, "UPDATE `canais` set status = 1 WHERE idCanal = '$id'");
}

$destino = "../view/canais.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>