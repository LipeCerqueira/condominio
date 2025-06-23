<?php 
@session_start();

if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true){
    $_SESSION["msg"] = "Você não está logado! Faça login para acessar esta página.";
$_SESSION["alertMsg"] = '';
    $_SESSION["alertIcon"] = 'error';
    header("location:paginaInicial.php");
    exit;
}




?>