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


  <link rel="stylesheet" href="../css/cadastro.css">
 

</head>


<?php
require("../model/connect.php");
@$id =  $_GET["id"];

                    $consulta = mysqli_query($con, "SELECT * FROM `noticia` where idNoticia = '$id'");                 
                    $noticia = mysqli_fetch_assoc($consulta);
                    

?>

<body>
  <div class="container">
    <div class="logo-container">
      <div class="logo">
               <img src="logo.png" alt="" id="logo">

      </div>
    </div>

    <div class="welcome-text">
      <h1>Editar Notícia</h1>
      <p>Editar os dados de uma notícia</p>
    </div>

    <form class="signup-form" action="../Controller/editarNoticia.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Manchete</label>
        <input type="text" id="manchete" name="manchete" value="<?=$noticia['manchete']?>" required placeholder="Digite a machete da manchete" class="input-field" />
      </div>
      <div class="form-group">
          <label for="informacao">informação </label>
          <textarea name="informacao" id="informacao"  rows="4" class="input-field" maxlength="300" style="resize:none;"><?=$noticia['informacao']?></textarea>
        </div>
        <div class="form-group flex-1">
            <label for="dataCadastro">Data de Publicação</label>
            <input type="text" id="dataCadastro"  readonly style="background-color: gainsboro" value="<?=$noticia['dataNoticia']?>" class="input-field" />
          </div>
      
      <div class="form-group">
        <label>Mudar Imagem da Notícia</label>
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

        <input type="hidden" value="<?=$noticia['idNoticia']?>" name="idNoticia">
        <input type="hidden" value="<?=$noticia['imagem']?>" name="foto_atual">

      <button class="btn btn-primary" type="submit">
        Editar
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