<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Condomínio - Portal do Visitante</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php

 @session_start();
if (isset($_SESSION["msg"]) && isset($_SESSION["alertIcon"])) {
    $msg = addslashes($_SESSION["msg"]);
    $alertMsg = isset($_SESSION["alertMsg"]) ? addslashes($_SESSION["alertMsg"]) : '';
    $alertIcon = $_SESSION["alertIcon"];

    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '$msg',
                text: '$alertMsg',
                icon: '$alertIcon'
            });
        });
    </script>";

    unset($_SESSION["msg"]);
    unset($_SESSION["alertMsg"]);
    unset($_SESSION["alertIcon"]);
}
  
  ?>

  <?php
  @session_start();
  require_once("../Model/connect.php");

  $consulta = mysqli_query($con, "SELECT count(*) as numeroIndicacoes FROM profissional
WHERE status = 1");
  $consulta2 = mysqli_query($con, "SELECT count(*) as numeroFotos FROM galeriafotos WHERE status = 1");
  // $consulta3 = mysqli_query($con, "SELECT * FROM acesso WHERE idUsuario = '{$_SESSION['id']}';");

$consulta3 = mysqli_query($con, "SELECT nomeCanal FROM canais");

$canais = array_column(mysqli_fetch_all($consulta3, MYSQLI_ASSOC), 'nomeCanal');


  ?>


  <!-- Header -->
  <?php

  require("partes/header.php");
  ?>


  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Welcome Section -->
      <section class="welcome-section">
        <!-- <h1>Bem-vindo</h1> -->


        <!-- Navigation Buttons -->
        <?php
        @session_start();

        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true && $_SESSION["nivel"] != "5") {

        ?>
          <a href="contribuicoes.php" class="nav-button">
            <?php
            if ($_SESSION["caminhoFoto"] == "") {
            ?>
              <i class="fas fa-user"></i>
            <?php
            } else {
            ?>
              <img src="<?= $_SESSION["caminhoFoto"] ?>" alt="" id="userFoto">
            <?php
            }


            ?>

            <!-- /Meu Painel/  -->
            <h2><?=$canais[0];?></h2>


          </a>
          <?php

        } else {

          if (isset($_SESSION["nivel"]) && $_SESSION["nivel"] != "5" || !isset($_SESSION["nivel"])) {

          ?>
            <a href="login.php" class="nav-button">
              <i class="fas fa-user"></i>
              <h2>Fazer Login</h2>

            </a>

          <?php
          }
        }

        if (isset($_SESSION["nivel"]) && $_SESSION["nivel"] == "5") {
          ?>

          <a href="adm.php" class="nav-button">
            <i class="fa-solid fa-arrow-right"></i>
            <h2>Voltar Administrativo</h2>

          </a>
        <?php
        }
        @session_start();

        if (isset($_SESSION["nivel"]) && $_SESSION["nivel"] > 2 &&  $_SESSION["nivel"] < 5) {
        ?>

          <a href="painelAssociacao.php" class="nav-button" style="background-color:rgb(186, 233, 252);">
            <i class="fa-solid fa-gear"></i>
            <h2>Gerenciamento</h2>

          </a>
        <?php
        }

        ?>


        <a href="infoUteis.php" class="nav-button">
          <i class="fa-solid fa-circle-info"></i>
          <h2>Informações Úteis</h2>

        </a>

        <?php

        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 1 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
          if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true) {

        ?>
          <?php

          }
        } else {
        }


        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE  idCanal = 2 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
          ?>


          <a href="listaServicos.php" class="nav-button">
            <i class="fa-solid fa-handshake"></i>
            <h2><?=$canais[1];?> (
              <?php while ($numeroIndicoes = mysqli_fetch_assoc($consulta)) {
                echo $numeroIndicoes["numeroIndicacoes"];
              } ?>


              )</h2>

          </a>
        <?php

        }

        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 7 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>
          <a href="classificados.php" class="nav-button">
            <i class="fa-solid fa-list"></i>
            <h2><?=$canais[2];?></h2>

          </a>
        <?php

        }

        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 8 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>
          <a href="galeriaFotos.php" class="nav-button">
            <i class="fa-regular fa-image"></i>
            <h2><?=$canais[3];?> (
              <?php while ($numeroFotos = mysqli_fetch_assoc($consulta2)) {
                echo $numeroFotos["numeroFotos"];
              } ?>


              )</h2>

          </a>

        <?php

        }

        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 11 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>

          <a href="cameras.php" class="nav-button">
            <i class="fa fa-video-camera"></i>
            <h2><?=$canais[5];?></h2>

          </a>

        <?php

        }

        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 10 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>
          <a href="evento.php" class="nav-button" style="background-color: #F3F3F3;">
            <i class="fas fa-calendar-alt icon"></i>
            <h2><?=$canais[4];?></h2>

          </a>
        <?php

        }
        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 13 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>

          <a href="noticia.php" class="nav-button" style="background-color: #F3F3F3;">
            <i class="fas fa-newspaper icon"></i>
            <h2><?=$canais[6];?></h2>

          </a>
        <?php


        }
        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 16 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>

          <a href="pesquisaOpiniao.php" class="nav-button" style="background-color: #F3F3F3;">
            <i class="fa-solid fa-comments"></i>
            <h2><?=$canais[7];?></h2>

          </a>
        <?php
        }

        $resultado = mysqli_query($con, "SELECT status FROM canais WHERE idCanal = 18 AND status = 1 ");


        if ($resultado && $resultado->num_rows > 0) {
        ?>


          <a href="avipe.php" class="nav-button">
            <i class="fa-solid fa-star"></i>
            <h2><?=$canais[8];?></h2>

          </a>

        <?php
        }
        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true) {

        ?>
          <a href="app.php" class="nav-button" style="background-color:rgb(186, 233, 252);">
            <i class="fa-solid fa-download"></i>
            <h2>Baixar APP</h2>

          </a>
        <?php

        }
         if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true) {
        ?>
        <a href="../controller/logout.php" class="nav-button">
           <i class="fa-solid fa-right-from-bracket"></i>
            <h2>Sair</h2>

          </a>

          <?php 
          
         }
          ?>
    </div>
    </section>
    </div>
  </main>

  <!-- Footer -->
  <?php

  require("partes/footer.php")

  ?>
</body>

</html>