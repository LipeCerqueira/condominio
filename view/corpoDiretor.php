<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corpo Diretor - Portal do Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
         <link rel="stylesheet" href="../css/paginaInicial.css">
         <link rel="stylesheet" href="../css/corpoDiretor.css">
</head>
<body>
 <?php 
  
  require("partes/header.php");
?>

  
  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Board of Directors Section -->
      <section class="board-section">
        <h1>Corpo Diretor</h1>
        <p class="section-description">Conheça os membros do corpo diretor responsáveis pela administração e gestão do condomínio.</p>
        
        <div class="board-members">
          <div class="board-member">
            <div class="member-image">
              <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c" alt="João Silva">
            </div>
            <div class="member-info">
              <h3 class="member-name">João Silva</h3>
              <p class="member-position">Presidente</p>
            </div>
          </div>
          
        
        </div>
      </section>
    </div>
  </main>
  
  <!-- Footer -->
 <?php 
  
  require("partes/footer.php");
?>

</body>
</html>