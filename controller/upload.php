<?php
session_start();
require("../model/connect.php");

header('Content-Type: application/json');

if (isset($_FILES['foto'])) {
    $foto = $_FILES['foto'];
    $nomeTemporario = $foto['tmp_name'];
    $nomeFinal = "../imagensEventos/" . md5(time()) . ".jpg";

    $ip = $_POST['ip'] ?? '';
    $idUsuario = $_POST['id'] ?? 'anônimo';

    $busca = mysqli_query($con, "SELECT idFoto FROM galeriafotos WHERE idUsuario = '$idUsuario' AND status !=0 LIMIT 3");

    if ($busca->num_rows == 3) {
        echo json_encode([
            "title" => "Erro no envio",
            "status" => "error",
            "message" => "Você enviou o limite de fotos. Não é possível enviar outra."
        ]);
        exit;
    }

    if (move_uploaded_file($nomeTemporario, $nomeFinal)) {
        mysqli_query($con, "INSERT INTO galeriafotos (caminhoFoto,idUsuario, dataHora,status) 
            VALUES('$nomeFinal','$idUsuario',now(),2)");

        echo json_encode([
             "title" => "Foto enviada com Sucesso",
            "status" => "success",
            "message" => "Agradecemos sua participação! Sua foto será analisada antes da publicação."
        ]);
    } else {
        echo json_encode([
              "title" => "Erro no envio",
            "status" => "error",
            "message" => "Verifique o tamanho(MB) da imagem."
        ]);
    }
} else {
    echo json_encode([
          "title" => "Erro no envio",
        "status" => "error",
        "message" => "Nenhum arquivo recebido."
    ]);
}
