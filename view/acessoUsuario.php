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
            window.location.href = "painelControleDeAcesso.php";
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

if($busca ->num_rows == 0){
    $consulta = mysqli_query($con, "SELECT id,nome FROM usuario 
 WHERE id = '$id'");
}else{
    $consulta = mysqli_query($con, "SELECT u.nome, u.id,a.* FROM usuario u
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
            <h1>Editar acessos do usuário</h1>

        </div>

        <form class="signup-form" action="../Controller/acessoUsuario.act.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="pagina" value="gerenciamento">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required placeholder="Digite seu nome completo" readonly style="background-color: gainsboro" class="input-field" />
                <input type="hidden" name="id" value="<?= $usuario['id'] ?>" />
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