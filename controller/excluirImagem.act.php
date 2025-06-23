<?php 


@$id =  $_GET["id"];


require("../model/connect.php");


    
    mysqli_query($con, "DELETE FROM `galeriaFotos`  WHERE idFoto = '$id'");


$destino = "../view/adm.php";
$msg = "Imagem excluida  com sucesso!";
$_SESSION['alertMsg'] = "Imagem excluida!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>