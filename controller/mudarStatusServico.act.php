<?php 


@$id =  $_GET["id"];
@$status =  $_GET["status"];

require("../model/connect.php");

if($status == 1){
    
    mysqli_query($con, "UPDATE `profissao` set status = 0 WHERE idProfissao = '$id'");
}else{
    mysqli_query($con, "UPDATE `profissao` set status = 1 WHERE idProfissao = '$id'");
}

$destino = "../view/gerenciamentoServico.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>