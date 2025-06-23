<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equipe de Desenvolvedores - Portal do Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/desenvolvedor.css">
  <script src="../JS/sweetalert.js"></script>
</head>
<body>
  <!-- Header -->
 
  <?php 
  
    require("partes/header.php")
  
  ?>
  
  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Team Section -->
      <section class="team-section">
        <h1>Equipe de Desenvolvedores</h1>
        <p class="section-description">Conheça os profissionais responsáveis pela Idealização e Desenvolvimento do Portal Villa Dom Pedro.</p>
        
        <div class="team-members">
          <div class="team-member">
            <div class="member-image">
              <img src="../fotoUsuarios/rodrigo.jpeg" alt="">
            </div>
            <h3 class="member-name">Rodrigo Aguilar</h3>
            <p class="member-role">Idealizador</p>
            <div class="separator"></div>
            <!-- <p class="member-description">Especialista em React e interfaces de usuário, com mais de 5 anos de experiência em desenvolvimento web.</p> -->
          </div>
          
          <div class="team-member">
            <div class="member-image">
              <img src="../fotoUsuarios/fernando.jpeg" alt="">
            </div>
            <h3 class="member-name">Fernando Martins</h3>
            <p class="member-role">Coordenador de Projeto</p>
            <div class="separator"></div>
            <!-- <p class="member-description">Desenvolvedor fullstack com foco em Node.js e arquitetura de sistemas distribuídos.</p> -->
          </div>
          
          <div class="team-member">
            <div class="member-image">
              <img src="../fotoUsuarios/felipe.jpeg" alt="">
            </div>
            <h3 class="member-name">Felipe Cerqueira</h3>
            <p class="member-role">Desenvolvedor</p>
            <div class="separator"></div>
            <!-- <p class="member-description">Designer com experiência em criar experiências de usuário intuitivas e acessíveis para aplicações web.</p> -->
          </div>
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