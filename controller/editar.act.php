<?php

extract($_POST);
extract($_FILES);

require("../model/connect.php");
session_start();
$msg = "";


if ($pagina == "gerenciamento") {
    $destino = "../view/gerenciamento.php";
} else {
    $destino = "../view/paginaInicial.php";
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

$data = $dataNascimento;

// Converte a string para DateTime com verificação
$objData = DateTime::createFromFormat('d/m/Y', $data);

if ($objData && $objData->format('d/m/Y') === $data) {
    $dataFormatada = $objData->format('Y-d-m'); // Para salvar no banco

    // Validação de maioridade
    $hoje = new DateTime();
    $idade = $objData->diff($hoje)->y;

    if ($idade < 18) {
        $_SESSION['msg'] = "Somente é permitido o cadastro de maiores de 18 anos";
        $_SESSION['alertMsg'] = "Tente novamente";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/meuPerfil.php";
        header("Location:$destino");
        exit;
    }
$_SESSION["dataNascimento"] = $dataFormatada;
    // A data é válida e o usuário tem 18 anos ou mais
    // Aqui você pode seguir com o cadastro, usando $dataFormatada
} else {
    $_SESSION['msg'] = "Data de nascimento inválida";
    $_SESSION['alertMsg'] = "Tente novamente";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/meuPerfil.php";
    header("Location:$destino");
    exit;
}

$buscaTelefone = mysqli_query($con, "SELECT * FROM `usuario` WHERE `telefone` = '$telefone' AND `id` != '$id'");

if (mysqli_num_rows($buscaTelefone) > 0) {
    $_SESSION['msg'] = "Telefone já cadastrado";
    $_SESSION['alertMsg'] = "Tente novamente";
    $_SESSION['alertIcon'] = 'error';
    header("Location: ../view/meuPerfil.php");
    exit;
}

if (mysqli_query($con, "update `usuario` set `cpf` = '$cpf',
                                            `nome` = '$nome',
                                            `dataNascimento` = '$dataFormatada',
                                            `telefone` = '$telefone',
                                            `email` = '$email',
                                            `senha` = '$senha',
                                            `caminhoFoto`='$dir',
                                            `cep` = '$cep',
                                            `rua` = '$rua',
                                            `bairro`='$bairro',
                                            `cidade` = '$cidade',
                                            `estado` = '$estado',
                                            `numero` = '$numero',
                                             `situacao` = '$situacao',
                                            `complemento`='$complemento'
                                                where `id` = '$id'")) {
    $msg = "Perfil editado com Sucesso!";
    $msgType = "Perfil editado com sucesso!";
    $alertIcon = 'success';


    $_SESSION["logado"] = true;
    $_SESSION["nome"] = $nome;
    $_SESSION["id"] = $id;
    $_SESSION["cpf"] = $cpf;
    $_SESSION["telefone"] = $telefone;
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;
    $_SESSION["situacao"] = $situacao;
    $_SESSION["caminhoFoto"] = $dir;
    $_SESSION["dataNascimento"] = $dataNascimento;
    $_SESSION["cep"] = $cep;
    $_SESSION["numero"] = $usuario["numero"];
    $_SESSION["rua"] = $rua;
    $_SESSION["bairro"] = $bairro;
    $_SESSION["cidade"] = $cidade;
    $_SESSION["estado"] = $estado;
    $_SESSION["numero"] = $numero;
    $_SESSION["complemento"] = $complemento;
} else {
    $msg = "Erro";
    $msgType = "Erro ao editar o perfil!";
    $alertIcon = 'error';
}


$_SESSION["msg"]=$msgType;
$_SESSION['alertMsg']=$msg;
$_SESSION['alertIcon']=$alertIcon;

header("location:$destino");
