
<?php require("sec.php") ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVIPE - Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/avipe.css">
  <script src="../JS/sweetalert.js"></script>
</head>
<body>
  <!-- Header -->
  <?php 
  
  require("partes/header.php");
?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- AVIPE Section -->
      <section id="avipe">
        <h2 class="section-title">Associação</h2>
        <p class="section-description">Juntos somos mais fortes</p>
        
        <div class="services-grid">
          <a href="documentos.php" class="service-button">Documentos</a>
          <a href="boletimSemanal.php" class="service-button">Boletim Semanal</a>
          <a href="historia.php" class="service-button">História</a>
          <a href="mvv.php" class="service-button">Missão, Visão, Valores</a>
          <a href="corpoDiretor.php" class="service-button">Corpo Diretor</a>
          <a href="#" class="service-button">Projetos</a>
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
