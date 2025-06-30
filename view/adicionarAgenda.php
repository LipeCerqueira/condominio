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
    <script src="../JS/sweetalert.js"></script>


    <link rel="stylesheet" href="../css/cadastro.css">


</head>


<?php
@session_start();
if (isset($_SESSION["msg"])) {
    echo "<script>
  Swal.fire({
      title: '{$_SESSION['msg']}',
      text: '{$_SESSION['alertMsg']}',
      icon: '{$_SESSION['alertIcon']}'
  });
</script>";
    unset($_SESSION["msg"]);
    unset($_SESSION["alertMsg"]);
    unset($_SESSION["alertIcon"]);
}


require("../model/connect.php");

$busca = mysqli_query($con, "SELECT * FROM `area` WHERE status = 1"); //buscar condominios
?>

<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                <img src="logo.png" alt="" id="logo">

            </div>
        </div>

        <div class="welcome-text">
            <h1>Fazer Agenda</h1>
            <p>Preencha os dados para adicionar uma Dependência Interna</p>
        </div>

        <form class="signup-form" action="../Controller/adicionarAgenda.act.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Local *</label>
                <select name="area" required>
                    <option value="" disabled selected>SELECIONE UMA DEPENDÊNCIA</option>
                    <?php
                    while ($area = mysqli_fetch_assoc($busca)) {



                    ?>
                        <option value="<?= $area['id_area'] ?>" required><?= $area['nome'] ?></option>
                    <?php
                    }

                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="dataInicio">Morador * </label>
                <input type="text" name="morador" placeholder="Morador" class="input-field" />
            </div>

            <div class="form-group">
                <label for="cpf">Data Agendamento * </label>
                <input type="date" name="data" required class="input-field" />
            </div>

            <div class="form-group">
                <label for="duracao">Horario de Ínicio *</label>
                <input type="time" required name="inicio" placeholder="Horario de Abertura" class="input-field" />
            </div>
            <div class="form-group">
                <label for="duracao">Horario de Encerramento *</label>
                <input type="time" id="duracao" required name="fim" placeholder="Horario de Fechamento" class="input-field" />
            </div>

            <div class="form-group">
                <label for="dataInicio">Observações</label>
                <input type="text" name="observacao" id="descricao" placeholder="Observação" class="input-field" />
            </div>
            <div class="form-group">
                <label for="dataInicio">Status</label>
                <select name="status" required>
                    <option value="" disabled selected>SELECIONE </option>
                    <option value="pendente"  >Pendente </option>
                    <option value="aprovado"  >Aprovado </option>
                    <option value="rejeitado" >Rejeitado </option>
                    <option value="cancelado" >Cancelado </option>
                  

                </select>
            </div>





            <?php

            //   $ip = $_SERVER['REMOTE_ADDR'];

            //   $ip = $_SERVER['REMOTE_ADDR'];
            //   if ($ip == '::1') {
            //      $ip = '127.0.0.1';
            //   }
            ?>
            <!-- <input type="hidden" name="ip" value="<?= $ip ?>" /> -->


            <button class="btn btn-primary" type="submit">
                Cadastrar
            </button>
        </form>



        <div class="footer">
            <p>© 2025 App. Todos os direitos reservados.</p>
        </div>
    </div>



    <script src="../js/cep.js"></script>

    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</body>

</html>