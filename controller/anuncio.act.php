
<?php

extract($_POST);
extract($_FILES);
$destino = "";
@session_start();
$dir = "../imagensAnuncio/" . md5(time()) . ".jpg";
$categoria = "";

if ($tipo == 1) {
  $categoria = "Carro";
} else if ($tipo == 2) {
  $categoria = "Imóvel";
} else {
  $categoria = "Geral";
}



require("../model/connect.php");


$query = mysqli_query($con, "SELECT COUNT(*) as total FROM classificados WHERE id_usuario = '$id_usuario' AND tipo = '$tipo'");
$result = mysqli_fetch_assoc($query);

if ($result['total'] >= 3) {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Você já possuí 3 anúncios dessa categoria cadastrados!";
    $_SESSION['alertIcon'] = 'error';
} else {
  if (mysqli_query($con, "INSERT INTO classificados (titulo,imagem,id_usuario, descricao, valor, tipo, dataAnuncio, status) 
  VALUES('$titulo','$dir','$id_usuario','$descricao','$valor','$tipo', now(), 'Aguardando Aprovação');")) {
    move_uploaded_file($foto['tmp_name'], $dir);

    $_SESSION['msg'] = "Anúncio cadastrado com sucesso";

    $_SESSION['alertIcon'] = 'success';
    $_SESSION['alertMsg'] = "Suas informaçoes serão avaliadas e publicadas em breve.";

    mysqli_query($con, "INSERT INTO log (`id_usuario`, `acao`,`categoria`, `ip`, `dataHora`) 
  VALUES('$id_usuario','Anúncio','$categoria','$ip',now());");
  } else {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Anúncio cadastrado com sucesso!";
    $_SESSION['alertIcon'] = 'error';
  }
}






$destino = "../view/classificados.php";


header("Location:$destino");
exit();
