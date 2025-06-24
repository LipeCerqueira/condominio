<?php
  
@session_start();


require("../model/connect.php");
extract($_GET);

$consulta = mysqli_query($con, "SELECT * FROM `condominios` WHERE id = '$id'");
$condominio = mysqli_fetch_assoc($consulta);


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

<form action="../Controller/editarCondominio.act.php" method="post" enctype="multipart/form-data">
    <label>Nome Fantasia:</label>
    <input type="text" name="nome_fantasia" value="<?= $condominio["nome_fantasia"] ?>" required>

    <label>Razão Social:</label>
    <input type="text" name="razao_social" value="<?= $condominio["razao_social"] ?>">
    <input type="hidden" name="id" value="<?= $condominio["id"] ?>">

    <label>CNPJ:</label>
    <input type="text" name="cnpj" value="<?= $condominio["cnpj"] ?>">

    <label>Inscrição Estadual:</label>
    <input type="text" name="inscricao_estadual" value="<?=$condominio["inscricao_estadual"] ?>">

    <label>CEP:</label>
    <input type="text" name="cep" value="<?= $condominio["cep"] ?>">

    <label>Endereço:</label>
    <input type="text" name="endereco" value="<?= $condominio["endereco"]?>">

    <label>Número:</label>
    <input type="text" name="numero" value="<?= $condominio["numero"] ?>">

    <label>Complemento:</label>
    <input type="text" name="complemento" value="<?= $condominio["complemento"] ?>">

    <label>Bairro:</label>
    <input type="text" name="bairro" value="<?= $condominio["bairro"] ?>">

    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?= $condominio["cidade"]?>">

    <label>Estado:</label>
    <input type="text" name="estado" maxlength="2" value="<?= $condominio["estado"] ?>">

    <label>País:</label>
    <input type="text" name="pais" value="<?= $condominio["pais"] ?>">

    <?php for ($i = 1; $i <= 5; $i++) { ?>
        <div class="responsavel-block">
            <h4>Responsável Administrativo <?= $i; ?></h4>

            <label>Nome:</label>
            <input type="text" name="responsavel_administrativo_<?= $i; ?>" value="<?= $condominio["responsavel_administrativo_$i"] ?>">

            <label>Telefone:</label>
            <input type="text" name="telefone_<?= $i; ?>" value="<?= $condominio["telefone_$i"] ?>">

            <label>Email:</label>
            <input type="email" name="email_<?= $i; ?>" value="<?= $condominio["email_$i"] ?>">
        </div>
    <?php } ?>

    <label>Status:</label>
    <select name="status">
        <option value="Ativo" <?= ($condominio['status'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
        <option value="Inativo" <?= ($condominio['status'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
    </select>

    <button type="submit">Salvar Alterações</button>
</form>

<?php 

  require("partes/footer.php");

?>

</body>
</html>