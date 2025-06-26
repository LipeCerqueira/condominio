<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Administrativo - Condomínio</title>
  <link rel="stylesheet" href="../css/adm.css">
  <!-- Ícones FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <?php

  require_once("../Model/connect.php");

  $consulta = mysqli_query($con, "SELECT count(*) as numeroUsuario FROM usuario
WHERE status = 1 AND nivel < 5");
  $consulta2 = mysqli_query($con, "SELECT count(*) as validacaoImagem FROM galeriaFotos
WHERE status = 2");
  $consulta3 = mysqli_query($con, "SELECT count(*) as validacaoAnuncio FROM classificados
WHERE status = 'Aguardando Aprovação'");


  @session_start();
  if (isset($_SESSION["msg"]) && isset($_SESSION["alertIcon"])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '" . addslashes($_SESSION['msg']) . "',
                text: '" . addslashes($_SESSION['alertMsg']) . "',
                icon: '{$_SESSION['alertIcon']}'
            });
        });
    </script>";
    unset($_SESSION["msg"]);
    unset($_SESSION["alertMsg"]);
    unset($_SESSION["alertIcon"]);
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
          <li><a href="adm.php"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="listarCondominio.php"><i class="fas fa-home"></i> Condóminio</a></li>
          <li><a href="listarUnidade.php"><i class="fas fa-home"></i> Unidades</a></li>
          <li><a href="gerenciamento.php"><i class="fas fa-users"></i> Usuários </a></li>
          <li><a href="profissionais.php"><i class="fas fa-briefcase"></i> Profissionais</a></li>
          <li><a href="adicionarServico.php"><i class="fas fa-plus"></i> Adicionar Serviço</a></li>
          <li><a href="gerenciamentoEvento.php"> <i class="fa-regular fa-image"></i> Eventos internos</a></li>
          <li><a href="gerenciamentoNoticia.php"><i class="fa-solid fa-newspaper"></i> Notícia</a></li>
          <li><a href="log.php"><i class="fa-solid fa-file"></i> LOG</a></li>
          <li><a href="paginaInicial.php"><i class="fa-solid fa-bars"></i> Página Inicial</a></li>
          <li><a href="validaAnuncio.php"><i class="fa-solid fa-tag"></i> Validar anúncio</a></li>
          <li><a href="validaAnuncio.php"><i class="fa-regular fa-image"></i> Validar Imagem</a></li>
          <li><a href="gerenciarGaleria.php"><i class="fa-regular fa-image"></i> Gerenciar Galeria</a></li>
          <li><a href="linkCameras.php"><i class="fa fa-video-camera"></i> Link Câmeras</a></li>
          <li><a href="canais.php"><i class="fa-solid fa-globe"></i> Gerenciar Canais</a></li>
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
            <h3>Administrador</h3>
            <p><?= $_SESSION['nome'] ?></p>
          </div>
          <div class="user-avatar">A</div>
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
          <p>Bem-vindo ao painel administrativo do condomínio.</p>
        </div>

        <!-- Main Action Cards -->
        <div class="action-cards">
          <a href="listarCondominio.php" class="action-card">
            <div class="action-icon">
        <i class="fas fa-home"></i>
            </div>
            <h3>Condominios</h3>
            <p>Gerencie os condomínios do sistema.</p>
          </a>
       
          <a href="listarUnidade.php" class="action-card">
            <div class="action-icon">
        <i class="fas fa-home"></i>
            </div>
            <h3>Unidade</h3>
            <p>Gerencie as Unidades do sistema.</p>
          </a>
          <a href="painelSituacao.php" class="action-card">
            <div class="action-icon">
        <i class="fas fa-home"></i>
            </div>
            <h3>Situação</h3>
            <p>Gerencie as Situações das Unidades do sistema.</p>
          </a>
       
           <a href="gerenciamento.php" class="action-card">
            <div class="action-icon">
              <i class="fas fa-users"></i>
            </div>
            <h3>Usuários (
              <?php while ($numeroUsuario = mysqli_fetch_assoc($consulta)) {
                echo $numeroUsuario["numeroUsuario"];
              } ?>


              )</h3>
            <p>Gerencie os usuários do sistema.</p>
          </a>
          <a href="gerenciamentoProfissional.php" class="action-card">
            <div class="action-icon">
              <i class="fas fa-briefcase"></i>
            </div>
            <h3>Profissionais</h3>
            <p>Visualize e edite a lista de profissionais.</p>
          </a>
          <a href="gerenciamentoServico.php" class="action-card">
            <div class="action-icon">
              <i class="fas fa-plus"></i>
            </div>
            <h3>Serviços</h3>
            <p>Visualize e Cadastre novos serviços no sistema.</p>
          </a>
          <a href="gerenciamentoEvento.php" class="action-card">
            <div class="action-icon">
              <i class="fa-regular fa-image"></i>
            </div>
            <h3>Eventos internos</h3>
            <p>Visualize e edite a lista de eventos.</p>
          </a>

          <a href="gerenciamentoNoticia.php" class="action-card">
            <div class="action-icon">
              <i class="fa-solid fa-newspaper"></i>
            </div>
            <h3>Notícias</h3>
            <p>Visualize e edite a lista de notícias.</p>
          </a>
          <a href="log.php" class="action-card">
            <div class="action-icon">
              <i class="fa-solid fa-file"></i>
            </div>
            <h3>LOG</h3>
            <p>Visualize os acessos e Indicações do sistema</p>
          </a>
          <a href="validaAnuncio.php" class="action-card">
            <div class="action-icon">
              <i class="fa-solid fa-tag"></i>
            </div>
            <h3>Validar Anúncios(
              <?php while ($validacaoAnuncio = mysqli_fetch_assoc($consulta3)) {
                echo $validacaoAnuncio["validacaoAnuncio"];
              } ?>


              )</h3>
            <p>Verifique os anúncios pendentes</p>
          </a>
          <a href="validaImagem.php" class="action-card">
            <div class="action-icon">
              <i class="fa-regular fa-image"></i>
            </div>
            <h3>Validar Imagens (
              <?php while ($validacaoImagem = mysqli_fetch_assoc($consulta2)) {
                echo $validacaoImagem["validacaoImagem"];
              } ?>


              )</h3>
            <p>Valide as imagens pendentes</p>
          </a>
          <a href="linkCameras.php" class="action-card">
            <div class="action-icon">
              <i class="fa fa-video-camera"></i>
            </div>
            <h3>Link Câmeras</h3>
            <p>Editar Links da Câmeras </p>
          </a>
          <a href="gerenciarGaleria.php" class="action-card">
            <div class="action-icon">
                 <i class="fa-regular fa-image"></i>
            </div>
            <h3>Galeria de Fotos</h3>
            <p>Gerenciar galeria de Fotos </p>
          </a>
          <a href="canais.php" class="action-card">
            <div class="action-icon">
              <i class="fa-solid fa-globe"></i>
            </div>
            <h3>Gerenciar Canais</h3>
            <p>Gerencie os canais que ficaram visíveis aos usuários </p>
          </a>
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