<link rel="stylesheet" href="../css/setup.css">

<?php
// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (ajuste conforme seu ambiente)
  @session_start();
  require_once("../Model/connect.php");

    $conn = $con;

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Coletando os dados do formulário
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

    for ($i = 1; $i <= 5; $i++) {
        ${"responsavel_administrativo_$i"} = $_POST["responsavel_administrativo_$i"];
        ${"telefone_$i"} = $_POST["telefone_$i"];
        ${"email_$i"} = $_POST["email_$i"];
    }

    $status = $_POST['status'];

    // Monta a query
    $sql = "INSERT INTO condominios (
                nome_fantasia,
                razao_social,
                cnpj,
                inscricao_estadual,
                cep,
                endereco,
                numero,
                complemento,
                bairro,
                cidade,
                estado,
                pais,
                responsavel_administrativo_1, telefone_1, email_1,
                responsavel_administrativo_2, telefone_2, email_2,
                responsavel_administrativo_3, telefone_3, email_3,
                responsavel_administrativo_4, telefone_4, email_4,
                responsavel_administrativo_5, telefone_5, email_5,
                status
            ) VALUES (
                '$nome_fantasia', '$razao_social', '$cnpj', '$inscricao_estadual', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$pais',
                '$responsavel_administrativo_1', '$telefone_1', '$email_1',
                '$responsavel_administrativo_2', '$telefone_2', '$email_2',
                '$responsavel_administrativo_3', '$telefone_3', '$email_3',
                '$responsavel_administrativo_4', '$telefone_4', '$email_4',
                '$responsavel_administrativo_5', '$telefone_5', '$email_5',
                '$status'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Condomínio cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Condomínio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input, select {
            padding: 8px;
            font-size: 14px;
        }
        .responsavel-block {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Cadastro de Condomínio</h2>

<form method="post" action="">

    <label>Nome Fantasia:</label>
    <input type="text" name="nome_fantasia" required>

    <label>Razão Social:</label>
    <input type="text" name="razao_social">

    <label>CNPJ:</label>
    <input type="text" name="cnpj">

    <label>Inscrição Estadual:</label>
    <input type="text" name="inscricao_estadual">

    <label>CEP:</label>
    <input type="text" name="cep">

    <label>Endereço:</label>
    <input type="text" name="endereco">

    <label>Número:</label>
    <input type="text" name="numero">

    <label>Complemento:</label>
    <input type="text" name="complemento">

    <label>Bairro:</label>
    <input type="text" name="bairro">

    <label>Cidade:</label>
    <input type="text" name="cidade">

    <label>Estado:</label>
    <input type="text" name="estado" maxlength="2">

    <label>País:</label>
    <input type="text" name="pais" value="Brasil">

    <?php for ($i = 1; $i <= 5; $i++) { ?>
        <div class="responsavel-block">
            <h4>Responsável Administrativo <?php echo $i; ?></h4>

            <label>Nome:</label>
            <input type="text" name="responsavel_administrativo_<?php echo $i; ?>">

            <label>Telefone:</label>
            <input type="text" name="telefone_<?php echo $i; ?>">

            <label>Email:</label>
            <input type="email" name="email_<?php echo $i; ?>">
        </div>
    <?php } ?>

    <label>Status:</label>
    <select name="status">
        <option value="Ativo">Ativo</option>
        <option value="Inativo">Inativo</option>
    </select>

    <button type="submit">Salvar Condomínio</button>

</form>

</body>
</html>
