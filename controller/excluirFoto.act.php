<?php 

@$local = $_GET['local'];
@$id =  $_GET["id"];
@$status =  $_GET["status"];
@$ip =  $_GET["ip"];
@$id_usuario =  $_GET["usuario"];

require("../model/connect.php");
$destino="";

    
    


    if($local =="user"){
        mysqli_query($con, "UPDATE `galeriaFotos` SET status = 0 WHERE idFoto = '$id'");
        $destino = "../view/minhasFotos.php";
           mysqli_query($con, "INSERT INTO log (`id_usuario`, `acao`, `ip`, `dataHora`) 
                            VALUES('$id_usuario','Exclusão de Foto','$ip',now());");
    }else{
        mysqli_query($con, "DELETE FROM `curtidas` WHERE idFoto = '$id'");
         mysqli_query($con, "DELETE FROM `galeriaFotos` WHERE idFoto = '$id'");
        $destino = "../view/gerenciarGaleria.php";
    }



$msg = "Foto excluida com sucesso!";
$_SESSION['alertMsg'] = "foto excluida";
$_SESSION['alertIcon'] = 'success';
$_SESSION['msg'] = $msg;
header("location:$destino");
 



?>