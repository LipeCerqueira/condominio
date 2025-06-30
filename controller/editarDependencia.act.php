<?php 

extract($_POST);
$destino = "../view/listarDependencias.php";
require("../model/connect.php");
session_start();
$msg="";

if(mysqli_query($con, "update `area` set `nome` = '$nome',
                                            `descricao` = '$descricao',
                                            `capacidade` = '$capacidade',
                                            `horario_abertura` = '$abertura',
                                            `horario_fechamento` = '$fechamento'
                                           
                                                where `id_area` = '$id'")){
$msg="Sucesso";
$_SESSION['alertMsg'] = "Dependência editada com sucesso!";
$_SESSION['alertIcon'] = 'success';
}else{
$msg="Erro";
$_SESSION['alertMsg'] = "Erro ao editar Dependência!";
$_SESSION['alertIcon'] = 'error';
}

$_SESSION['msg'] = $msg;

header("location:$destino");



