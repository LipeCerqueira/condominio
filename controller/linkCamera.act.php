<?php

extract($_POST);

require('../model/connect.php');

@session_start();

if (mysqli_query($con, "UPDATE camera SET `cam1` = '$cam1', `cam2` = '$cam2', `cam3` = '$cam3' WHERE `id`= 1;")) {
    $destino = "../view/adm.php";
    $msg = "Link alterado!";
    $_SESSION['alertMsg'] = "Link alterado com sucesso!";
    $_SESSION['alertIcon'] = 'success';
    $_SESSION['msg'] = $msg;
    header("location:$destino");
}
