<?php

extract($_POST);

session_start();

require_once('../Model/connect.php');

if (mysqli_query($con, "INSERT INTO unidades(bloco,unidade,id_condominio,id_proprietario,id_morador,
                                                    vaga_garagem1,vaga_garagem2,vaga_garagem3,vaga_garagem4,
                                                    situacao_unidade,ocupante_tipo,situacao_financeira,observacoes,data_cadastro) 
                                                    VALUES('$bloco', '$unidade', '$condominio','$proprietario','$morador','$vaga1','$vaga2','$vaga3','$vaga4','$sitUnidade','$ocupante','$sitFinanceira','$observacao',now())")) {


$msg = "Sucesso";
    $_SESSION['alertMsg'] = "Unidade adicionada!";
    $_SESSION['alertIcon'] = 'success';

} else {
    $msg = "erro";
    $_SESSION['alertMsg'] = "Falha ao adicionar";
    $_SESSION['alertIcon'] = 'erro';
}
$destino = "../view/listarUnidade.php";
header("location:$destino");
exit;
