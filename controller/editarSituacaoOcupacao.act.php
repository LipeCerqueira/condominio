<?php


extract($_POST);

require('../model/connect.php');

@session_start();
mysqli_query($con, "UPDATE `situacao_ocupacao` set `nome_ocupacao` = '$situacao' WHERE `id_ocupacao` = '$id'");

$destino = "../view/listarSituacaoOcupacao.php";
$msg = "Nome alterado com sucesso!";
$_SESSION['alertMsg'] = "Nome alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
