<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Administrativo - Condomínio</title>
  <link rel="stylesheet" href="../css/adm.css">
  <!-- Ícones FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="../JS/sweetalert.js"></script>
</head>

<body>

  <?php

  require_once("../Model/connect.php");

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

  if ($_SESSION['nivel'] == 2) {
    $consulta = mysqli_query($con, "SELECT u.nome, u.id,a.* FROM usuario u
    INNER JOIN acesso a ON u.id = a.idUsuario
     WHERE a.idUsuario = '{$_SESSION['id']}'");
    $usuario = mysqli_fetch_assoc($consulta);
  }

  ?>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-header">
        <h2>Portal VPD</h2>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li><a href="painelAssociacao.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <?php
          if ($_SESSION['nivel'] == 3) {

          ?>
            <li><a href="painelControleDeAcesso.php"><i class="fas fa-users"></i> Controle de Acesso </a></li>
          <?php
          }
          ?>
          <?php


          if ($_SESSION['nivel'] == 3 || $usuario['acessoEvento'] == 1) {

          ?>
            <li><a href="gerenciamentoEvento.php"> <i class="fa-regular fa-image"></i> Eventos</a></li>
          <?php
          }
          if ($_SESSION['nivel'] == 3 || $usuario['acessoNoticia'] == 1) {
          ?>
            <li><a href="gerenciamentoNoticia.php"><i class="fa-solid fa-newspaper"></i> Notícia</a></li>

          <?php
          }
          if ($_SESSION['nivel'] == 3 || $usuario['acessoPesquisa'] == 1) {
          ?>
            <li><a href="gerenciamentoNoticia.php"><i class="fa-solid fa-newspaper"></i> Pesquisa de Opnião</a></li>
          <?php
          }
          if ($_SESSION['nivel'] == 3) {
          ?>
                 <li><a href="validaAnuncio.php"><i class="fa-solid fa-tag"></i> Validar anúncio</a></li>
          <?php 
          }
          ?>

          <li><a href="paginaInicial.php"><i class="fa-solid fa-bars"></i> Página Inicial</a></li>
          <!-- <li><a href="validaAnuncio.php"><i class="fa-solid fa-tag"></i> Validar anúncio</a></li> -->
        </ul>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <header class="header">
        <div class="header-left">
          <button><i class="fas fa-bars"></i></button>
        </div>
        <div class="user-info">
          <div class="user-details">

            <h3><?= $_SESSION['nome'] ?></h3>

          </div>
          <div class="user-avatar"><?= substr($_SESSION['nome'], 0, 1); ?></div>
          <a class="logout-btn" href="../Controller/logout.php">
            <i class="fas fa-sign-out-alt"></i>
            <span>Sair</span>
          </a>
        </div>
      </header>

      <!-- Dashboard -->
      <main class="dashboard">
        <div class="dashboard-title">
          <h1>Dashboard</h1>
          <p>Bem-vindo ao painel de gerenciamento.</p>
        </div>

        <!-- Main Action Cards -->
        <div class="action-cards">
          <?php
          if ($_SESSION['nivel'] == 3) {

          ?>
            <a href="painelControleDeAcesso.php" class="action-card">
              <div class="action-icon">
                <i class="fas fa-users"></i>
              </div>
              <h3>Controle de Acesso
                <!-- (
              <?php  ?>
         
        -->
              </h3>
              <p>Gerencie o Acesso dos usuários do sistema.</p>
            </a>
          <?php
          }

          if ($_SESSION['nivel'] == 3 || $usuario['acessoEvento'] == 1) {

          ?>

            <a href="gerenciamentoEvento.php" class="action-card">
              <div class="action-icon">
                <i class="fa-regular fa-image"></i>
              </div>
              <h3>Eventos</h3>
              <p>Visualize e edite a lista de eventos.</p>
            </a>
          <?php
          }




          ?>
          <?php


          if ($_SESSION['nivel'] == 3 || $usuario['acessoNoticia'] == 1) {

          ?>

            <a href="gerenciamentoNoticia.php" class="action-card">
              <div class="action-icon">
                <i class="fa-solid fa-newspaper"></i>
              </div>
              <h3>Notícias</h3>
              <p>Visualize e edite a lista de notícias.</p>
            </a>
          <?php
          }

          if ($_SESSION['nivel'] == 3 || $usuario['acessoPesquisa'] == 1) {

          ?>
            <a href="gerenciamentoPesquisa.php" class="action-card">
              <div class="action-icon">
                <i class="fa-solid fa-newspaper"></i>
              </div>
              <h3>Pesquisa</h3>
              <p>Visualize e edite as Pesquisas.</p>
            </a>
          <?php
          }

          ?>


          <?php


          if ($_SESSION['nivel'] == 3) {

          ?>
            <a href="validaAnuncio.php" class="action-card">
              <div class="action-icon">
                <i class="fa-solid fa-tag"></i>
              </div>
              <h3>Validação anúncios</h3>
              <p>Verifique os anúncios pendentes</p>
            </a>

          <?php
          }
          ?>
          <a href="paginaInicial.php" class="action-card">
            <div class="action-icon">
              <i class="fa-solid fa-bars"></i>
            </div>
            <h3>Página Inicial</h3>
            <p>Vá para a Página Inicial do Sistema</p>
          </a>
        </div>

        <!-- Mobile Actions -->

      </main>
    </div>
  </div>
</body>

</html>