<?php
extract($_POST);
session_start();

require('../model/connect.php');


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