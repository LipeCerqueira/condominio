<?php
session_start();
require("../Model/connect.php");

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Você precisa estar logado para curtir fotos.']);
    exit;
}

$idUsuario = $_SESSION['id']; // garanta que este valor esteja sendo salvo no login
$id_foto = intval($_POST['id_foto'] ?? 0);

// Verifica se o usuário já curtiu essa foto
$verifica = mysqli_query($con, "SELECT * FROM curtidas WHERE idUsuario = $idUsuario AND idFoto = $id_foto");

if (mysqli_num_rows($verifica) > 0) {
    echo json_encode(['success' => false, 'message' => 'Você já curtiu esta foto.']);
    exit;
}

// Registra a curtida
$inserir = mysqli_query($con, "INSERT INTO curtidas (idUsuario, idFoto) VALUES ($idUsuario, $id_foto)");



if ($inserir) {
    // Atualiza contador na galeria
    mysqli_query($con, "UPDATE galeriaFotos SET curtidas = curtidas + 1 WHERE idFoto = $id_foto");

    $ip = $_SERVER['REMOTE_ADDR'];
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    mysqli_query($con, "INSERT INTO log (`id_usuario`, `acao`, `ip`, `dataHora`) 
                    VALUES('$idUsuario', 'Curtida', '$ip', NOW())");

    // Busca o novo total
    $res = mysqli_query($con, "SELECT curtidas FROM galeriaFotos WHERE idFoto = $id_foto");
    $dados = mysqli_fetch_assoc($res);

    echo json_encode(['success' => true, 'novasCurtidas' => $dados['curtidas']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao registrar curtida.']);
}
