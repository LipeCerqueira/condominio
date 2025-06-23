<?php
extract($_POST);
require("../model/connect.php");

session_start();
$destino = "";
$msg = "";

$busca = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf' AND `status` = 1");
var_dump($busca);

if ($busca->num_rows > 0) {
    $usuario = mysqli_fetch_assoc($busca);

    if (password_verify($senha, $usuario['senha'])) { // Verifica se a senha está correta

        $_SESSION["logado"] = true;
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["id"] = $usuario["id"];
        $_SESSION["cpf"] = $usuario["cpf"];
        $_SESSION["telefone"] = $usuario["telefone"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["telefone"] = $usuario["telefone"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["senha"] = $usuario["senha"];
        $_SESSION["caminhoFoto"] = $usuario["caminhoFoto"];
        $_SESSION["dataNascimento"] = $usuario["dataNascimento"];
        $_SESSION["cep"] = $usuario["cep"];
        $_SESSION["numero"] = $usuario["numero"];
        $_SESSION["rua"] = $usuario["rua"];
        $_SESSION["bairro"] = $usuario["bairro"];
        $_SESSION["cidade"] = $usuario["cidade"];
        $_SESSION["estado"] = $usuario["estado"];
        $_SESSION["complemento"] = $usuario["complemento"];
        $_SESSION["nivel"] = $usuario["nivel"];
        $_SESSION["status"] = $usuario["status"];
        $_SESSION["situacao"] = $usuario["situacao"];

        if ($_SESSION["nivel"] < 5) {
            $destino = "../view/paginaInicial.php";
        } else {
            $destino = "../view/adm.php";
        }
        $id_usuario = $usuario["id"];
        
        mysqli_query($con, "INSERT INTO log (`id_usuario`, `acao`, `ip`, `dataHora`) 
                            VALUES('$id_usuario','Login','$ip',now());");

        $msg = "Login realizado com sucesso!";
        $msgType = "Bem - Vindo " . $_SESSION["nome"];
        $alertIcon = 'success';
    } else {
        $_SESSION['cpf_tentativa'] = $cpf;
        $destino = "../view/login.php";
        $msg = "Tenta novamente";
        $msgType = "Senha incorreta!";
        $alertIcon = 'error';
    }
} else {
    $_SESSION['cpf_tentativa'] = $cpf;
    $destino = "../view/login.php";
    $msg = "Tenta novamente";
    $msgType = "CPF incorreto!";
    $alertIcon = 'error';
}

$_SESSION["msg"] = $msgType;
$_SESSION['alertMsg'] = $msg;
$_SESSION['alertIcon'] = $alertIcon;
header("location:$destino");
exit;
