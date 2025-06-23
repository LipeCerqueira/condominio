<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administração - Cadastro App</title>
    <meta name="description" content="Painel de Administração" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="author" content="Lovable" />
    <link rel="stylesheet" href="/src/styles.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <link rel="stylesheet" href="../css/listaServico.css">
  
    <script src="../JS/sweetalert.js"></script>
    <script>
        mudarStatusProfissional = (id, status) => {
            window.location.href = '../controller/mudarStatusProfissional.act.php?id=' + id + '&status=' + status;
        }
        editar = (id, status) => {
            window.location.href = '../view/editarProfissional.php?id=' + id;
        }
        destacar = (id, destaque) => {
            window.location.href = '../controller/destacar.act.php?id=' + id + '&destaque=' + destaque;
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
                    Administração de Profissionais
                </div>
                <a href="profissionais.php" class="admin-button outline">Adicionar Profissional</a>
                <a href="adm.php" class="admin-button outline">Voltar</a>
            </div>



            <div class="admin-card-content">
                <div class="admin-table-container">
                    
                    <div class="services-grid">
                        <button class="btnFiltro" data-profissao-id="0">Mostrar Todos</button>
                        <?php

                        require("../Model/connect.php");
                        $consulta = mysqli_query($con, "
                                                        SELECT *
                                                        FROM profissao WHERE status =1 ORDER BY nomeProfissao;
      ");

                        while ($servico = mysqli_fetch_assoc($consulta)) {


                        ?>

                            <button class="btnFiltro" data-profissao-id='<?= $servico['idProfissao'] ?>'><?= $servico['nomeProfissao'] ?></button>

                        <?php

                        }
                        ?>

                    </div>

                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Serviço</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 App. Todos os direitos reservados.</p>
        </div>
    </div>

    <script>
document.querySelectorAll('.btnFiltro').forEach(button => {
    button.addEventListener('click', () => {
        const profissaoId = button.getAttribute('data-profissao-id');

        // Remove a classe "ativo" de todos os botões
        document.querySelectorAll('.btnFiltro').forEach(btn => {
            btn.classList.remove('ativo');
        });

        // Adiciona a classe "ativo" ao botão clicado
        button.classList.add('ativo');

        // Faz a requisição
        fetch(`../controller/filtrar_profissionais.php?profissao_id=${profissaoId}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector('.admin-table tbody').innerHTML = data;
            })
            .catch(error => {
                console.error('Erro ao buscar profissionais:', error);
            });
    });
});

// Dispara o "Mostrar Todos" automaticamente ao carregar a página
window.addEventListener('DOMContentLoaded', () => {
    const mostrarTodosBtn = document.querySelector('.btnFiltro[data-profissao-id="0"]');
    if (mostrarTodosBtn) {
        mostrarTodosBtn.click();
    }
});
</script>

</body>

</html>