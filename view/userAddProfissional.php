<?php require("sec.php") ?>
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
	
<link rel="stylesheet" href="../css/paginaInicial.css">
<!-- link rel="stylesheet" href="../css/cadastro.css" -->
<link rel="stylesheet" href="../css/setup.css">	
	

	<script>
        function voltar() {
            window.location.href = "paginaInicial.php";
        }
    </script>

</head>


<?php
@session_start();


require("../model/connect.php");

                    $consulta = mysqli_query($con, "SELECT * FROM `profissao` WHERE status = 1 order by nomeProfissao");

?>

<body>



<div class="container">
    <div class="logo-container">
      <div class="logo">
        <img src="logo.png" alt="" id="logo">
      </div>
    </div>

    <div class="welcome-text">
      <h1>FAÇA SUAS INDICAÇÕES</h1>
      
      <p class="subtitle">Sua contruibução com a comunidade é muito importante!</p>
   
    </div>

    <form class="signup-form" action="../Controller/cadastrarProfissional.act.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="pagina" value="gerenciamento">
    <div class="form-group">
                <label for="nome">Empresa e/ou Nome do Profissional *</label>
                <input type="text" id="nome" name="nome" required placeholder="Digite o nome" class="input-field" />
            </div>

            <input type="hidden" name="origem" value="usuario">
            <input type="hidden" value="<?=$_SESSION["nome"]?>"  name="indicado"/>
            <div class="form-group">
                <label for="telefone">Telefone *</label>
                <input type="text" id="telefone" name="telefone" required maxlength="11" placeholder="(00) 0000-0000" class="input-field" />
            </div>
    
            <?php 
      
      $ip = $_SERVER['REMOTE_ADDR'];

      $ip = $_SERVER['REMOTE_ADDR'];
      if ($ip == '::1') {
         $ip = '127.0.0.1';
      }
      ?>
      <input type="hidden" name="ip" value="<?=$ip?>" />
      <input type="hidden" value="<?=$_SESSION['id']?>" name="id">
            <div class="form-group">
                <label for="profissao" class="required">Serviço</label>
                <select
                    id="profissao"
                    name="profissao"
                  
                    required>
                    <option value="" disabled selected>Selecione a Serviço</option>
                    <?php 
                    
                    while($profissao = mysqli_fetch_assoc($consulta)){
                        echo "<option value='".$profissao['idProfissao']."'>".$profissao['nomeProfissao']."</option>";
                    }?>
                   
                </select>
            </div>
          

            <!-- <div class="form-group">
        <label>Foto de perfil</label>
        <div class="photo-upload">
          <input type="file" id="foto" name="foto" accept="image/*" class="file-input" />
          <label for="foto" class="upload-button">Mudar foto</label>
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
      </div> -->


           

        
      </div>

      <button class="btn btn-primary" type="submit">
        Cadastrar
      </button>
    </form>
    <div class="other-options">
      <button class="btn btn-tertiary" onclick="voltar()">
        Voltar
      </button>
    </div>

   


   
    </div>

    <?php 
    
        require("partes/footer.php")
    
    ?>


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
           
            $("#telefone").mask("(00) 00000-0000"); // Máscara para telefone
            $("#cep").mask("00000-000");
            $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        });
    </script>

    <script src="../js/cep.js"></script>
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>