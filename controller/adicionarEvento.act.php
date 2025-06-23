<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino ="";
@session_start();



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
