<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serviços - Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/listaServico.css">
  
  <script src="../JS/sweetalert.js"></script>
  <script>
    detalhes = (id, nome) => {
      window.location.href = '../view/servico.php?id=' + id + '&nome=' + nome;
    }
  </script>

  <style>
    /* Additional styles specific to the services page */
  </style>
</head>

<body>
  <?php
  @session_start();
  if (isset($_SESSION["msg"])) {
    echo "<script>
    Swal.fire({
        title: '{$_SESSION['msg']}',
        text: '{$_SESSION['alertMsg']}',
        icon: '{$_SESSION['alertIcon']}'
    });
</script>";
    unset($_SESSION["msg"]);
    unset($_SESSION["alertMsg"]);
    unset($_SESSION["alertIcon"]);
}



  ?>
  <!-- Header -->
  <?php

  require("partes/header.php");
  ?>


  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Services Section -->
      <section id="services">
        <h2 class="section-title">Indicações</h2>
        <p class="section-description">Confira abaixo as indicações feitas pela comunidade Villa Dom Pedro</p>

        <div class="button-container">
          <a href="userAddProfissional.php" class="recommend-btn" style="background-color: #00597d;">
            <i class="fas fa-user-plus"></i> FAZER INDICAÇÃO
          </a>
        </div>
        <!-- <div class="button-container">
          <a href="minhasInd.php" class="recommend-btn">
            <i class="fas fa-user-check"></i> Minhas indicações
          </a>
        </div> -->


        <div class="services-grid">

          <?php

          require("../Model/connect.php");

          $consulta = mysqli_query($con, "
          SELECT p.idProfissao, p.nomeProfissao, COUNT(pr.id) AS total
          FROM profissao p
          JOIN profissional pr ON pr.idProfissao = p.idProfissao
          WHERE pr.status = 1 AND p.status = 1
          GROUP BY p.idProfissao, p.nomeProfissao
          order by p.nomeProfissao
      ");
      
    
          ?>

          <?php

          while ($servico = mysqli_fetch_assoc($consulta)) {

          ?>
            <button class="service-button" onclick="detalhes(<?= $servico['idProfissao'] ?>,'<?= $servico['nomeProfissao'] ?>')"><?= $servico["nomeProfissao"] ?> (<?=$servico["total"]?>)</button>

          <?php   } ?>


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