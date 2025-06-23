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
      <h1>Adicionar Notícia</h1>
      <p>Preencha os dados para adicionar uma notícia</p>
    </div>

    <form class="signup-form" action="../Controller/adicionarNoticia.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="manchete">Manchete *</label>
        <input type="text" id="manchete" name="manchete" required placeholder="Digite a manchete da notícia" class="input-field" />
      </div>
     



      <div class="form-group">
        <label for="informacoes">Informação *</label>
        <!-- <input type="text" id="informacao" name="informacao" placeholder="informações da notícia" class="input-field" /> -->
         <textarea name="informacao" id="informacao" rows="4" class="input-field" maxlength="300" style="resize:none;"></textarea>
      </div>

      <div class="form-group">
        <label>Imagem da Notícia</label>
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
      
    //   $ip = $_SERVER['REMOTE_ADDR'];

    //   $ip = $_SERVER['REMOTE_ADDR'];
    //   if ($ip == '::1') {
    //      $ip = '127.0.0.1';
    //   }
      ?>
      <!-- <input type="hidden" name="ip" value="<?=$ip?>" /> -->
     

      <button class="btn btn-primary" type="submit">
        Cadastrar
      </button>
    </form>

 

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
<script src="../js/cep.js"></script>

  <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>