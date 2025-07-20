<?php 

extract($_POST);
extract($_FILES);

require("../model/connect.php");
session_start();
$msg="";
$destino = "../view/gerenciamentoEvento.php";

require_once("../model/antiInjection.php");
if(antiInjection($nome) == 0 || antiInjection($dataInicio) == 0 || antiInjection($horaInicio) == 0 || antiInjection($pontoEncontro) == 0 || antiInjection($duracao) == 0 || antiInjection($informacoes) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/editarEvento.php?idEvento=$idEvento");
    exit;
}

if($foto['size']>0){
$dir = "../imagensEventos/" .md5(time()) . ".jpg";
move_uploaded_file ($foto['tmp_name'],$dir);
unlink($foto_atual);
}else{
    $dir = $foto_atual;
}



if(mysqli_query($con, "update `evento` set `nome` = '$nome',
                                            `dataInicio` = '$dataInicio',
                                            `horaInicio` = '$horaInicio',
                                            `pontoEncontro` = '$pontoEncontro',
                                            `duracao` = '$duracao',
                                            `informacoes` = '$informacoes',
                                            `imagem`='$dir'
                                                where `idEvento` = '$idEvento'")){
$msg="Sucesso";
$_SESSION['alertMsg'] = "Evento editado com sucesso!";
$_SESSION['alertIcon'] = 'success';
}else{
$msg="Erro";
$_SESSION['alertMsg'] = "Erro ao editar evento!";
$_SESSION['alertIcon'] = 'error';
}

$_SESSION['msg'] = $msg;

header("location:$destino");



