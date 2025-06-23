<?php require("sec.php") ?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias - Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</head>
<body>
  <!-- Header -->
  <?php 
  
  require("partes/header.php");
?>

<?php 
        require('../Model/connect.php');
        $consulta = mysqli_query($con, "SELECT *, DATE_FORMAT(dataNoticia,'%d/%m/%Y') AS data_formatada
        FROM noticia
        WHERE status =1
        order by idNoticia desc
       ;");
        
        ?>  


  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- News Section -->
      <section id="news">
        <h2 class="section-title">Últimas Notícias</h2>
        <p class="section-description">Fique por dentro das novidades e comunicados importantes</p>
        <p class="section-description"><strong>Gestores deste canal:</strong> </p>
        <?php
          $consulta2 = mysqli_query($con, "SELECT * FROM acesso a INNER JOIN
          usuario u ON a.idUsuario = u.id
          WHERE a.acessoNoticia = 1;");

          $usuario = mysqli_fetch_assoc($consulta2);
          $i =1;
          if ($usuario) {
            do {
              echo "<h4>$i. " . $usuario['nome'] . "</h4>";
              $i++;
            } while ($usuario = mysqli_fetch_assoc($consulta2));
          } else {
          echo "<h4 style='color:red'>Por enquanto não existem gestores ativos para este canal.</h4>";
          }

          ?>
        
        <div class="news-grid">
          <?php 
          while($noticia = mysqli_fetch_assoc($consulta)){
          ?>
          <div class="news-card">
            
            <img src="<?=$noticia['imagem']?>" alt="Jardim renovado" class="news-image">
            <div class="news-content">
              <div class="news-date"><?=$noticia['data_formatada']?></div>
              <h3 class="news-title"><?=$noticia['manchete']?></h3>
              <p class="news-excerpt"><?=$noticia['informacao']?></p>
              <div class="news-gallery">
                <!-- <img src="https://images.unsplash.com/photo-1558904541-efa843a96f01?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjN8fGdhcmRlbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Jardim 1" class="gallery-image">
                <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8Z2FyZGVufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Jardim 2" class="gallery-image">
                <img src="https://images.unsplash.com/photo-1586280268958-9483002d16dd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzZ8fGdhcmRlbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Jardim 3" class="gallery-image">
                <img src="https://images.unsplash.com/photo-1578894381163-e72c17f2d45f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDR8fGdhcmRlbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Jardim 4" class="gallery-image"> -->
              </div>
            </div>
          </div>
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