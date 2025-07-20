<?php

extract($_POST);

require("../model/connect.php");
session_start();
$msg = "";

$destino ="";
if($local == "user") {
    $destino = "../view/minhasIndicacoes.php";
} else {
    $destino = "../view/gerenciamentoProfissional.php";
}

require_once("../model/antiInjection.php");
if(antiInjection($telefone) == 0 || antiInjection($nome) == 0 || antiInjection($profissao) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:$destino");
    exit;
}



// if($foto['size']>0){
// $dir = "../fotoUsuarios/" .md5(time()) . ".jpg";
// move_uploaded_file ($foto['tmp_name'],$dir);
// unlink($foto_atual);
// }else{
//     $dir = $foto_atual;
// }





if (mysqli_query($con, "update `profissional` SET `telefone` = '$telefone',
                                            `nome` = '$nome',
                                            `idProfissao`='$profissao'
                                                where `id` = '$id'")) {
    $msg = "Sucesso";
    $_SESSION['alertMsg'] = "Indicação editada com sucesso!";
    $_SESSION['alertIcon'] = 'success';
} else {
    $msg = "Erro";
    $_SESSION['alertMsg'] = "Erro ao editar indicação!";
    $_SESSION['alertIcon'] = 'error';
}

$_SESSION['msg'] = $msg;

header("location:$destino");
