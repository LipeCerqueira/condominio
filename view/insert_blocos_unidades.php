<?php
@session_start();
require_once("../Model/connect.php");

$conn = $con;

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blocos_input = trim($_POST["blocos"]);
    $pavimentos = intval($_POST["pavimentos"]);
    $unidades_por_pavimento = intval($_POST["unidades_por_pavimento"]);
    $inicio_numero = intval($_POST["inicio_numero"]);
    $tipo_numeracao = $_POST["tipo_numeracao"];
    $id_condominio = intval($_POST["id_condominio"]);

    $blocos = array_map('trim', explode(',', $blocos_input));

    $sucesso = 0;
    $falha = 0;

    foreach ($blocos as $bloco) {
        for ($pav = 1; $pav <= $pavimentos; $pav++) {
            for ($u = 0; $u < $unidades_por_pavimento; $u++) {

                // CORREÇÃO: Cálculo correto do número base por pavimento
                if ($tipo_numeracao == "decimal") {
                    $numero_base = $inicio_numero + (($pav - 1) * 10);
                } else {  // centena
                    $numero_base = $inicio_numero + (($pav - 1) * 100);
                }

                $numero_unidade = $numero_base + $u;

                $sql = "INSERT INTO unidades (bloco, unidade, id_condominio) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $bloco, $numero_unidade, $id_condominio);

                if ($stmt->execute()) {
                    $sucesso++;
                } else {
                    $falha++;
                }

                $stmt->close();
            }
        }
    }

    echo "<h2>Resultado da Inserção:</h2>";
    echo "<p><strong>$sucesso</strong> unidades inseridas com sucesso.</p>";
    if ($falha > 0) {
        echo "<p><strong>$falha</strong> unidades falharam na inserção.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerador de Unidades - Execução Automática</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        input, select, textarea { width: 300px; padding: 5px; margin-bottom: 10px; }
        label { display: block; margin-top: 10px; }
        button { padding: 8px 16px; }
    </style>
</head>
<body>

<h1>Gerador Automático de Unidades no Banco</h1>

<form method="POST">
    <label>ID do Condomínio:</label>
    <input type="number" name="id_condominio" required>

    <label>Blocos (separados por vírgula, ex: A,B,C ou 01,02):</label>
    <input type="text" name="blocos" required>

    <label>Quantidade de Pavimentos:</label>
    <input type="number" name="pavimentos" required>

    <label>Unidades por Pavimento:</label>
    <input type="number" name="unidades_por_pavimento" required>

    <label>Número Inicial por Pavimento (ex: 11 ou 101):</label>
    <input type="number" name="inicio_numero" required>

    <label>Tipo de Numeração:</label>
    <select name="tipo_numeracao" required>
        <option value="decimal">Decimal (11, 21, 31...)</option>
        <option value="centena">Centena (101, 201, 301...)</option>
    </select>

    <button type="submit">Gerar e Inserir Unidades</button>
</form>

</body>
</html>
