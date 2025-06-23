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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- link rel="stylesheet" href="../css/cadastro.css" -->
  <link rel="stylesheet" href="../css/setup.css">
	
  <script>
    function login() {
      window.location.href = "login.php";
    }

    function enableSubmitBtn() {
      document.getElementById("submitBtn").disabled = false;
    }
  </script>

</head>


<?php
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

$nome_tentativa = isset($_SESSION['nome_tentativa']) ? $_SESSION['nome_tentativa'] : '';
$sobrenome_tentativa = isset($_SESSION['sobrenome_tentativa']) ? $_SESSION['sobrenome_tentativa'] : '';
$data_tentativa = isset($_SESSION['data_tentativa']) ? $_SESSION['data_tentativa'] : '';
$cpf_tentativa = isset($_SESSION['cpf_tentativa']) ? $_SESSION['cpf_tentativa'] : '';
$telefone_tentativa = isset($_SESSION['telefone_tentativa']) ? $_SESSION['telefone_tentativa'] : '';
$email_tentativa = isset($_SESSION['email_tentativa']) ? $_SESSION['email_tentativa'] : '';
$senha_tentativa = isset($_SESSION['senha_tentativa']) ? $_SESSION['senha_tentativa'] : '';
$cep_tentativa = isset($_SESSION['cep_tentativa']) ? $_SESSION['cep_tentativa'] : '';
$rua_tentativa = isset($_SESSION['rua_tentativa']) ? $_SESSION['rua_tentativa'] : '';
$complemento_tentativa = isset($_SESSION['complemento_tentativa']) ? $_SESSION['complemento_tentativa'] : '';
$numero_tentativa = isset($_SESSION['numero_tentativa']) ? $_SESSION['numero_tentativa'] : '';
$bairro_tentativa = isset($_SESSION['bairro_tentativa']) ? $_SESSION['bairro_tentativa'] : '';
$cidade_tentativa = isset($_SESSION['cidade_tentativa']) ? $_SESSION['cidade_tentativa'] : '';
$estado_tentativa = isset($_SESSION['estado_tentativa']) ? $_SESSION['estado_tentativa'] : '';
$situacao_tentativa = isset($_SESSION['situacao_tentativa']) ? $_SESSION['situacao_tentativa'] : '';
unset($_SESSION["nome_tentativa"]);
unset($_SESSION["sobrenome_tentativa"]);
unset($_SESSION["data_tentativa"]);
unset($_SESSION["cpf_tentativa"]);
unset($_SESSION["telefone_tentativa"]);
unset($_SESSION["email_tentativa"]);
unset($_SESSION["senha_tentativa"]);
unset($_SESSION["cep_tentativa"]);
unset($_SESSION["rua_tentativa"]);
unset($_SESSION["complemento_tentativa"]);
unset($_SESSION["numero_tentativa"]);
unset($_SESSION["bairro_tentativa"]);
unset($_SESSION["cidade_tentativa"]);
unset($_SESSION["estado_tentativa"]);
unset($_SESSION["situacao_tentativa"]);


?>

<body>
  <div class="container">
    <div class="logo-container">
      <div class="logo">
        <img src="logo.png" alt="" id="logo">
      </div>
    </div>

    <div class="welcome-text">
      <h1>Criar Conta</h1>
      <p>Preencha os dados para se cadastrar</p>
    </div>

    <form class="signup-form" action="../Controller/cadastro.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Nome *</label>
        <input type="text" id="nome" name="nome" value="<?=$nome_tentativa?>" required placeholder="Digite seu nome" class="input-field" />
      </div>
      <div class="form-group">
        <label for="sobrenome">Sobrenome *</label>
        <input type="text" id="sobrenome" name="sobrenome" value="<?=$sobrenome_tentativa?>" required placeholder="Digite seu sobrenome" class="input-field" />
      </div>
      <div class="form-group">
        <label for="data-nascimento">Data de nascimento </label>
        <input type="text" name="dataNascimento" placeholder="DD/MM/AAAA" value="<?=$data_tentativa?>" id="data-nascimento" class="input-field" />
      </div>

      <div class="form-group">
        <label for="cpf">CPF *</label>
        <input type="text" id="cpf" name="cpf" value="<?=$cpf_tentativa?>" required placeholder="Digite seu CPF" maxlength="11" class="input-field" />
      </div>

      <div class="form-group">
        <label for="telefone">Telefone *</label>
        <input type="text" id="telefone" required value="<?=$telefone_tentativa?>" name="telefone" maxlength="11" placeholder="(00) 0000-0000" class="input-field" />
      </div>

      <div class="form-group">
        <label for="email">E-mail *</label>
        <input type="email" id="email" required value="<?=$email_tentativa?>" name="email" placeholder="Digite seu e-mail" class="input-field" />
      </div>

      <div class="form-group">
        <label for="senha">Senha *</label>
        <input type="password" id="senha" value="<?=$senha_tentativa?>" required name="senha" placeholder="Crie uma senha" class="input-field" />
      </div>
      <div class="form-group">
        <label for="situacao">Situação:</label>
        <div class="situacao">
          <div>
            <input type="radio" name="situacao" value="Associado" required <?php if($situacao_tentativa == "Associado"){
              echo "checked";}?>>
            <h2>Associado</h2>
          </div>
          <div>
            <input type="radio" name="situacao" value="Não Associado" required <?php if($situacao_tentativa == "Não Associado"){
              echo "checked";}?>>
            <h2>Não associado </h2>
          </div>
          <div>
            <input type="radio" id="situacao" name="situacao" value="Não Informado" required <?php if($situacao_tentativa == "Não Informado"){
              echo "checked";}?>>
            <h2>Não desejo informar</h2>
          </div>
        </div>

      </div>
      <div class="form-group">
        <label>Foto de perfil</label>
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

      $ip = $_SERVER['REMOTE_ADDR'];

      $ip = $_SERVER['REMOTE_ADDR'];
      if ($ip == '::1') {
        $ip = '127.0.0.1';
      }
      ?>
      <input type="hidden" name="ip" value="<?= $ip ?>" />
      <div class="address-section">
        <h2>Endereço</h2>

        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" value="<?=$cep_tentativa?>" name="cep" id="cep" placeholder="Digite o CEP" class="input-field" maxlength="9" />
         
	 <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank" rel="noopener noreferrer" id="linkCEP">Não sabe o CEP?</a>
		 
        </div>
        <div class="form-group">
          <label for="rua">Rua</label>
          <input type="text" value="<?=$rua_tentativa?>" name="rua" style="background-color: gainsboro" id="rua" placeholder="Rua" readonly class="input-field" />
        </div>
        <div class="form-row">
          <div class="form-group flex-1">
            <label for="Numero">Número</label>
            <input type="text" value="<?=$numero_tentativa?>" name="numero" id="numero" placeholder="Número" class="input-field" />


          </div>
          <div class="form-group flex-1">
            <label for="complemento">Complemento</label>
            <input type="text" value="<?=$complemento_tentativa?>" name="complemento" id="complemento" placeholder="Opcional" class="input-field" />
          </div>
          
        </div>




        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" value="<?=$bairro_tentativa?>" name="bairro" style="background-color: gainsboro" id="bairro" placeholder="Bairro" readonly class="input-field" />
        </div>

        <div class="form-row">
          <div class="form-group flex-1">
            <label for="cidade">Cidade</label>
            <input type="text" value="<?=$cidade_tentativa?>" name="cidade" id="cidade" style="background-color: gainsboro" placeholder="Cidade" readonly class="input-field" />
          </div>

          <div class="form-group flex-1">
            <label for="estado">Estado</label>
            <input type="text" value="<?=$estado_tentativa?>" name="estado" id="estado" readonly style="background-color: gainsboro" placeholder="UF" class="input-field" />
          </div>

        </div>


        <div class="termos">
          <input type="checkbox" name="" id="termosCheckbox">
          <h3>Eu aceito os <a class="open-popup"><strong>TERMOS DE USO</strong></a></h3>
        </div>


      </div>

      <button class="btn btn-primary" id="enviarBtn" type="submit" disabled>
        Cadastrar
      </button>
    </form>

    <div class="other-options">
      <button class="btn btn-tertiary" onclick="login()">
        Já tenho uma conta
      </button>
    </div>

    <div class="footer">
      <p>© 2025 App. Todos os direitos reservados.</p>
    </div>
  </div>

  <div class="popup-overlay" id="popup">
    <div class="popup-box">
      <span class="close-popup" onclick="fecharPopup()">&times;</span>
      <h2>Termos de Uso</h2>
      <p>
      A utilização da plataforma deve seguir boas práticas éticas e morais, sendo proibido o uso de palavras ofensivas ou de baixo calão. É imprescindível o respeito à legislação federal vigente. O usuário é civilmente responsável por todo o conteúdo que publicar, estando sujeito às implicações legais correspondentes. O desenvolvedor reserva-se o direito de remover, sem aviso prévio, qualquer interação ou postagem que considerar inadequada. Todas as informações fornecidas estão submetidas aos critérios estabelecidos pela Lei Geral de Proteção de Dados (LGPD).
      </p>
    </div>
  </div>

  <script>
    const popup = document.getElementById("popup");
    const openBtn = document.querySelector(".open-popup");
    const termosCheckbox = document.getElementById("termosCheckbox");
    const enviarBtn = document.getElementById("enviarBtn");

    termosCheckbox.addEventListener("change", () => {
      enviarBtn.disabled = !termosCheckbox.checked;
    });

    openBtn.addEventListener("click", () => {
      popup.style.display = "flex";
    });

    function fecharPopup() {
      popup.style.display = "none";
    }

    // Fecha ao clicar fora da caixa
    popup.addEventListener("click", (e) => {
      if (e.target === popup) {
        fecharPopup();
      }
    });
  </script>

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

    document.getElementById('data-nascimento').addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, '');
    if (v.length >= 2) v = v.slice(0,2) + '/' + v.slice(2);
    if (v.length >= 5) v = v.slice(0,5) + '/' + v.slice(5,9);
    e.target.value = v;
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