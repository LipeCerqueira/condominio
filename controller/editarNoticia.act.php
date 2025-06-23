<?php 

extract($_POST);
extract($_FILES);

require("../model/connect.php");
session_start();
$msg="";
$destino = "../view/gerenciamentoNoticia.php";


if($foto['size']>0){
$dir = "../imagemNoticia/" .md5(time()) . ".jpg";
move_uploaded_file ($foto['tmp_name'],$dir);
unlink($foto_atual);
}else{
    $dir = $foto_atual;
}



if(mysqli_query($con, "update `noticia` set `manchete` = '$manchete',
                                            `informacao` = '$informacao',
                                            `imagem`='$dir'
                                                where `idNoticia` = '$idNoticia'")){
$msg="Sucesso";
$_SESSION['alertMsg'] = "Noticia editada com sucesso!";
$_SESSION['alertIcon'] = 'success';
}else{
$msg="Erro";
$_SESSION['alertMsg'] = "Erro ao editar noticia!";
$_SESSION['alertIcon'] = 'error';
}

$_SESSION['msg'] = $msg;

header("location:$destino");



