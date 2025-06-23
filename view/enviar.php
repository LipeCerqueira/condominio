<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensagem Enviada</title>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="styles.css" -->
<link rel="stylesheet" href="../css/paginaInicial.css">
<link rel="stylesheet" href="../css/infoUteis.css">
<!-- link rel="stylesheet" href="../css/setup.css" -->
 
	<script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</head>

<body>
  <!-- Header -->
<?php
  require("partes/header.php");
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome     = $_POST['nome'];
    $email    = $_POST['email'];
    $telefone = $_POST['telefone'];
    $assunto  = $_POST['assunto'];
    $mensagem = nl2br(htmlspecialchars($_POST['mensagem']));

    $mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'suporte@ontimenet.com.br';
        $mail->Password   = 'alfp qrlh fhuk nwex';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // From precisa ser o e-mail autenticado
        $mail->setFrom('suporte@ontimenet.com.br', 'Formulário - Portal VDP');

        // Adiciona "Reply-To" com o e-mail do cliente
        $mail->addReplyTo($email, $nome);

        // Destinatário
        $mail->addAddress('contato@portalvdp.com.br');

        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body    = "<strong>Nome:</strong> $nome<br>
                          <strong>E-mail:</strong> $email<br>
                          <strong>Telefone:</strong> $telefone<br><br>
                          <strong>Mensagem:</strong><br>$mensagem";
        $mail->AltBody = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\n\nMensagem:\n" . strip_tags($mensagem);

        $mail->send();
         echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "success",
                title: "Mensagem enviada com sucesso!",
                text: "Responderemos o mais breve possível.",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "paginaInicial.php";
            });
        </script>';
    } catch (Exception $e) {
         echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "error",
                title: "Erro ao enviar e-mail",
                text: "'.addslashes($mail->ErrorInfo).'",
                confirmButtonText: "OK"
            });
        </script>';
    }
}
?>
<?php
  require("partes/footer.php")
?>
</body>
</html>