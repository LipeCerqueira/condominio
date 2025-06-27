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
            window.location.href = "listarSituacaoFinanceira.php";
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


?>

<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                      <img src="logo.png" alt="" id="logo">

            </div>
        </div>

        <div class="welcome-text">
            <h1>Adicionar Situação</h1>

           

        </div>

        <form class="signup-form" action="../Controller/adicionarSituacaoFinanceira.act.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="pagina" value="gerenciamento">
            <div class="form-group">
                <label for="nome">Situação: *</label>
                <input type="text" id="nome" name="situacao" required placeholder="Digite o nome do situação" class="input-field" />
            </div>
            

            <button class="btn btn-primary" type="submit">
                Adicionar Situação
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


    

    <script src="../js/cep.js"></script>
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>