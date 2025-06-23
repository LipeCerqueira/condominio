<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login App</title>
    <meta name="description" content="Lovable Generated Project" />
    <meta name="author" content="Lovable" />
    <meta property="og:image" content="/og-image.png" />
    <!-- link rel="stylesheet" href="css/index.css" -->  
    <link rel="stylesheet" href="css/setup.css">

    <script>


        function cadastro(){
            window.location.href = "view/cadastro.php";
        }

        function login(){
            window.location.href = "view/login.php";
        }
        function visitante(ip){
            window.location.href = "controller/logVisitante.php?ip=" + ip;
        }

    </script>

  </head>
  <?php 
  
  require("Model/connect.php");
  $consulta = mysqli_query($con, "SELECT count(*) AS qtdeUsuario FROM `usuario` WHERE status = 1 AND `nivel` < 5");
  
  ?>

 <?php 
      
      $ip = $_SERVER['REMOTE_ADDR'];

      $ip = $_SERVER['REMOTE_ADDR'];
      if ($ip == '::1') {
         $ip = '127.0.0.1';
      }
      ?>

  <body>
    <div class="container">
      <div class="logo-container">
        <div class="logo">
          <img src="view/logo.png" alt="" id="logo">
        </div>
      </div>
      
      <div class="welcome-text">
        <h1>Bem-vindo ao</h1>  
		  <h1>Portal <b>Villa Dom Pedro</b></h1>
      </div>
      <div class="totUser">
            <h2>SOMOS EM  <?php while ($qtdeUsuario = mysqli_fetch_assoc($consulta)) {
                echo $qtdeUsuario["qtdeUsuario"];
              } ?> CONECTADOS.</h2>
        <h2>JUNTOS SOMOS MAIS FORTES.</h2>
      </div>
  
      <div class="buttons-container">
        <button class="btn btn-primary" onclick="visitante('<?=$ip?>')">
          Visitante
        </button>
        
        <button class="btn btn-secondary" onclick="login()">
          Usuário cadastrado
        </button>
        
        <button class="btn btn-tertiary" onclick="cadastro()">
          Cadastrar
        </button>

        
      </div>
      
      <div class="footer">
        <p>© Todos os direitos reservados.</p>
      </div>
    </div>
    
   
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  </body>
</html>
