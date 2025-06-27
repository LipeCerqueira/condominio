<?php


extract($_POST);

require('../model/connect.php');

@session_start();
mysqli_query($con, "UPDATE `situacao_financeira` set `nome_situacao_financeira` = '$situacao' WHERE `id_situacao_financeira` = '$id'");

$destino = "../view/listarSituacaoFinanceira.php";
$msg = "Nome alterado com sucesso!";
$_SESSION['alertMsg'] = "Nome alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
