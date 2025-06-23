<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login App</title>
  <meta name="description" content="Lovable Generated Project" />
  <meta name="author" content="Lovable" />
  <meta property="og:image" content="/og-image.png" />

  <!-- link rel="stylesheet" href="../css/login.css" -->
  <link rel="stylesheet" href="../css/setup.css">
	
  <script src="../JS/sweetalert.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script>
    function voltar() {
      window.location.href = "../index.php";
    }
  </script>

</head>

<body>

  <?php
 @session_start();
if (isset($_SESSION["msg"]) && isset($_SESSION["alertIcon"])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '".addslashes($_SESSION['msg'])."',
                text: '".addslashes($_SESSION['alertMsg'])."',
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
    <div class="logo-container">
      <div class="logo">
          <img src="logo.png" alt="" id="logo">
        </svg>
      </div>
    </div>

    <div class="welcome-text">
      <h1>EFETUAR LOGIN</h1>
	            
    </div>

    <form class="login-form" action="../Controller/login.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="cpf">CPF</label>
        <?php
        @session_start();
        $cpf_tentativa = isset($_SESSION['cpf_tentativa']) ? $_SESSION['cpf_tentativa'] : '';
        unset($_SESSION['cpf_tentativa']);
        ?>
        <input
          type="text"
          id="cpf"
          name="cpf"
          placeholder="Digite seu CPF"
          maxlength="11"
          class="input-field"
          required
          value="<?php echo htmlspecialchars($cpf_tentativa); ?>" />
      </div>

      <div class="form-group">
        <label for="password">SENHA</label>
        <input type="password" name="senha" id="password" placeholder="Digite sua senha" class="input-field" required />
      </div>

      <?php 
      
      $ip = $_SERVER['REMOTE_ADDR'];

      $ip = $_SERVER['REMOTE_ADDR'];
      if ($ip == '::1') {
         $ip = '127.0.0.1';
      }
      ?>
      <input type="hidden" name="ip" value="<?=$ip?>" />

      <div class="forgot-password">
        <a href="recuperacaoSenha.php">Esqueci minha senha</a>
      </div>

      <button class="btn btn-primary" type="submit">
        Entrar
      </button>
    </form>

    <div class="other-options">
      <button class="btn btn-tertiary" onclick="voltar()">
        Voltar para opções
      </button>
    </div>

    <div class="footer">
      <p>© Todos os direitos reservados.</p>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#cpf").mask("000.000.000-00"); // Máscara para CPF
      $("#telefone").mask("(00) 00000-0000"); // Máscara para telefone
    });
  </script>
  <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>