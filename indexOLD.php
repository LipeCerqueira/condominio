<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login App</title>
    <meta name="description" content="Lovable Generated Project" />
    <meta name="author" content="Lovable" />
    <meta property="og:image" content="/og-image.png" />
    <link rel="stylesheet" href="css/index.css">


    <script>


        function cadastro(){
            window.location.href = "view/cadastro.php";
        }

        function login(){
            window.location.href = "view/login.php";
        }
        function visitante(){
            window.location.href = "view/paginaInicial.php";
        }

    </script>

  </head>

  <body>
    <div class="container">
      <div class="logo-container">
        <div class="logo">
          <img src="view/logo.png" alt="" id="logo">
        </div>
      </div>
      
      <div class="welcome-text">
        <h1>Bem-vindo ao <br>
        Portal Villa Dom Pedro</h1>        
      </div>
      
      <div class="buttons-container">
        <button class="btn btn-primary" onclick="visitante()">
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
        <p>© 2025 App. Todos os direitos reservados.</p>
      </div>
    </div>
    
   
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  </body>
</html>
