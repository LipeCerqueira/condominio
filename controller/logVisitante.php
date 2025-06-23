<?php 
extract($_GET);
require("../Model/connect.php");

// Verifica se já existe um log com o mesmo IP e mesma data
$verifica = mysqli_query($con, "
    SELECT 1 FROM log 
    WHERE acao = 'Visitante' 
    AND ip = '$ip' 
    AND DATE(dataHora) = CURDATE()
");

if (mysqli_num_rows($verifica) == 0) {
    // Se não existir, insere
    mysqli_query($con, "
        INSERT INTO log (`acao`, `ip`, `dataHora`) 
        VALUES('Visitante','$ip',NOW())
    ");
}

$destino = "../view/paginaInicial.php";
header("Location: $destino");
exit;
?>
