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
            window.location.href = "minhasIndicacoes.php";
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


require("../model/connect.php");
@$id =  $_GET["id"];

                    $consulta = mysqli_query($con, "SELECT * FROM `profissao`"); 
                     
                    $consulta2 = mysqli_query($con, "SELECT * FROM `profissional` WHERE id = '$id'");
                    $usuario = mysqli_fetch_assoc($consulta2);
                    

?>

<body>
<div class="container">
    <div class="logo-container">
      <div class="logo">
               <img src="logo.png" alt="" id="logo">

      </div>
    </div>

    <div class="welcome-text">
      <h1>Editar Indicação</h1>
      
      <p class="subtitle">Editar os dados da indicação</p>
   
    </div>

    <form class="signup-form" action="../Controller/editarProfissional.act.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="pagina" value="gerenciamento">
    <div class="form-group">
                <label for="nome">Nome *</label>
                <input type="text" id="nome" name="nome" value="<?=$usuario['nome']?>" required placeholder="Digite o nome" class="input-field" />
            </div>
            <input type="hidden" value="<?=$usuario['id']?>" name="id">
<input type="hidden"  name="local" value="user" />
            <div class="form-group">
                <label for="telefone">Telefone *</label>
                <input type="text" id="telefone" name="telefone" value="<?=$usuario['telefone']?>" required maxlength="11" placeholder="(00) 0000-0000" class="input-field" />
            </div>
           

            <div class="form-group">
                <label for="profissao" class="required">Serviço</label>
                <select
                    id="profissao"
                    name="profissao"
                    required>
                    <option value="" disabled selected>Selecione a Serviço</option>
                    <?php 
                    
                    while($profissao = mysqli_fetch_assoc($consulta)){
                        echo "<option value='".$profissao['idProfissao']."'"; 
                        if($usuario['idProfissao'] == $profissao["idProfissao"]){ echo "selected";} 
                        echo ">".$profissao['nomeProfissao']."</option>";
                    }?>
                   
                </select>
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

      
    </div>

   


    <div class="footer">
        <p>© 2025 App. Todos os direitos reservados.</p>
    </div>
    </div>


  <script>
        $(document).ready(function() {
           
            $("#telefone").mask("(00) 00000-0000"); // Máscara para telefone
       
        });
    </script>

    

    <script src="../js/cep.js"></script>
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>