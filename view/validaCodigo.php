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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../css/setup.css">
    <script>
        function voltar() {
            window.location.href = "login.php";
        }
    </script>

</head>
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


function censurarEmail($email) {
    $partes = explode('@', $email);
    $nome = $partes[0];
    $dominio = $partes[1];

    $mostrar = 3; // Número de letras que você quer mostrar
    $inicio = substr($nome, 0, $mostrar);
    $censura = str_repeat('x', max(0, strlen($nome) - $mostrar));

    return $inicio . $censura . '@' . $dominio;
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
            <h1>INFORME O CÓDIGO</h1>

           

        </div>

        <form class="signup-form" action="../Controller/validaCodigo.act.php" method="post" enctype="multipart/form-data">

         
            <div class="form-group">
                <?php 
                
                @session_start();
                $email = $_SESSION["emailValidado"];
                $emailCensurado = censurarEmail($email);
                ?>
 
				<p>Digite o código enviado para: <b><?=$emailCensurado?></b> </p>
                <input type="number" id="codigo" name="codigo" required placeholder="000000" class="input-field"   />
                <input type="hidden" name="id" value="<?=$_SESSION['idUsuario']?>"/>
            </div>
            

            <button class="btn btn-primary" type="submit">
                Verificar
            </button>
        </form>
        <div class="other-options">
            <button class="btn btn-tertiary" onclick="voltar()">
                Voltar
            </button>
        </div>




        <div class="footer">
            <p>©Todos os direitos reservados.</p>
        </div>
    </div>


  
        // Script para visualização da foto
       <script>
    $(document).ready(function() {
      $("#cpf").mask("000.000.000-00"); // Máscara para CPF
      
    });
  </script>
    

    

    <script src="../js/cep.js"></script>
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>