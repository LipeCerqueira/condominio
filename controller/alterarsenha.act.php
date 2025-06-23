<?php
session_start();
require("../Model/conexao.php");

$id = $_POST['id'] ?? '';
$novaSenha = $_POST['nova_senha'] ?? '';

if (empty($id) || empty($novaSenha)) {
    $_SESSION['msg'] = "Dados inválidos.";
    $_SESSION['alertIcon'] = 'error';
    header("Location: ../View/alterarSenha.php");
    exit;
}

$senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

$update = mysqli_query($con, "UPDATE `usuario` SET `senha` = '$senhaHash', `token_recuperacao` = NULL, `tentativas_codigo` = 0, `bloqueado_ate` = NULL WHERE `id` = '$id'");

if ($update) {
    $_SESSION['msg'] = "Senha alterada com sucesso!";
    $_SESSION['alertIcon'] = 'success';
    header("Location: ../View/login.php");
} else {
    $_SESSION['msg'] = "Erro ao alterar a senha.";
    $_SESSION['alertIcon'] = 'error';
    header("Location: ../View/alterarSenha.php");
}
?>
