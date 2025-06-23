<?php

extract($_POST);
extract($_FILES);
$acessoEvento = isset($acessoEvento) ? $acessoEvento : 0;
$acessoNoticia = isset($acessoNoticia) ? $acessoNoticia : 0;
$acessoPesquisa = isset($acessoPesquisa) ? $acessoPesquisa : 0;
$nivel = isset($nivel) ? $nivel : 1;
require("../model/connect.php");
session_start();
$msg = "";


if ($pagina == "gerenciamento") {
    $destino = "../view/gerenciamento.php";
}


if ($foto['size'] > 0) {
    $dir = "../fotoUsuarios/" . md5(time()) . ".jpg";
    move_uploaded_file($foto['tmp_name'], $dir);
    unlink($foto_atual);
} else {
    $dir = $foto_atual;
}

if ($senha != "") {
    $senha = password_hash($senha, PASSWORD_DEFAULT);
} else {
    $senha = $senha_atual;
}

$cpf_limpo = preg_replace('/\D/', '', $cpf);

function validaCPF($cpf)
{

    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

if (!validaCPF($cpf_limpo)) {
    $_SESSION['msg'] = "CPF inválido!";
    $_SESSION['alertMsg'] = "O CPF informado não é válido.";
    $_SESSION['alertIcon'] = 'error';
    header("location:$destino");
    exit;
}




// Se o nível for diferente de 2, zera todos os acessos
if ($nivel != 2) {
    $acessoEvento   = 0;
    $acessoNoticia  = 0;
    $acessoPesquisa = 0;
}

// Verifica se já existe um registro de acesso
$busca = mysqli_query($con, "SELECT * FROM acesso WHERE idUsuario = '$id'");

if ($busca->num_rows == 0) {
    // Inserir novo registro
    mysqli_query($con, "INSERT INTO acesso (idUsuario, acessoNoticia, acessoEvento, acessoPesquisa)
        VALUES ('$id', '$acessoNoticia', '$acessoEvento', '$acessoPesquisa')");
} else {
    // Atualizar registro existente
    mysqli_query($con, "UPDATE acesso SET 
        acessoNoticia = '$acessoNoticia', 
        acessoEvento = '$acessoEvento', 
        acessoPesquisa = '$acessoPesquisa' 
        WHERE idUsuario = '$id'");
}

// Atualiza o nível do usuário
mysqli_query($con, "UPDATE usuario SET nivel = '$nivel' WHERE id = '$id'");

if (mysqli_query($con, "update `usuario` set `cpf` = '$cpf',
                                            `nome` = '$nome',
                                            `dataNascimento` = '$dataNascimento',
                                            `telefone` = '$telefone',
                                            `email` = '$email',
                                            `senha` = '$senha',
                                            `caminhoFoto`='$dir',
                                            `cep` = '$cep',
                                            `rua` = '$rua',
                                            `nivel` = '$nivel',
                                            `bairro`='$bairro',
                                            `cidade` = '$cidade',
                                            `estado` = '$estado',
                                            `numero` = '$numero',
                                            `complemento`='$complemento',
                                            `situacao`='$situacao'
                                                where `id` = '$id'")) {
    $msg = "Perfil editado com Sucesso!";
    $msgType = "Perfil editado com sucesso!";
    $alertIcon = 'success';


    // $_SESSION["logado"] = true;
    // $_SESSION["nome"] = $nome;
    // $_SESSION["id"] = $id;
    // $_SESSION["cpf"] = $cpf;
    // $_SESSION["telefone"] = $telefone;
    // $_SESSION["email"] = $email;
    // $_SESSION["senha"] = $senha;
    // $_SESSION["caminhoFoto"] = $dir;
    // $_SESSION["dataNascimento"] = $dataNascimento;
    // $_SESSION["cep"] = $cep;
    // $_SESSION["numero"] = $usuario["numero"];
    // $_SESSION["rua"] = $rua;
    // $_SESSION["bairro"] = $bairro;
    // $_SESSION["cidade"] = $cidade;
    // $_SESSION["estado"] = $estado;
    // $_SESSION["numero"] = $numero;
    // $_SESSION["complemento"] = $complemento;
} else {
    $msg = "Erro";
    $msgType = "Erro ao editar o perfil!";
    $alertIcon = 'error';
}


$_SESSION["msg"] = $msgType;
$_SESSION['alertMsg'] = $msg;
$_SESSION['alertIcon'] = $alertIcon;

header("location:$destino");
