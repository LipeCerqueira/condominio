<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino ="";
@session_start();



  

    if(mysqli_query($con, "INSERT INTO area (nome,descricao, capacidade, horario_abertura,horario_fechamento,status,data_cadastro) 
                            VALUES('$nome','$descricao','$capacidade' ,'$abertura','$fechamento',1,now());")){
      
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Dependência adicionado com sucesso!";
        $_SESSION['alertIcon'] = 'success';
        $destino = "../view/listarDependencias.php";
        
    } else {
        $_SESSION['msg'] = "Erro";
        $_SESSION['alertMsg'] = "Erro ao adicionar Dependência!";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/adicionarDependencia.php";
       
    }




header("Location:$destino");
exit();
?>
