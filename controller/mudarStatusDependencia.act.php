<?php


@$id =  $_GET["id"];
@$status =  $_GET["status"];
@$local =  $_GET["local"];
$destino = "";
require("../model/connect.php");
session_start();

if ($status == 1) {
    $status = 0;
} else {
    $status = 1;
}



    mysqli_query($con, "UPDATE `area` set status = '$status' WHERE id_area = '$id'");
    $destino = "../view/listarDependencias.php";





$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
