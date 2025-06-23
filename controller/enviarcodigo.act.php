<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require("../Model/connect.php");
require '../src/PHPMailer.php';
require '../src/SMTP.php';
require '../src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$cpf = $_POST['cpf'] ?? '';
$destino = '';

if (empty($cpf)) {
    $_SESSION['msg'] = "CPF é obrigatório!";
    $_SESSION['alertIcon'] = 'error';
    header("Location: ../view/recuperarSenha.php");
    exit;
}

$busca = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'");

if ($busca && $busca->num_rows > 0) {
    $usuario = mysqli_fetch_assoc($busca);
    $email = $usuario["email"];
    $nome = $usuario["nome"];  // <-- Captura o nome
    $id = $usuario["id"];
    $codigo = mt_rand(100000, 999999);

    mysqli_query($con, "UPDATE `usuario` SET token_recuperacao = '$codigo' WHERE id = '$id'");

    $_SESSION['emailValidado'] = $email;
    $_SESSION['idUsuario'] = $id;

    $link = "https://portalvdp.com.br/view/validaCodigo.php";

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'suporte@ontimenet.com.br';
        $mail->Password = 'alfp qrlh fhuk nwex';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('suporte@ontimenet.com.br', 'Portal VDP');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Recuperação de Senha';

        $mail->Body = "
            <p>Olá <b>$nome</b>,</p>
            <p>Você solicitou a alteração da sua senha. Abaixo está o seu código de verificação:</p>
            <div style='text-align: middle; margin: 20px 0;'>
                <span style='font-size: 24px; font-weight: bold;'>$codigo</span>
            </div>           
            <p>Se você não solicitou essa alteração, por favor, desconsidere este e-mail.</p>
            <p>Atenciosamente,<br><b>Equipe Portal VDP</b></p>
        ";

        $mail->send();

        $_SESSION['msg'] = "Código enviado para seu e-mail.";
        $_SESSION['alertIcon'] = 'success';
    } catch (Exception $e) {
        $_SESSION['msg'] = "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        $_SESSION['alertIcon'] = 'error';
    }

    $destino = "../view/validaCodigo.php";
} else {
    $_SESSION['msg'] = "CPF inválido!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/recuperarSenha.php";
}

header("Location: $destino");
exit;
?>