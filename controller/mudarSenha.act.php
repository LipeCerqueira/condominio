<?php 



@session_start();

$destino ="";
require("../Model/connect.php");

extract($_POST);

require_once("../model/antiInjection.php");
if(antiInjection($senha) == 0 || antiInjection($confirmaSenha) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/mudarSenha.php");
    exit;
}

if($senha == $confirmaSenha){

$senha = password_hash($senha,PASSWORD_DEFAULT);

mysqli_query($con, "UPDATE `usuario` SET `senha` = '$senha' WHERE id = '$id'");
 $_SESSION['msg'] = "Senha alterada com sucesso!";
    $_SESSION['alertMsg'] = "Sucesso!";
    $_SESSION['alertIcon'] = 'success';
    $destino = "../view/login.php";

}else{
    $_SESSION['senha1_tentativa'] = $senha;
$_SESSION['senha2_tentativa'] = $confirmaSenha;

    $_SESSION['msg'] = "Senhas diferentes";
    $_SESSION['alertMsg'] = "Informe novamente ";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/mudarSenha.php";
}





header("Location:$destino");



?>