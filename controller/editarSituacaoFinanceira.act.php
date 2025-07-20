<?php


extract($_POST);

require('../model/connect.php');
require_once("../model/antiInjection.php");
if(antiInjection($situacao) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/editarSituacaoFinanceira.php");
    exit;
}

@session_start();
mysqli_query($con, "UPDATE `situacao_financeira` set `nome_situacao_financeira` = '$situacao' WHERE `id_situacao_financeira` = '$id'");

$destino = "../view/listarSituacaoFinanceira.php";
$msg = "Nome alterado com sucesso!";
$_SESSION['alertMsg'] = "Nome alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
