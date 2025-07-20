<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino ="";
@session_start();

require_once("../model/antiInjection.php");
if(antiInjection($nome) == 0 || antiInjection($dataInicio) == 0 || antiInjection($horaInicio) == 0 || antiInjection($pontoEncontro) == 0 || antiInjection($duracao) == 0 || antiInjection($informacoes) == 0) {
    $_SESSION["msg"] = "Dados inválidos!";  
    $_SESSION['alertMsg'] = "Tentativa de injeção detectada!";
    $_SESSION['alertIcon'] = 'error';
    header("location:../view/adicionarEvento.php");
    exit;
}


    $dir = "../imagensEventos/" .md5(time()) . ".jpg";

    if(mysqli_query($con, "INSERT INTO evento (nome,dataInicio, horaInicio, pontoEncontro,duracao, informacoes, imagem,status,dataCriacao) 
                            VALUES('$nome','$dataInicio','$horaInicio' ,'$pontoEncontro','$duracao','$informacoes', '$dir',1,now());")){
        move_uploaded_file($foto['tmp_name'],$dir);
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Evento adicionado com sucesso!";
        $_SESSION['alertIcon'] = 'success';
        $destino = "../view/gerenciamentoEvento.php";
        
    } else {
        $_SESSION['msg'] = "Erro";
        $_SESSION['alertMsg'] = "Erro ao adicionar evento!";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/adicionarEvento.php";
       
    }




header("Location:$destino");
exit();
?>
