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

  require('partes/header.php');
  require("../model/connect.php");
  $consulta = mysqli_query($con, "SELECT count(*) AS qtdeUsuario FROM `usuario` WHERE status = 1 AND `nivel` < 5");

  ?>
  <main class="main-content">
    <div class="container">
      <!-- Useful Information Section -->
      <section id="useful-info">
        <h2 class="section-title">Vigilância Solidária</h2>
        <p class="section-description">Segurança é compromisso de todos.</p>
        <h2>Esse Canal será ativado ao atingirmos 50 contas. <br>Somos
        <?php while ($qtdeUsuario = mysqli_fetch_assoc($consulta)) {
                        echo $qtdeUsuario["qtdeUsuario"] . " e faltam " . (50 - $qtdeUsuario["qtdeUsuario"]);
                      } ?> moradores para liberarmos a Câmera 1. </h2>

        <div class="info-cards-grid">
          <a class="info-card" href="camera1.php">
            <div class="icon-circle">
              <i class="fa fa-video-camera"></i>
            </div>

            <div class="service-name">Câmera 1</div>
          </a>
          <a class="info-card" href="camera2.php">
            <div class="icon-circle">
              <i class="fa fa-video-camera"></i>
            </div>

            <div class="service-name">Câmera 2</div>
          </a>
          <a class="info-card" href="camera3.php">
            <div class="icon-circle">
              <i class="fa fa-video-camera"></i>
            </div>

            <div class="service-name">Câmera 3</div>
          </a>


        </div>
      </section>



      <?php
      require('partes/footer.php');
      ?>
</body>

</html>