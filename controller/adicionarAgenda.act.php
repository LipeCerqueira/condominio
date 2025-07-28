<?php
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino = "";
@session_start();

require_once("../model/antiInjection.php");

if (antiInjection($morador) == 0 || antiInjection($area) == 0 || antiInjection($data) == 0 || antiInjection($inicio) == 0 || antiInjection($fim) == 0 || antiInjection($observacao) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/adicionarAgenda.php");
    exit;
}

$busca = mysqli_query($con, "SELECT * FROM agendamento_area_comum WHERE id_area = '$area' AND data_agendamento = '$data' AND(
                    (hora_inicio < '$fim' AND hora_fim > '$inicio')
                )");


if ($busca->num_rows > 0) {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Já existe um agendamento para essa área nesse período de tempo!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/listarAgendamentos.php";
    header("Location:$destino");
    exit();
}




if (mysqli_query($con, "INSERT INTO agendamento_area_comum (id_morador,id_area,unidade, data_agendamento, hora_inicio,hora_fim,observacoes,status,data_solicitacao) 
                            VALUES('$morador','$area','$unidade','$data' ,'$inicio','$fim','$observacao','$status',now());")) {

    $_SESSION['msg'] = "Sucesso!";
    $_SESSION['alertMsg'] = "Agendamento realizado com sucesso!";
    $_SESSION['alertIcon'] = 'success';
    $destino = "../view/listarAgendamentos.php";
} else {
    $_SESSION['msg'] = "Erro";
    $_SESSION['alertMsg'] = "Erro ao Agendar!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/adicionarAgenda.php";
}




header("Location:$destino");
exit();
