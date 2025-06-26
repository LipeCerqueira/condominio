<?php 
require("../model/connect.php");
extract($_POST);

$destino ="";
@session_start();

// $busca = mysqli_query($con, "SELECT * FROM situacao_unidade WHERE nomeProfissao LIKE '%$nomeProfissao%'");


// if($busca->num_rows == 0){
    
    if(mysqli_query($con, "INSERT INTO situacao_unidade (nome_situacao) 
                            VALUES('$situacao');")){
       
        $_SESSION['msg'] = "Cadastro com sucesso!";
        $_SESSION['alertMsg'] = "Situação cadastrado com sucesso!";
        $_SESSION['alertIcon'] = 'success';
        $destino = "../view/listarSituacao.php";
        
    } else {
        $_SESSION['msg'] = "Erro!";
        $_SESSION['alertMsg'] = "Erro ao adicionar situação!";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/adicionarSituacao.php";
       
    }
// }else{
//     $_SESSION['msg'] = "Erro!";
//     $_SESSION['alertMsg'] = "Serviço já cadastrado!";
//     $_SESSION['alertIcon'] = 'error';
//     $destino = "../view/adicionarServico.php";
// }



header("Location:$destino");
exit();
?>
