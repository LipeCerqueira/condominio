<?php
$conn = new mysqli("localhost", "root", "", "db_condominio");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $token = bin2hex(random_bytes(32));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $stmt = $conn->prepare("UPDATE usuarios SET token_recuperacao=?, token_expira=? WHERE email=?");
        $stmt->bind_param("sss", $token, $expira, $email);
        $stmt->execute();

        $link = "https://seudominio.com/resetar-senha.php?token=$token";

        // Simulando envio (aqui você usaria PHPMailer ou similar)
        echo "Link de recuperação enviado para o e-mail: <a href='$link'>$link</a>";
    } else {
        echo "Se o e-mail estiver cadastrado, um link será enviado.";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required placeholder="Seu e-mail">
    <button type="submit">Enviar link de recuperação</button>
</form>
