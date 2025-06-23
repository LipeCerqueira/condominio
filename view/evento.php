 <?php require("sec.php") 
  ?>
 <!DOCTYPE html>
 <html lang="pt-BR">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Eventos - Condomínio</title>
   <link rel="stylesheet" href="styles.css">
   <!-- Font Awesome for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
   <link rel="stylesheet" href="../css/paginaInicial.css">
 </head>

 <body>
   <!-- Header -->
   <?php

    require("partes/header.php");
    ?>
   <!-- Main Content -->
   <main class="main-content">
     <div class="container">
       <!-- Events Section -->
       <section id="events">
         <h2 class="section-title">Eventos Internos</h2>
         <p class="section-description">Venha participar dos nossos eventos! Saúde, esporte, lazer e muita interação esperam por você. </p>
         <p class="section-description"><strong>Gestores deste canal:</strong> </p>
         <?php

          require('../Model/connect.php');
          $consulta2 = mysqli_query($con, "SELECT * FROM acesso a INNER JOIN
  usuario u ON a.idUsuario = u.id
           WHERE a.acessoEvento = 1;");


          $usuario = mysqli_fetch_assoc($consulta2);
          $i =1;
          if ($usuario) {
            do {

              echo "<h4> $i. " . $usuario['nome'] . "</h4>";
              $i++;
            } while ($usuario = mysqli_fetch_assoc($consulta2));
          } else {
            echo "<h4 style='color:red'>Por enquanto não existem gestores ativos para este canal.</h4>";
            
          }


          ?>


         <?php

          $consulta = mysqli_query($con, "SELECT *, DATE_FORMAT(dataInicio,'%d/%m/%Y') AS data_formatada, 
        DATE_FORMAT(horaInicio, '%H:%i') AS hora_inicio,
        DATE_FORMAT(duracao, '%H:%i') AS duracao_evento
        FROM evento
        WHERE status =1
        order by idEvento desc
       ;");

          ?>


         <div class="events-grid">
           <?php
            date_default_timezone_set('America/Sao_Paulo');

            $fmt = new IntlDateFormatter(
              'pt_BR',
              IntlDateFormatter::FULL,
              IntlDateFormatter::NONE,
              'America/Sao_Paulo',
              IntlDateFormatter::GREGORIAN,
              'EEEE'
            );
            while ($evento = mysqli_fetch_assoc($consulta)) {

              $data = new DateTime($evento['dataInicio']);
              $diaSemana = $fmt->format($data);
              $diaSemanaCapitalizado = mb_convert_case($diaSemana, MB_CASE_TITLE, "UTF-8");
            ?>
             <div class="event-card">
               <img src="<?= $evento['imagem'] ?>" alt="caminhada" class="event-image">
               <div class="event-content">

                 <div class="event-date"><?= $evento['data_formatada'] ?> - <?= $diaSemanaCapitalizado ?> </div>
                 <h3 class="event-title"><?= $evento['nome'] ?></h3>
                 <div class="event-details">
                   <div class="event-detail">
                     <div class="detail-label">Local:</div>
                     <div class="detail-value"><?= $evento['pontoEncontro'] ?></div>
                   </div>
                   <div class="event-detail">
                     <div class="detail-label">Inicio:</div>
                     <div class="detail-value"><?= $evento['hora_inicio'] ?></div>
                   </div>
                   <div class="event-detail">
                     <div class="detail-label">Duração:</div>
                     <div class="detail-value"><?= $evento['duracao_evento'] ?></div>
                   </div>
                 </div>
                 <p class="event-description"><?= $evento['informacoes'] ?></p>
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