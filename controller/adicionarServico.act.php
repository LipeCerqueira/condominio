<?php 
require("../model/connect.php");
extract($_POST);

$destino ="";
@session_start();

$busca = mysqli_query($con, "SELECT * FROM profissao WHERE nomeProfissao LIKE '%$nomeProfissao%'");


if($busca->num_rows == 0){
    
    if(mysqli_query($con, "INSERT INTO profissao (nomeProfissao, status) 
                            VALUES('$nomeProfissao', 1);")){
       
        $_SESSION['msg'] = "Cadastro com sucesso!";
        $_SESSION['alertMsg'] = "Serviço cadastrado com sucesso!";
        $_SESSION['alertIcon'] = 'success';
        $destino = "../view/adm.php";
        
    } else {
        $_SESSION['msg'] = "Erro!";
        $_SESSION['alertMsg'] = "Erro ao adicionar serviço!";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/adicionarServico.php";
       
    }
}else{
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Serviço já cadastrado!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/adicionarServico.php";
}



header("Location:$destino");
exit();
?>
