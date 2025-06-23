
<?php
require("../model/connect.php");
extract($_POST);

$destino = "";
@session_start();
$categoria = "";
$buscaTelefone = mysqli_query($con, "SELECT * FROM `profissional` WHERE `telefone` = '$telefone' AND idProfissao = '$profissao';");

if($telefone == $_SESSION['telefone']){
  $_SESSION['msg'] = "Erro!";
  $_SESSION['alertMsg'] = "Não é permitido fazer autoindicação ";
  $_SESSION['alertIcon'] = 'error';
  if ($origem == "usuario") {
  $destino = "../view/listaServicos.php";
}else{
   $destino = "../view/gerenciamentoProfissional.php";
}
  header("Location:$destino");
exit();
}


if ($buscaTelefone->num_rows == 0) {
  if (mysqli_query($con, "INSERT INTO profissional (nome,telefone,idProfissao, status, indicacao, horaIndicacao, destaque) 
  VALUES('$nome','$telefone','$profissao',1,'$indicado', now(),0);")) {
    //move_uploaded_file($foto['tmp_name'],$dir);
    if ($origem == "usuario") {
      $_SESSION['msg'] = "Indicação realizada com sucesso";

      $consulta = mysqli_query($con, "SELECT * FROM profissao");

      while($servico = mysqli_fetch_assoc($consulta)){
        if($profissao == $servico["idProfissao"]){
            $categoria = $servico["nomeProfissao"];
        }
      }

      mysqli_query($con, "INSERT INTO log (`id_usuario`, `acao`, `ip`, `dataHora`,`categoria`) 
      VALUES('$id','Indicação','$ip',now(),'$categoria');");
    } else {
      $_SESSION['msg'] = "Serviço cadastrado com sucesso";
    }
    $_SESSION['alertIcon'] = 'success';
    $_SESSION['alertMsg'] = "Profissional cadastrado com sucesso!";
    $destino = "../view/gerenciamentoProfissional.php";
  } else {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Erro ao adicionar profissional!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/profissionais.php";
  }
} else {
  $_SESSION['msg'] = "Erro!";
  $_SESSION['alertMsg'] = "Já existe uma indicação com esse número ";
  $_SESSION['alertIcon'] = 'error';
  if ($origem != "usuario") {
    $destino = "../view/gerenciamentoProfissional.php";
  }
}







if ($origem == "usuario") {
  $destino = "../view/listaServicos.php";
}

header("Location:$destino");
exit();
?>
