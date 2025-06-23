<?php
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino = "";
@session_start();



$dir = "../imagemNoticia/" . md5(time()) . ".jpg";


if (mysqli_query($con, "INSERT INTO noticia (manchete,informacao, imagem, dataNoticia,status) 
                            VALUES('$manchete','$informacao','$dir',curdate(),1);")) {
    move_uploaded_file($foto['tmp_name'], $dir);
    $_SESSION['msg'] = "Sucesso!";
    $_SESSION['alertMsg'] = "Noticia adicionada com sucesso!";
    $_SESSION['alertIcon'] = 'success';
    $destino = "../view/gerenciamentoNoticia.php";
} else {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Erro ao adicionar noticia!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/adicionarNoticia.php";
}




header("Location:$destino");
exit();
