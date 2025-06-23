<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contribuições</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/classificados.css">
  <script src="../JS/sweetalert.js"></script>
  
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
      <!-- Classificados Section -->
      <section id="classificados">
        <h2 class="section-title">Meu Cadastro</h2>
        <p class="section-description"></p>
        <div class="services-grid">
          <a href="meuPerfil.php" class="service-button">
            <div>
              <i class="fas fa-user service-icon"></i>
              Perfil
            </div>
          </a>
          <a href="meusAnuncios.php" class="service-button">
            <div>
              <i class="fa-solid fa-list service-icon"></i>
              Anúncios
            </div>
          </a>
          <a href="minhasIndicacoes.php" class="service-button">
            <div>
               <i class="fa-solid fa-handshake service-icon"></i>
              Indicações
            </div>
          </a>
          <a href="minhasFotos.php" class="service-button">
            <div>
               <i class="fa-regular fa-image service-icon"></i>
              Fotos
            </div>
          </a>
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