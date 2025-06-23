<?php 

@session_start();
require("../Model/connect.php");
$cpf = $_POST['cpf'];

$destino ="";
$busca = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'");

if($busca ->num_rows != 0){
    $usuario = mysqli_fetch_assoc($busca);
    $email = $usuario["email"];
    $id = $usuario["id"];

    $codigo = mt_rand(100000, 999999);
    
    $sql = mysqli_query($con, "UPDATE `usuario` SET token_recuperacao = '$codigo' WHERE id = '$id'" );
    $destino = "../view/validaCodigo.php";  
     $_SESSION['emailValidado'] = $email;
     $_SESSION['idUsuario'] = $id;


$to = $email;
$subject = "Portal VPD: Recuperação de senha";
$message = "Código de recuperação de senha: $codigo";
$headers = "From: suporte@ontimenet.com.br";

mail($to, $subject, $message, $headers);


}else{
     $_SESSION['msg'] = "CPF inválido!";
    $_SESSION['alertMsg'] = "O CPF informado não foi cadastrado.";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/recuperacaoSenha.php";
}


header("Location:$destino");




?>