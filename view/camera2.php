<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/infoUteis.css">
</head>

<body>
<?php     
$ip = $_SERVER['REMOTE_ADDR'];

$ip = $_SERVER['REMOTE_ADDR'];
if ($ip == '::1') {
   $ip = '127.0.0.1';
}
        $id_usuario = $_SESSION['id'];

        require('partes/header.php');
        require("../model/connect.php");
        mysqli_query($con, "INSERT INTO log (`id_usuario`, `acao`, `ip`, `dataHora`) 
                            VALUES('$id_usuario','CAMERA02','$ip',now());");

                            $busca = mysqli_query($con,"SELECT cam2 from `camera` WHERE id = '1'");
$camera = mysqli_fetch_assoc($busca);
?>

<iframe width="385" height="315" 
  src="<?=$camera['cam2']?>" 
  title="YouTube video player" frameborder="0" 
  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
  referrerpolicy="strict-origin-when-cross-origin" 
  allowfullscreen>
</iframe>
    <div class="button-container">
        <a href="cameras.php" class="recommend-btn">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </div>



    <?php
    require('partes/footer.php');
    ?>
</body>

</html>