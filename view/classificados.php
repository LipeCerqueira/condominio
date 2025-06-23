<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classificados - Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/classificados.css">
  <script src="../JS/sweetalert.js"></script>
  <script>
    function detalhes(tipo, nome){
      window.location.href = 'detalheClassificados.php?tipo=' + tipo + '&nome=' + nome;
    }
  </script>
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
        <h2 class="section-title">Classificados</h2>
        <p class="section-description">Quer comprar, vender ou alugar na Villa Dom Pedro, este é o seu canal!</p>
        <div class="button-container">
          <a href="anuncio.php" class="recommend-btn">
          <i class="fa-solid fa-tag"></i>  ANUNCIAR
          </a>
        </div>
        <div class="services-grid">
          <a onclick="detalhes(2,'Imóveis')" class="service-button">
            <div>
              <i class="fas fa-home service-icon"></i>
              Imóveis
            </div>
          </a>
          <a onclick="detalhes(1,'Veículos')" class="service-button">
            <div>
              <i class="fas fa-car service-icon"></i>
              Veículos
            </div>
          </a>
          <a onclick="detalhes(3,'Geral')" class="service-button">
            <div>
              <i class="fas fa-shopping-bag service-icon"></i>
              Geral
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