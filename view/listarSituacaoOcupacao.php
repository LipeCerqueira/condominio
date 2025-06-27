<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administração - Cadastro App</title>
    <meta name="description" content="Painel de Administração" />
    <meta name="author" content="Lovable" />
    <link rel="stylesheet" href="/src/styles.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <script src="../JS/sweetalert.js"></script>
    <script>
        mudarStatus = (id, status, local) => {
            window.location.href = '../controller/mudarStatusSituacao.act.php?id=' + id + '&status=' + status + '&local=' + local;
        }
        editar = (id) => {
            window.location.href = '../view/editarSituacaoOcupacao.php?id=' + id;
        }
    </script>
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
?>

<body>


    <div class="container">
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="admin-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="admin-icon">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Administração de Situação Ocupação
                </div>
                <a href="adicionarSituacaoOcupacao.php" class="admin-button outline">Adicionar Situação Ocupação</a>
                <a href="adm.php" class="admin-button outline">Voltar</a>
            </div>



            <div class="admin-card-content">
                <div class="admin-table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Situação ocupacao</th>
                                <!-- <th>situacao</th>

                                <th>Situação</th> -->
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            require_once("../model/connect.php");

                            $situacoes = mysqli_query($con, "SELECT * FROM `situacao_ocupacao` ");



                            while ($situacao = mysqli_fetch_assoc($situacoes)) {

                            ?>
                                <tr>


                                    <td><?= $situacao['nome_ocupacao'] ?></td>


                                    <td>
                                        <?php
                                        if ($situacao['status_ocupacao'] == '0') {
                                            echo '<span class="status-badge inactive">Inativo</span>';
                                        } else {
                                            echo '<span class="status-badge active">Ativo</span>';
                                        }
                                        ?>

                                    </td>
                                    <td class="actions-cell">
                                        <button class="admin-button small outline" onclick="editar(<?= $situacao['id_ocupacao'] ?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="button-icon">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg>
                                            Editar
                                        </button>
                                        <?php
                                        $local = "ocupacao";
                                        if ($situacao['status_ocupacao'] == '1') {
                                            echo '<button class="admin-button small destructive" onclick="mudarStatus(' 
        . $situacao['id_ocupacao'] . ', ' 
        . $situacao['status_ocupacao'] . ', \'' 
        . $local . '\')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="button-icon">
            <path d="M12 20h9"></path>
            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
        </svg> Inativar</button>';
                                        } else {
                                           echo '<button class="admin-button small destructive" onclick="mudarStatus(' 
        . $situacao['id_ocupacao'] . ', ' 
        . $situacao['status_ocupacao'] . ', \'' 
        . $local . '\')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="button-icon">
            <path d="M12 20h9"></path>
            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
        </svg> Ativar</button>';
                                        }
                                        ?>

                                    </td>
                                </tr>

                            <?php
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 App. Todos os direitos reservados.</p>
        </div>
    </div>


</body>

</html>