<?php 

@session_start();
date_default_timezone_set('America/Sao_Paulo'); 
$destino ="";
require("../Model/connect.php");

extract($_POST);
$busca = mysqli_query($con, "SELECT * FROM `usuario` WHERE `id` = '$id'");

$usuario = mysqli_fetch_assoc($busca);

if ($usuario['bloqueado_ate'] && strtotime($usuario['bloqueado_ate']) > time()) {
    $_SESSION['msg'] = "Usuário bloqueado até: " . date('H:i', strtotime($usuario['bloqueado_ate']));
      $_SESSION['alertMsg'] = "Bloqueado";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/validaCodigo.php";
    header("Location:$destino");
    exit;
}

if($codigo == $usuario["token_recuperacao"]){
 
    $destino = "../view/mudarSenha.php";
}else{

     $tentativas = $usuario['tentativas_codigo'] + 1;
  
 if ($tentativas >= 3) {
    $bloqueadoAte = date('Y-m-d H:i:s', strtotime('+15 minutes'));
    mysqli_query($con, "UPDATE `usuario` SET `tentativas_codigo` = 0, `bloqueado_ate` = '$bloqueadoAte' WHERE `id` = '$id'");

    $_SESSION['msg'] = "Muitas tentativas! Usuário bloqueado por 15 minutos.";
 }else{
    mysqli_query($con, "UPDATE `usuario` SET `tentativas_codigo` = $tentativas WHERE `id` = '$id'");
     $_SESSION['msg'] = "Código incorreto. Tentativas restantes: " . (3 - $tentativas);
 }

     
    
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/validaCodigo.php";
}


header("Location:$destino");

?>