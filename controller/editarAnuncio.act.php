<?php

extract($_POST);
extract($_FILES);

require("../model/connect.php");
session_start();
$msg = "";
$destino = "../view/meusAnuncios.php";

require_once("../model/antiInjection.php");
if (antiInjection($titulo) == 0 || antiInjection($descricao) == 0 || antiInjection($valor) == 0 || antiInjection($tipo) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/editarAnuncio.php?idAnuncio=$idAnuncio");
    exit;
}


if ($foto['size'] > 0) {
    $dir = "../imagensAnuncio/" .md5(time()) . ".jpg";
    move_uploaded_file($foto['tmp_name'], $dir);
    unlink($foto_atual);
} else {
    $dir = $foto_atual;
}




if (mysqli_query($con, "update `classificados` set `titulo` = '$titulo',
                                            `imagem` = '$dir',
                                            `descricao` = '$descricao',
                                            `valor` = '$valor',
                                            `tipo` = '$tipo',
                                            `status` = 'Aguardando Aprovação'
                                                where `id` = '$idAnuncio';")) {
    $msg = "Sucesso";
    $_SESSION['alertMsg'] = "Anúncio editado com sucesso!";
    $_SESSION['alertIcon'] = 'success';
} else {
    $msg = "Erro";
    $_SESSION['alertMsg'] = "Erro ao editar anúncio!";
    $_SESSION['alertIcon'] = 'error';
}

$_SESSION['msg'] = $msg;

header("location:$destino");
