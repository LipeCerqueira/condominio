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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- link rel="stylesheet" href="../css/cadastro.css" -->
  <link rel="stylesheet" href="../css/paginaInicial.css">
  <link rel="stylesheet" href="../css/contato.css">
<body>
<?php
  require("partes/header.php");
?>
  <main class="main-content">
    <div class="container">
      <!-- Useful Information Section -->
      <section id="useful-info">
        <h2 class="section-title">Fale com os desenvolvedores</h2>
        <p class="section-description">Envie-nos uma mensagem com a sua dúvida, sugestão ou solicitação.</p>
        <form action="enviar.php" method="POST" onsubmit="return validarEmail()">
          <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" class="input-field" ><br>
          </div>
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" id="email" class="input-field"><br>
          </div>
          <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="input-field"><br>
          </div>
          <div class="form-group">
            <label>Assunto:</label><input type="text" name="assunto" class="input-field"><br>
          </div>
          <div class="form-group">
            <label>Mensagem:</label><textarea name="mensagem" style="resize: none;" rows="5" class="input-field"></textarea><br>
          </div>
          <button class="btn btn-primary" id="enviarBtn" type="submit">
            Enviar
          </button>
        </form>
      </section>
    </div>
  </main>


  <script>
    // Máscara para telefone (XX) XXXXX-XXXX
    $(document).ready(function() {
      $('#telefone').on('input', function() {
        let valor = $(this).val().replace(/\D/g, '');
        if (valor.length > 11) valor = valor.slice(0, 11);
        valor = valor.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        $(this).val(valor);
      });
    });

    // Validação simples de e-mail com @ e .com / .com.br
    function validarEmail() {
      const email = document.getElementById('email').value;
      const regex = /^[^\s@]+@[^\s@]+\.(com|com\.br)$/;
      if (!regex.test(email)) {
        alert('Digite um e-mail válido com @ e .com ou .com.br');
        return false;
      }
      return true;
    }
  </script>
<?php
  require("partes/footer.php")
  ?>
</body>
</html>