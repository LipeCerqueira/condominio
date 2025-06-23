<?php
  

@session_start();
  require_once("../Model/connect.php");

    $conn = $con;

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se veio um ID por GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

$id = intval($_GET['id']);

// Processamento de atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_fantasia = $_POST['nome_fantasia'];
    $razao_social = $_POST['razao_social'];
    $cnpj = $_POST['cnpj'];
    $inscricao_estadual = $_POST['inscricao_estadual'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $responsaveis = [];
    $telefones = [];
    $emails = [];

    for ($i = 1; $i <= 5; $i++) {
        $responsaveis[] = $POST["responsavel_administrativo$i"] ?? null;
        $telefones[] = $POST["telefone$i"] ?? null;
        $emails[] = $POST["email$i"] ?? null;
    }

    $status = $_POST['status'];

    $sql = "UPDATE condominios SET 
                nome_fantasia = ?, razao_social = ?, cnpj = ?, inscricao_estadual = ?, cep = ?, endereco = ?, numero = ?, complemento = ?,
                bairro = ?, cidade = ?, estado = ?, pais = ?,
                responsavel_administrativo_1 = ?, telefone_1 = ?, email_1 = ?,
                responsavel_administrativo_2 = ?, telefone_2 = ?, email_2 = ?,
                responsavel_administrativo_3 = ?, telefone_3 = ?, email_3 = ?,
                responsavel_administrativo_4 = ?, telefone_4 = ?, email_4 = ?,
                responsavel_administrativo_5 = ?, telefone_5 = ?, email_5 = ?,
                status = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro ao preparar statement: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssssssssssssssssssssi",
        $nome_fantasia, $razao_social, $cnpj, $inscricao_estadual, $cep, $endereco, $numero, $complemento,
        $bairro, $cidade, $estado, $pais,
        $responsaveis[0], $telefones[0], $emails[0],
        $responsaveis[1], $telefones[1], $emails[1],
        $responsaveis[2], $telefones[2], $emails[2],
        $responsaveis[3], $telefones[3], $emails[3],
        $responsaveis[4], $telefones[4], $emails[4],
        $status,
        $id
    );

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Condomínio atualizado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao atualizar: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Carregar os dados existentes
$sql = "SELECT * FROM condominios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Condomínio não encontrado.");
}

$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Condomínio</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 800px; margin: auto; }
        label { margin-top: 10px; display: block; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
        .responsavel-block { border: 1px solid #ccc; padding: 10px; margin-top: 15px; border-radius: 5px; }
        button { padding: 10px; background-color: #2196F3; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #1976D2; }
    </style>
      <link rel="stylesheet" href="../css/paginaInicial.css">
</head>
<body>
<?php 

  require("partes/header.php");

?>
<h2>Atualizar Condomínio</h2>

<form method="post">
    <label>Nome Fantasia:</label>
    <input type="text" name="nome_fantasia" value="<?= htmlspecialchars($row['nome_fantasia']) ?>" required>

    <label>Razão Social:</label>
    <input type="text" name="razao_social" value="<?= htmlspecialchars($row['razao_social']) ?>">

    <label>CNPJ:</label>
    <input type="text" name="cnpj" value="<?= htmlspecialchars($row['cnpj']) ?>">

    <label>Inscrição Estadual:</label>
    <input type="text" name="inscricao_estadual" value="<?= htmlspecialchars($row['inscricao_estadual']) ?>">

    <label>CEP:</label>
    <input type="text" name="cep" value="<?= htmlspecialchars($row['cep']) ?>">

    <label>Endereço:</label>
    <input type="text" name="endereco" value="<?= htmlspecialchars($row['endereco']) ?>">

    <label>Número:</label>
    <input type="text" name="numero" value="<?= htmlspecialchars($row['numero']) ?>">

    <label>Complemento:</label>
    <input type="text" name="complemento" value="<?= htmlspecialchars($row['complemento']) ?>">

    <label>Bairro:</label>
    <input type="text" name="bairro" value="<?= htmlspecialchars($row['bairro']) ?>">

    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?= htmlspecialchars($row['cidade']) ?>">

    <label>Estado:</label>
    <input type="text" name="estado" maxlength="2" value="<?= htmlspecialchars($row['estado']) ?>">

    <label>País:</label>
    <input type="text" name="pais" value="<?= htmlspecialchars($row['pais']) ?>">

    <?php for ($i = 1; $i <= 5; $i++) { ?>
        <div class="responsavel-block">
            <h4>Responsável Administrativo <?= $i; ?></h4>

            <label>Nome:</label>
            <input type="text" name="responsavel_administrativo_<?= $i; ?>" value="<?= htmlspecialchars($row["responsavel_administrativo_$i"]) ?>">

            <label>Telefone:</label>
            <input type="text" name="telefone_<?= $i; ?>" value="<?= htmlspecialchars($row["telefone_$i"]) ?>">

            <label>Email:</label>
            <input type="email" name="email_<?= $i; ?>" value="<?= htmlspecialchars($row["email_$i"]) ?>">
        </div>
    <?php } ?>

    <label>Status:</label>
    <select name="status">
        <option value="Ativo" <?= ($row['status'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
        <option value="Inativo" <?= ($row['status'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
    </select>

    <button type="submit">Salvar Alterações</button>
</form>

<?php 

  require("partes/footer.php");

?>

</body>
</html>