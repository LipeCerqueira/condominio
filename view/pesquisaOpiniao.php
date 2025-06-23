<?php require("sec.php") ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisa de Opinião - Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/pesquisaOpiniao.css">
  
</head>
<body>
  <!-- Header -->
  <?php 
  
    require("partes/header.php");
  ?>
  
  
  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Opinion Survey Section -->
      <section id="opinion-survey">
        <h2 class="section-title">Pesquisa de Opinião</h2>
        <p class="section-description">Sua opinião é muito importante para melhorarmos nosso bairro.</p>
        <p class="section-description"><strong>Gestores deste canal:</strong> </p>
        <?php
          require('../Model/connect.php');
          $consulta2 = mysqli_query($con, "SELECT * FROM acesso a INNER JOIN
          usuario u ON a.idUsuario = u.id
          WHERE a.acessoPesquisa = 1;");

          $usuario = mysqli_fetch_assoc($consulta2);
          $i = 1;
          if ($usuario) {
            do {
              echo "<h4>$i. " . $usuario['nome'] . "</h4>";
              $i++;
            } while ($usuario = mysqli_fetch_assoc($consulta2));
          } else {
             echo "<h4 style='color:red'>Por enquanto não existem gestores ativos para este canal.</h4>";
          }
          ?>
        
        <div class="survey-container">
          <h3 class="survey-title">Aqui faremos as pesquisas de opinião sobre as melhorias do nosso loteamento</h3>
          
          <!-- <form id="survey-form">
            <div class="survey-options">
              <div class="survey-option">
                <input type="radio" id="agua" name="melhoria" value="agua">
                <i class="fas fa-tint icon"></i>
                <label for="agua">Abastecimento de água</label>
              </div>
              
              <div class="survey-option">
                <input type="radio" id="seguranca" name="melhoria" value="seguranca">
                <i class="fas fa-shield-alt icon"></i>
                <label for="seguranca">Segurança</label>
              </div>
              
              <div class="survey-option">
                <input type="radio" id="iluminacao" name="melhoria" value="iluminacao">
                <i class="fas fa-lightbulb icon"></i>
                <label for="iluminacao">Iluminação pública</label>
              </div>
              
              <div class="survey-option">
                <input type="radio" id="lazer" name="melhoria" value="lazer">
                <i class="fas fa-umbrella-beach icon"></i>
                <label for="lazer">Entretenimento/Lazer</label>
              </div>
            </div>
            
            <button type="submit" class="submit-button">Enviar</button>
          </form> -->
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
