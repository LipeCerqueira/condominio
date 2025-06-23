<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");

if($status == 1){
    
    mysqli_query($con, "UPDATE `noticia` set status = 0 WHERE idNoticia = '$id'");
}else{
    mysqli_query($con, "UPDATE `noticia` set status = 1 WHERE idNoticia = '$id'");
}

$destino = "../view/gerenciamentoNoticia.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>