<?php


extract($_POST);

require('../model/connect.php');
require_once("../model/antiInjection.php");
if(antiInjection($situacao) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/editarSituacaoOcupacao.php");
    exit;
}

@session_start();
mysqli_query($con, "UPDATE `situacao_ocupacao` set `nome_ocupacao` = '$situacao' WHERE `id_ocupacao` = '$id'");

$destino = "../view/listarSituacaoOcupacao.php";
$msg = "Nome alterado com sucesso!";
$_SESSION['alertMsg'] = "Nome alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
