<?php


extract($_POST);

require('../model/connect.php');

@session_start();
mysqli_query($con, "UPDATE `situacao_unidade` set `nome_situacao` = '$situacao' WHERE `id_situacao` = '$id'");

$destino = "../view/listarSituacao.php";
$msg = "Nome alterado com sucesso!";
$_SESSION['alertMsg'] = "Nome alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
