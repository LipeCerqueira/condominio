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

    <link rel="stylesheet" href="../css/cadastro.css">
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


$senha1_tentativa = isset($_SESSION['senha1_tentativa']) ? $_SESSION['senha1_tentativa'] : '';
$senha2_tentativa = isset($_SESSION['senha2_tentativa']) ? $_SESSION['senha2_tentativa'] : '';
unset($_SESSION["senha1_tentativa"]);
unset($_SESSION["senha2_tentativa"]);
  ?>


<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                      <img src="logo.png" alt="" id="logo">

            </div>
        </div>

        <div class="welcome-text">
            <h1>Mudar senha</h1>
        </div>

        <form class="signup-form" action="../Controller/mudarSenha.act.php" method="post" enctype="multipart/form-data">

         
            <div class="form-group">
                <?php 
                
                @session_start();
          
                ?>
                <label for="nome">Nova senha *  </label>
                <input type="password" id="codigo" name="senha" value="<?=$senha1_tentativa?>" required placeholder="Nova senha " class="input-field"   />
                <label for="nome">Confirme a senha *  </label>
                <input type="password" id="codigo" name="confirmaSenha" value="<?=$senha2_tentativa?>" required placeholder="Confirme a senha" class="input-field"   />
                <input type="hidden" name="id" value="<?=$_SESSION['idUsuario']?>"/>
            </div>
            

            <button class="btn btn-primary" type="submit">
                Mudar senha
            </button>
        </form>
        




        <div class="footer">
            <p>© 2025 App. Todos os direitos reservados.</p>
        </div>
    </div>


  
       

    

    <script src="../js/cep.js"></script>
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>