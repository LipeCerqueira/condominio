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

?>

<body>
  <div class="container">
    <div class="logo-container">
      <div class="logo">
              <img src="logo.png" alt="" id="logo">

      </div>
    </div>

    <div class="welcome-text">
      <h1>Adicionar Dependência</h1>
      <p>Preencha os dados para adicionar uma Dependência Interna</p>
    </div>

    <form class="signup-form" action="../Controller/adicionarDependencia.act.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Nome *</label>
        <input type="text" id="nome" name="nome" required placeholder="Digite o nome da Dependência" class="input-field" />
      </div>
      <div class="form-group">
          <label for="dataInicio">descricao * </label>
          <input type="text" name="descricao" id="descricao" placeholder="Descrição" class="input-field" />
        </div>

      <div class="form-group">
        <label for="cpf">Capacidade * </label>
        <input type="number"  name="capacidade" required placeholder="Capacidade"  class="input-field" />
      </div>

   <div class="form-group">
        <label for="duracao">Horario de Abertura *</label>
        <input type="time" id="duracao" required name="abertura" placeholder="Horario de Abertura" class="input-field" />
      </div>
   <div class="form-group">
        <label for="duracao">Horario de Fechamento *</label>
        <input type="time" id="duracao" required name="fechamento" placeholder="Horario de Fechamento" class="input-field" />
      </div>

     

      

      <?php 
      
    //   $ip = $_SERVER['REMOTE_ADDR'];

    //   $ip = $_SERVER['REMOTE_ADDR'];
    //   if ($ip == '::1') {
    //      $ip = '127.0.0.1';
    //   }
      ?>
      <!-- <input type="hidden" name="ip" value="<?=$ip?>" /> -->
     

      <button class="btn btn-primary" type="submit">
        Cadastrar
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