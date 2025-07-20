<?php
extract($_POST);
session_start();

require('../model/connect.php');

require_once("../model/antiInjection.php");
if (antiInjection($nome_fantasia) == 0 || antiInjection($razao_social) == 0 || antiInjection($cnpj) == 0 || antiInjection($inscricao_estadual) == 0 || antiInjection($cep) == 0 || antiInjection($endereco) == 0 || antiInjection($numero) == 0 || antiInjection($complemento) == 0 || antiInjection($bairro) == 0 || antiInjection($cidade) == 0 || antiInjection($estado) == 0 || antiInjection($pais) == 0 || antiInjection($responsavel_administrativo_1) == 0 || antiInjection($responsavel_administrativo_2) == 0 || antiInjection($responsavel_administrativo_3) == 0 || antiInjection($responsavel_administrativo_4) == 0 || antiInjection($responsavel_administrativo_5) == 0 || antiInjection($telefone_1) == 0 || antiInjection($telefone_2) == 0 || antiInjection($telefone_3) == 0 || antiInjection($telefone_4) == 0 || antiInjection($telefone_5) == 0 || antiInjection($email_1) == 0 || antiInjection($email_2) == 0 || antiInjection($email_3) == 0 || antiInjection($email_4) == 0 || antiInjection($email_5) == 0 ) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/listarCondominio.php");
    exit;
}


if (mysqli_query($con, "UPDATE `condominios` SET `nome_fantasia` = '$nome_fantasia',
                                                `razao_social` = '$razao_social',
                                                `cnpj`='$cnpj',
                                                `inscricao_estadual` = '$inscricao_estadual',
                                                `cep`='$cep',
                                                `endereco`='$endereco',
                                                `numero` = '$numero',
                                                `complemento`='$complemento',
                                                `bairro` = '$bairro',
                                                `cidade`='$cidade',
                                                `estado` = '$estado',
                                                `pais`='$pais',
                                                `responsavel_administrativo_1` = '$responsavel_administrativo_1',
                                                `responsavel_administrativo_2` = '$responsavel_administrativo_2',
                                                `responsavel_administrativo_3` = '$responsavel_administrativo_3',
                                                `responsavel_administrativo_4` = '$responsavel_administrativo_4',
                                                `responsavel_administrativo_5` = '$responsavel_administrativo_5',
                                                `telefone_1` = '$telefone_1',
                                                `telefone_2` = '$telefone_2',
                                                `telefone_3` = '$telefone_3',
                                                `telefone_4` = '$telefone_4',
                                                `telefone_5` = '$telefone_5',
                                                `email_1` = '$email_1',
                                                `email_2` = '$email_2',
                                                `email_3` = '$email_3',
                                                `email_4` = '$email_4',
                                                `email_5` = '$email_5',
                                                `status`='$status'
                                                WHERE `id` = '$id'")) {
    $msg = "Sucesso";
    $_SESSION['alertMsg'] = "editado com sucesso!";
    $_SESSION['alertIcon'] = 'success';
} else {
    $msg = "erro";
    $_SESSION['alertMsg'] = "Falha com editar";
    $_SESSION['alertIcon'] = 'erro';
}
$destino = "../view/listarCondominio.php";
header("location:$destino");
exit;