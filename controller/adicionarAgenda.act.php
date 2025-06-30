<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino ="";
@session_start();



  

    if(mysqli_query($con, "INSERT INTO agendamento_area_comum (id_morador,id_area, data_agendamento, hora_inicio,hora_fim,observacoes,status,data_solicitacao) 
                            VALUES('$morador','$area','$data' ,'$inicio','$fim','$observacao','$status',now());")){
      
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Agendamento realizado com sucesso!";
        $_SESSION['alertIcon'] = 'success';
        $destino = "../view/listarAgendamentos.php";
        
    } else {
        $_SESSION['msg'] = "Erro";
        $_SESSION['alertMsg'] = "Erro ao Agendar!";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/adicionarAgenda.php";
       
    }




header("Location:$destino");
exit();
?>
