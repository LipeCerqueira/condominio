<?php

@session_start();
require("../Model/connect.php");

extract($_POST);



$busca = mysqli_query($con, "SELECT * FROM acesso WHERE idUsuario = '$id'");

if ($busca->num_rows == 0) {

    if ($acessoEvento != 0 || $acessoNoticia != 0 || $acessoPesquisa != 0) {
        $acesso = mysqli_query($con, "INSERT INTO acesso(`idUsuario`, `acessoNoticia`, `acessoEvento`, `acessoPesquisa`) 
    VALUES('$id', '$acessoNoticia', '$acessoEvento', '$acessoPesquisa')");

        $nivel = mysqli_query($con, "UPDATE usuario SET `nivel` = 2 WHERE `id` = '$id'");
    }
} else {

    $acesso = mysqli_query($con, "UPDATE acesso SET `acessoNoticia` = '$acessoNoticia', `acessoEvento` = '$acessoEvento', `acessoPesquisa` = '$acessoPesquisa' WHERE idUsuario = '$id'");
}


$destino = "../view/painelControleDeAcesso.php";
$msg = "Nível de acesso atualizado!";
$_SESSION['alertMsg'] = "Nível alterado com sucesso!";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
