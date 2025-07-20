<?php
extract($_POST);
session_start();

require('../model/connect.php');

require_once("../model/antiInjection.php");
if (antiInjection($bloco) == 0 || antiInjection($unidade) == 0 || antiInjection($condominio) == 0 || antiInjection($proprietario) == 0 || antiInjection($morador) == 0 || antiInjection($vaga1) == 0 || antiInjection($vaga2) == 0 || antiInjection($vaga3) == 0 || antiInjection($vaga4) == 0 || antiInjection($sitUnidade) == 0 || antiInjection($ocupante) == 0 || antiInjection($sitFinanceira) == 0 || antiInjection($observacao) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/listarUnidade.php");
    exit;
}


if (mysqli_query($con, "UPDATE `unidades` SET `bloco` = '$bloco',
                                                `unidade` = '$unidade',
                                                `id_condominio`='$condominio',
                                                `id_proprietario` = '$proprietario',
                                                `id_morador`='$morador',
                                                `vaga_garagem1`='$vaga1',
                                                `vaga_garagem2` = '$vaga2',
                                                `vaga_garagem3`='$vaga3',
                                                `vaga_garagem4` = '$vaga4',
                                                `situacao_unidade` = '$sitUnidade',
                                                `ocupante_tipo`='$ocupante',
                                                `situacao_financeira` = '$sitFinanceira',
                                                `observacoes`='$observacao'
                                                WHERE `id` = '$id'")) {
    $msg = "Sucesso";
    $_SESSION['alertMsg'] = "editado com sucesso!";
    $_SESSION['alertIcon'] = 'success';
} else {
    $msg = "erro";
    $_SESSION['alertMsg'] = "Falha com editar";
    $_SESSION['alertIcon'] = 'erro';
}
$destino = "../view/listarUnidade.php";
header("location:$destino");
exit;
