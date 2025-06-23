<form action="../Controller/alterarSenha.act.php" method="post">
    <input type="hidden" name="id" value="<?= $_SESSION['idUsuario'] ?>">
    <label>Nova Senha:</label>
    <input type="password" name="nova_senha" required>
    <button type="submit">Alterar Senha</button>
</form>
