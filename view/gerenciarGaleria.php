<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administração - Cadastro App</title>
    <meta name="description" content="Painel de Administração" />
    <meta name="author" content="Lovable" />

    <link rel="stylesheet" href="../css/gerenciamento.css">
    <link rel="stylesheet" href="../css/galeriaFoto.css">
    <script src="../JS/sweetalert.js"></script>

    <script>
        function excluir(id, local, ip, usuario) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../Controller/excluirFoto.act.php?id=' + id + '&local=' + local + '&ip=' + ip + '&usuario=' + usuario;
                }
            })
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
                    Gerenciamento de Imagens
                </div>

                <a href="adm.php" class="admin-button outline">Voltar</a>
            </div>



            <div class="admin-card-content">
                <div class="gallery-grid">
                    <?php
                    @session_start();
                    require_once("../Model/connect.php");
                    $busca = mysqli_query($con, "
    SELECT 
        G.*, 
        U.*, 
        DATE_FORMAT(G.dataHora, '%d/%m/%Y - %H:%i') AS data_formatada, 
        G.caminhoFoto AS foto,
        G.status AS statusFoto
    FROM 
        galeriaFotos G
    LEFT JOIN 
        usuario U ON G.idUsuario = U.id  
    GROUP BY 
        G.idFoto desc
");

                    while ($foto = mysqli_fetch_assoc($busca)) {
                    ?>
                        <div class="photo-card">
                            <img src="<?= $foto['foto'] ?>" alt="Foto" class="gallery-image">

                            <div class="photo-info">
                                <div class="photo-author">
                                    <i class="fas fa-user-circle"></i><b> <?= strtoupper($foto['nome']) ?></b>
                                </div>
                                <div class="photo-date">
                                    <i class="far fa-calendar-alt"></i> <?= $foto['data_formatada'] ?>
                                </div>
                                <div class="gerenciarBtn">
                                    <button class="curtir-btn">
                                        <i class="fas fa-heart"></i> Curtidas <span class="curtidas-contador"><?= $foto['curtidas'] ?? 0 ?></span>
                                    </button>

                                    <?php

                                    $ip = $_SERVER['REMOTE_ADDR'];

                                    $ip = $_SERVER['REMOTE_ADDR'];
                                    if ($ip == '::1') {
                                        $ip = '127.0.0.1';
                                    }
                                    ?>

                                    <button class='excluirFoto' onclick="excluir(<?= $foto['idFoto'] ?>, 'adm')">Excluir</button>
                                    <h4 id="statusFoto" class="
                                        <?php
                                                            if ($foto['statusFoto'] == 1) {
                                                                echo 'status-ativo';
                                                            } else if ($foto['statusFoto'] == 2) {
                                                                echo 'status-pendente';
                                                            } else {
                                                                echo 'status-inativo';
                                                            }
                                        ?>
                                    ">
                                        <?php
                                        if ($foto['statusFoto'] == 1) {
                                            echo "Ativo";
                                        } else if ($foto['statusFoto'] == 2) {
                                            echo "Aguardando Validação";
                                        } else {
                                            echo "Inativo";
                                        }
                                        ?>
                                    </h4>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 App. Todos os direitos reservados.</p>
        </div>
    </div>


</body>

</html>