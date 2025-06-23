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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="../JS/sweetalert.js"></script>

  <link rel="stylesheet" href="../css/cadastro.css">
  <script>
    function voltar() {
      window.location.href = "gerenciamento.php";
    }
  </script>

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
@$id =  $_GET["id"];
require("../model/connect.php");
$busca = mysqli_query($con, "SELECT * FROM acesso WHERE idUsuario = '$id'");

if ($busca->num_rows == 0) {
  $consulta = mysqli_query($con, "SELECT *, DATE_FORMAT(dataCadastro, '%d/%m/%Y %H:%i') AS data_formatada FROM `usuario` WHERE id = '$id'");
} else {
  $consulta = mysqli_query($con, "SELECT u.*,a.*, DATE_FORMAT(u.dataCadastro, '%d/%m/%Y %H:%i') AS data_formatada FROM usuario u
INNER JOIN acesso a ON u.id = a.idUsuario
 WHERE a.idUsuario = '$id'");
}

$usuario = mysqli_fetch_assoc($consulta);


?>

<body>
  <div class="container">
    <div class="logo-container">
      <div class="logo">
        <img src="logo.png" alt="" id="logo">
      </div>
    </div>

    <div class="welcome-text">
      <h1>EDITAR DADOS DO USUÁRIO</h1>

    </div>

    <form class="signup-form" action="../Controller/editarAdm.act.php" method="post" enctype="multipart/form-data">

      <input type="hidden" name="pagina" value="gerenciamento">
      <div class="form-group">
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required placeholder="Digite seu nome completo" class="input-field" />
      </div>
      <div class="form-group">
        <label for="data-nascimento">Data de nascimento</label>
        <input type="date" name="dataNascimento" value="<?= $usuario['dataNascimento'] ?>" id="data-nascimento" class="input-field" />
      </div>

      <input type="hidden" value="<?= $usuario['id'] ?>" name="id">
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" value="<?= $usuario['cpf'] ?>" placeholder="Digite seu CPF" maxlength="11" class="input-field" />
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" value="<?= $usuario['telefone'] ?>" maxlength="11" placeholder="(00) 0000-0000" class="input-field" />
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" placeholder="Digite seu e-mail" class="input-field" />
      </div>

<div class="form-group">
        <label for="senha">Mudar Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Mudar senha" class="input-field" />
      </div>

      <div class="form-group">
        <label for="nivel">Nível de Acesso</label>
        <select id="nivel"
          name="nivel"

          required>
          <option value="1" <?php if ($usuario['nivel'] == 1) {
                              echo "selected";
                            }

                            ?>>1 <i class="fa-solid fa-star" style="color: gold;"></i></option>
          <option value="2" <?php if ($usuario['nivel'] == 2) {
                              echo "selected";
                            }

                            ?>>2</option>
          <option value="3" <?php if ($usuario['nivel'] == 3) {
                              echo "selected";
                            }

                            ?>>3</option>
          <option value="4" <?php if ($usuario['nivel'] == 4) {
                              echo "selected";
                            }

                            ?>>4</option>
          <option value="5" <?php if ($usuario['nivel'] == 5) {
                              echo "selected";
                            }

                            ?>>5</option>


        </select>
      </div>
      


      <div class="form-group">
                <label for="situacao">Acessos:</label>
                <div class="situacao">
                    <div>
                        <input type="radio" name="acessoNoticia" value="1" <?php 
                            if(isset($usuario['acessoNoticia']) && $usuario['acessoNoticia']  == 1){
                                echo "checked";
                            }
                        
                        ?> onclick="toggleRadio(this)">
                        <h2>Gerenciar Notícia</h2>
                    </div>
                    <div>
                        <input type="radio" name="acessoEvento" <?php 
                            if(isset($usuario['acessoEvento']) && $usuario['acessoEvento']  == 1){
                                echo "checked";
                            }
                        
                        ?> value="1" onclick="toggleRadio(this)">
                        <h2>Gerenciar Eventos </h2>
                    </div>
                    <div>
                        <input type="radio" name="acessoPesquisa" <?php 
                            if(isset($usuario['acessoPesquisa']) && $usuario['acessoPesquisa'] == 1){
                                echo "checked";
                            }
                        
                        ?> value="1" onclick="toggleRadio(this)">
                        <h2>Gerenciar Pesquisa de Opinião</h2>
                    </div>
                </div>



            </div>

      <div class="form-group">
        <label for="situacao">Situação:</label>
        <div class="situacao">
          <div>
            <input type="radio" name="situacao" value="Associado" <?php if ($usuario['situacao'] == "Associado") {
                                                                    echo "checked";
                                                                  }

                                                                  ?>>
            <h2>Associado</h2>
          </div>
          <div>
            <input type="radio" name="situacao" value="Não Associado" <?php if ($usuario['situacao'] == "Não Associado") {
                                                                        echo "checked";
                                                                      }

                                                                      ?>>
            <h2>Não associado </h2>
          </div>
          <div>
            <input type="radio" id="situacao" name="situacao" value="Não Informado" <?php if ($usuario['situacao'] == "Não Informado") {
                                                                                      echo "checked";
                                                                                    }

                                                                                    ?>>
            <h2>Não informado</h2>
          </div>
        </div>
        <div class="form-group">
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
        </div>

        <input type="hidden" name="foto_atual" value="<?= $usuario['caminhoFoto'] ?>">
        <input type="hidden" name="senha_atual" value="<?= $usuario['senha'] ?>">


        <input type="hidden" name="ip" value="<?= $ip ?>" />
        <div class="address-section">
          <h2>Endereço</h2>

          <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" value="<?= $usuario['cep'] ?>" placeholder="Digite o CEP" class="input-field" maxlength="9" />
          </div>
          <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="rua" readonly style="background-color: gainsboro" value="<?= $usuario['rua'] ?>" placeholder="Rua" class="input-field" />
          </div>

          <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" id="complemento" value="<?= $usuario['complemento'] ?>" placeholder="Opcional" class="input-field" />
          </div>
          <div class="form-group">
            <label for="complemento">Número</label>
            <input type="text" name="numero" id="numero" value="<?= $usuario['numero'] ?>" placeholder="Número" class="input-field" />
          </div>
          <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" readonly style="background-color: gainsboro" value="<?= $usuario['bairro'] ?>" placeholder="Bairro" class="input-field" />
          </div>

          <div class="form-row">
            <div class="form-group flex-1">
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidade" readonly style="background-color: gainsboro" value="<?= $usuario['cidade'] ?>" placeholder="Cidade" class="input-field" />
            </div>

            <div class="form-group flex-1">
              <label for="estado">Estado</label>
              <input type="text" name="estado" id="estado" readonly style="background-color: gainsboro" value="<?= $usuario['estado'] ?>" class="input-field" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group flex-1">
              <label for="ip">IP usuário</label>
              <input type="text" id="ip" readonly style="background-color: gainsboro" value="<?= $usuario['ip'] ?>" class="input-field" />
            </div>

            <div class="form-group flex-1">
              <label for="dataCadastro">Data de Cadastro</label>
              <input type="text" id="dataCadastro" readonly style="background-color: gainsboro" value="<?= $usuario['data_formatada'] ?>" class="input-field" />
            </div>
          </div>


        </div>

        <button class="btn btn-primary" type="submit">
          Editar
        </button>
    </form>
    <div class="other-options">
      <button class="btn btn-tertiary" onclick="voltar()">
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
      $("#cep").mask("00000-000");
      $("#dataCadastro").mask("00/00/0000 00:00"); // Máscara para CEP
    });

      let selectedRadio = null;

        function toggleRadio(radio) {
            if (selectedRadio === radio) {
                radio.checked = false;
                selectedRadio = null;
            } else {
                selectedRadio = radio;
            }
        }
  </script>

  <script src="../js/cep.js"></script>
  <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>