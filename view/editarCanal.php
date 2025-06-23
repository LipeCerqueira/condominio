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
 
 <script>
    function voltar() {
      window.location.href = "adm.php";
    }
  </script>
</head>


<?php
require("../model/connect.php");
@$id =  $_GET["id"];

                    $consulta = mysqli_query($con, "SELECT * FROM `canais` where idCanal = '{$id}'");                 
                    $canal = mysqli_fetch_assoc($consulta);
                    

?>

<body>
  <div class="container">
    <div class="logo-container">
      <div class="logo">
               <img src="logo.png" alt="" id="logo">

      </div>
    </div>

    <div class="welcome-text">
      <h1>Nome do Canal</h1>
      <p>Editar nome do Canal</p>
    </div>

    <form class="signup-form" action="../Controller/editarCanal.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Nome do Canal</label>
        <input type="text" id="nome" name="nome" value="<?=$canal['nomeCanal']?>" placeholder="Digite o nome do Canal" class="input-field" />
        <input type="hidden"  name="id" value="<?=$canal['idCanal']?>"/>
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


<script src="../js/cep.js"></script>

  <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>