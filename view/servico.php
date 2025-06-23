<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profissionais - Condomínio</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  
	<link rel="stylesheet" href="../css/paginaInicial.css" >
	
	
	
  <script>
    function redirecionarParaWhatsApp(link) {
      window.open(link, '_blank');
    }
  </script>
</head>

<body>
  <!-- Header -->
  <?php
  require("partes/header.php");
  ?>
  <!-- Main Content -->
  <?php
  function formatarTelefone($telefone)
  {
    return substr($telefone, 0, 10) . '-XXXX';

    // Monta o link do WhatsApp

    // Remove tudo que não for número
    $numeroLimpo = preg_replace('/\D/', '', $telefone);
  }

  ?>
  <main class="main-content">
    <div class="container">
      <!-- Professionals Section -->
      <section id="professionals">
        <?php

        extract($_GET);

        require_once("../Model/connect.php");

        $consulta = mysqli_query($con, "SELECT profissional.*, profissao.*, 
       DATE_FORMAT(profissional.horaIndicacao, '%d/%m/%Y - %H:%i') AS data_formatada 
FROM profissional
INNER JOIN profissao ON profissional.idProfissao = profissao.idProfissao
WHERE profissional.idProfissao = '$id' AND profissional.status = 1
ORDER BY profissional.destaque DESC, RAND()");

        ?>
        <h2 class="section-title"><?= $nome ?></h2>
        <p class="section-description">Aqui você encontra empresas e profissionais recomendados pela comunidade Villa Dom Pedro</p>
        <!-- Botão para indicação de profissionais -->
        <div class="professionals-grid">
          <?php

          while ($servico = mysqli_fetch_assoc($consulta)) {
            @session_start();
            $telefoneBruto = $servico['telefone'];
            $numeroLimpo = preg_replace('/\D/', '', $telefoneBruto);
            $mensagem = "Olá! Recebi a sua indicação através do Portal Villa Dom Pedro e gostaria de saber mais sobre seus serviços.";
            $mensagemCodificada = urlencode($mensagem);
            $linkWhatsapp = "https://wa.me/55" . $numeroLimpo . "?text=" . $mensagemCodificada;
          ?>

            <div class="professional-card" <?php if (isset($_SESSION["logado"])): ?>
              onclick="redirecionarParaWhatsApp('<?= $linkWhatsapp ?>')"
              style="cursor: pointer;"
              <?php endif; ?>>
              <?php 
                if($servico['destaque'] ==1){
                  ?>
                     <div class="category-tag"> <i class="fa-solid fa-star" style="color: gold;"></i> Destaque</div>
                  <?php 
                }
              
              ?>
    

              <?php 
              
               
              ?>
              <h3 class="professional-name"><?= strtoupper($servico['nome']) ?></h3>

              <div class="professional-phone">
                <i class="fa-brands fa-square-whatsapp" class="phone-icon "></i>
                <?php


                if (isset($_SESSION["logado"])) {
                  echo "<span> $telefoneBruto</span>";
                } else {
                  echo "<span> " . formatarTelefone($telefoneBruto) . "</span>";
                }


                ?>

              </div>
              <p class="professional-contact">Indicado por: <?= $servico['indicacao'] ?><br> <?= $servico['data_formatada'] ?></p>
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