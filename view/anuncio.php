<?php require("sec.php") 
  ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro App</title>
  <meta name="description" content="Lovable Generated Project" />
  <meta name="author" content="Lovable" />
  <meta property="og:image" content="/og-image.png" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="../JS/sweetalert.js"></script>

<link rel="stylesheet" href="../css/setup.css">
<!-- link rel="stylesheet" href="../css/paginaInicial.css" -->
<link rel="stylesheet" href="../css/cadastro.css">


</head>


<?php
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

?>

<body>

  <div class="container">
    <div class="logo-container">
      <div class="logo">
         <img src="logo.png" alt="" id="logo">
      </div>
    </div>


   
    <div class="welcome-text">
      <h1>ANUNCIE AQUI</h1>
      <p>Apresente serviços, bens ou produtos de forma gratuita!</p>
    </div>

    <form class="signup-form" action="../Controller/anuncio.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="manchete">Título *</label>
        <input type="text" id="titulo" name="titulo" required placeholder="Digite o título do anúncio" class="input-field" />
      </div>
     

      <div class="form-group">
                <label for="profissao" class="required">Tipo de anúncio *</label>
                <select
                    id="profissao"
                    name="tipo"
                  
                    required>
                    <option value="" disabled selected>Selecione a tipo de anúncio</option>
                    <option value="1">Carro</option>
                    <option value="2">Imóvel</option>
                    <option value="3">Outro</option>
                    
                   
                </select>
            </div>

      <div class="form-group">
        <label for="informacoes">Descrição *</label>
      
        <textarea name="descricao" id="descricao" placeholder="Descrição do Anúncio" rows="3" class="input-field" maxlength="300" style="resize:none;"></textarea>
      </div>

      <?php 
      
      $ip = $_SERVER['REMOTE_ADDR'];

      $ip = $_SERVER['REMOTE_ADDR'];
      if ($ip == '::1') {
         $ip = '127.0.0.1';
      }
      ?>
      <input type="hidden" name="ip" value="<?=$ip?>" />
      <div class="form-group">
        <label for="informacoes">Valor *</label>
        <input type="text" id="valor" name="valor" placeholder="Valor do produto" class="input-field" oninput="formatarMoeda(this)" />
      </div>

      <div class="form-group">
        <label>Imagem do anúncio </label>
        <div class="photo-upload">
          <input type="file" id="foto" name="foto" accept="image/*" class="file-input" />
          <label for="foto" class="upload-button">Escolher foto</label>
          <div class="photo-preview" id="photoPreview">
            <div class="photo-placeholder">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
            <img id="previewImage" src="#" alt="Preview" style="display: none;" />
          </div>
        </div>
      </div>

      <?php 
        @session_start();
      ?>
      <input type="hidden"name="id_usuario" value="<?= $_SESSION["id"]?>" />
     

      <button class="btn btn-primary" type="submit">
        Anúnciar
      </button>
    </form>
<div class="other-options">
            <button class="btn btn-tertiary" onclick="history.go(-1)">
                Voltar
            </button>
        </div>
 

    <div class="footer">
      <p>© 2025 App. Todos os direitos reservados.</p>
    </div>
  </div>

  <script>
    // Script para visualização da foto
    document.getElementById('foto').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const previewImage = document.getElementById('previewImage');
          previewImage.src = e.target.result;
          previewImage.style.display = 'block';
          document.querySelector('.photo-placeholder').style.display = 'none';
        }
        reader.readAsDataURL(file);
      }
    });
  </script>

<script>
  $(document).ready(function() {
    $("#cpf").mask("000.000.000-00"); // Máscara para CPF
    $("#telefone").mask("(00) 00000-0000"); // Máscara para telefone
    $("#cep").mask("00000-000"); // Máscara para CEP
  });
</script>
<script>
function formatarMoeda(campo) {
  let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não é número
  valor = (valor / 100).toFixed(2) + '';
  valor = valor.replace('.', ',');
  valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  campo.value = 'R$ ' + valor;
}
</script>
<script src="../js/cep.js"></script>

  <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>