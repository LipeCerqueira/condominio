<?php 

extract($_POST);
$destino = "../view/listarAgendamentos.php";
require("../model/connect.php");
session_start();
$msg="";


require_once("../model/antiInjection.php");
if(antiInjection($morador) == 0 || antiInjection($area) == 0 || antiInjection($data) == 0 || antiInjection($inicio) == 0 || antiInjection($fim) == 0 || antiInjection($observacao) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/editarAgenda.php");
    exit;
}


$busca = mysqli_query($con, "SELECT * FROM agendamento_area_comum WHERE id_area = '$area' AND data_agendamento = '$data' AND(
                    (hora_inicio < '$fim' AND hora_fim > '$inicio') AND id_agendamento != '$id' 
                )");


if ($busca->num_rows > 0) {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Já existe um agendamento para essa área nesse período de tempo!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/listarAgendamentos.php";
    header("Location:$destino");
    exit();
}


if(mysqli_query($con, "update `agendamento_area_comum` set `id_morador` = '$morador',
                                            `id_area` = '$area',
                                            `unidade` = '$unidade',
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

