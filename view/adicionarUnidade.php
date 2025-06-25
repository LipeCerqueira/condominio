<?php
  
@session_start();

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


  require("../model/connect.php");

  $busca = mysqli_query($con,"SELECT * FROM `condominios` WHERE status = 'Ativo'");
  $busca2 = mysqli_query($con,"SELECT * FROM `situacao_unidade`");
 
?>
<h2>Adicionar Unidade</h2>

<form action="../Controller/adicionarUnidade.act.php" method="post" enctype="multipart/form-data">
    <label>Bloco:</label>
    <input type="text" name="bloco"  required maxlength="30">

    <label>Unidade:</label>
    <input type="text" name="unidade" maxlength="10">
  

    <label>Condominio:</label>
     <select name="condominio" required>
        <option value="" disabled selected>SELECIONE UM CONDOMÍNIO</option>
        <?php 
         while($condominio = mysqli_fetch_assoc($busca)){

        
        
        ?>
        <option value="<?=$condominio['id']?>" required><?=$condominio['nome_fantasia']?></option>
        <?php 
         }
        
        ?>
  
    </select>

    <label>Proprietário</label>
    <input type="text" name="proprietário" maxlength="10">

    <label>Morador:</label>
    <input type="text" name="morador" maxlength="10">

    <label>Vaga Garagem 1:</label>
    <input type="text" name="vaga1" maxlength="20">

    <label>Vaga Garagem 2:</label>
    <input type="text" name="vaga2" maxlength="20">

    <label>Vaga Garagem 3:</label>
    <input type="text" name="vaga3"maxlength="20" >

    <label>Vaga Garagem 4:</label>
    <input type="text" name="vaga4" maxlength="20">

    <label>Situação Unidade:</label>
      <select name="sitUnidade" required>
        <option value="" disabled selected>SELECIONE</option>
        <?php 
         while($situacao = mysqli_fetch_assoc($busca2)){

        
        
        ?>
        <option value="<?=$situacao['id_situacao']?>" required><?=$situacao['nome_situacao']?></option>
        <?php 
         }
        
        ?>
  
    </select>
 

    <label>Ocupante:</label>
    <input type="text" name="ocupante" maxlength="50">

    <label>Situação Financeira:</label>
    <input type="text" name="sitFinanceira" maxlength="20">

    <label>Observações:</label>
    <input type="text" name="observacao" >



    <button type="submit">Salvar Informações</button>
</form>

<?php 

  require("partes/footer.php");

?>

</body>
</html>