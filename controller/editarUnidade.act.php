<?php
extract($_POST);
session_start();

require('../model/connect.php');


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