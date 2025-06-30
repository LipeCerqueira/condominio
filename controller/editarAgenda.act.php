<?php 

extract($_POST);
$destino = "../view/listarAgendamentos.php";
require("../model/connect.php");
session_start();
$msg="";

if(mysqli_query($con, "update `agendamento_area_comum` set `id_morador` = '$morador',
                                            `id_area` = '$area',
                                            `data_agendamento` = '$data',
                                            `hora_inicio` = '$inicio',
                                            `hora_fim` = '$fim',
                                            `observacoes` = '$observacao',
                                            `status` = '$status'
                                           
                                                where `id_agendamento` = '$id'")){
$msg="Sucesso";
$_SESSION['alertMsg'] = "Agendamento editada com sucesso!";
$_SESSION['alertIcon'] = 'success';
}else{
$msg="Erro";
$_SESSION['alertMsg'] = "Erro ao editar Agendamento!";
$_SESSION['alertIcon'] = 'error';
}

$_SESSION['msg'] = $msg;

header("location:$destino");

