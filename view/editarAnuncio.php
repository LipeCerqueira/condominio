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
     <!-- <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="../css/cadastro.css"> -->
    <link rel="stylesheet" href="../css/setup.css">


    <script>
        function voltar() {
            window.location.href = "meusAnuncios.php";
        }
    </script>

</head>


<?php
@session_start();


require("../model/connect.php");
extract($_GET);

$consulta = mysqli_query($con, "SELECT * FROM `classificados` WHERE id = {$_GET['id']}");
$anuncio = mysqli_fetch_assoc($consulta);

?>

<body>



    <div class="container">
        <div class="logo-container">
            <div class="logo">
                       <img src="logo.png" alt="" id="logo">

            </div>
        </div>

        <div class="welcome-text">
            <h1>Editar anúncio</h1>
            
        </div>

        <form class="signup-form" action="../Controller/editaranuncio.act.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="manchete">Título *</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Digite o título do anúncio" value="<?= $anuncio['titulo'] ?>" class="input-field" />
            </div>


            <div class="form-group">
                <label for="profissao" class="required">Tipo de anúncio *</label>
                <select
                    id="profissao"
                    name="tipo"

                    required>
                    <option value="1" <?php if ($anuncio['tipo'] == 1) {
                                            echo "selected";
                                        } ?>>Carro</option>
                    <option value="2" <?php if ($anuncio['tipo'] == 2) {
                                            echo "selected";
                                        } ?>>Imóvel</option>
                    <option value="3" <?php if ($anuncio['tipo'] == 3) {
                                            echo "selected";
                                        } ?>>Outro</option>


                </select>
            </div>

            <div class="form-group">
                <label for="informacoes">Descrição *</label>

                <textarea name="descricao" id="descricao" placeholder="Descrição do Anúncio" rows="3" class="input-field" maxlength="300" style="resize:none;"><?=$anuncio['descricao']?></textarea>
            </div>

            <?php

            //   $ip = $_SERVER['REMOTE_ADDR'];

            //   $ip = $_SERVER['REMOTE_ADDR'];
            //   if ($ip == '::1') {
            //      $ip = '127.0.0.1';
            //   }
            ?>
            <input type="hidden" name="ip" value="<?= $ip ?>" />
            <div class="form-group">
                <label for="informacoes">Valor *</label>
                <input type="text" id="valor" name="valor" placeholder="Valor do produto" class="input-field" value="<?=$anuncio['valor']?>" oninput="formatarMoeda(this)" />
            </div>

            <div class="form-group">
                <label>Mudar Imagem </label>
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
            <!-- <input type="hidden" name="id_usuario" value=" /> -->
            <input type="hidden" value="<?=$anuncio['id']?>" name="idAnuncio">
            <input type="hidden" value="<?=$anuncio['imagem']?>" name="foto_atual">

            <button class="btn btn-primary" type="submit">
                Editar
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



    <script src="../js/cep.js"></script>
    <script>
function formatarMoeda(campo) {
  let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não é número
  valor = (valor / 100).toFixed(2) + '';
  valor = valor.replace('.', ',');
  valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  campo.value = 'R$ ' + valor;
}
</script>
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>