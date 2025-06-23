<?php 


@$id =  $_GET["id"];
@$destaque =  $_GET["destaque"];

require("../model/connect.php");

if($destaque == 0){
    
    mysqli_query($con, "UPDATE `profissional` set destaque = 1 WHERE id = '$id'");
}else{
    mysqli_query($con, "UPDATE `profissional` set destaque = 0 WHERE id = '$id'");
}

$destino = "../view/gerenciamentoProfissional.php";
$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>