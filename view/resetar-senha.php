<?php
$conn = new mysqli("localhost", "root", "", "db_condominio");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE token_recuperacao=? AND token_expira > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($usuario = $result->fetch_assoc()) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nova_senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE usuarios SET senha=?, token_recuperacao=NULL, token_expira=NULL WHERE id=?");
            $stmt->bind_param("si", $nova_senha, $usuario['id']);
            $stmt->execute();

            echo "Senha redefinida com sucesso!";
            exit;
        }
        ?>

        <form method="POST">
            <input type="password" name="senha" required placeholder="Nova senha">
            <button type="submit">Redefinir senha</button>
        </form>

        <?php
    } else {
        echo "Token inválido ou expirado.";
    }
} else {
    echo "Token não fornecido.";
}
?>
