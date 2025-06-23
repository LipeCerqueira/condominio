<?php


extract($_POST);

require('../model/connect.php');

@session_start();
mysqli_query($con, "UPDATE `canais` set `nomeCanal` = '$nome' WHERE `idCanal` = '$id'");

$destino = "../view/canais.php";
$msg = "Nome alterado com sucesso!";
$_SESSION['alertMsg'] = "Nome alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
