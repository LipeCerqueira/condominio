
<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clima tempo</title>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="styles.css" -->
<link rel="stylesheet" href="../css/paginaInicial.css">
<link rel="stylesheet" href="../css/infoUteis.css">
<!-- link rel="stylesheet" href="../css/setup.css" -->
 
	<script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <style>

  </style>
</head>

<body>
  <!-- Header -->
  <?php

  require("partes/header.php");
  ?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Useful Information Section -->
      <section id="useful-info">
        <h2 class="section-title">Clima Tempo</h2>
        <p class="section-description">Saiba como está o clima na nossa região</p>

        <div id="ww_ee849d08a7100" v='1.3' loc='id' a='{"t":"horizontal","lang":"pt","sl_lpl":1,"ids":["wl5046"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Fonte de dados meteorológicos: <a href="https://wetterlang.de" id="ww_ee849d08a7100_u" target="_blank">Wettervorschau 30 tage</a></div><script async src="https://app3.weatherwidget.org/js/?id=ww_ee849d08a7100"></script>
  <?php

  require("partes/footer.php")

  ?>
</body>

</html>