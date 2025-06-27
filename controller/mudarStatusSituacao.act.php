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

if ($local == "comercial") {

    mysqli_query($con, "UPDATE `situacao_unidade` set status = '$status' WHERE id_situacao = '$id'");
    $destino = "../view/listarSituacao.php";

} else if ($local == "financeira") {

    mysqli_query($con, "UPDATE `situacao_financeira` set status_financeiro = '$status' WHERE id_situacao_financeira = '$id'");
    $destino = "../view/listarSituacaoFinanceira.php";

} else if ($local == "ocupacao") {

    mysqli_query($con, "UPDATE `situacao_ocupacao` set status_ocupacao = '$status' WHERE id_ocupacao = '$id'");
    $destino = "../view/listarSituacaoOcupacao.php";

}



$msg = "Status alterado com sucesso!";
$_SESSION['alertMsg'] = "Status alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
