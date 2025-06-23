<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/infoUteis.css">
    <link rel="stylesheet" href="../css/meusAnuncios.css">
    <link rel="stylesheet" href="../css/detalheClassificados.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <script>
        function aprovar(id) {
            window.location.href = '../controller/aprovarImagem.php?id=' + id;
        }

        function excluir(id) {
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
                    window.location.href = '../Controller/excluirImagem.act.php?id=' + id;
                }
            })
        }
    </script>


</head>

<body>
    <?php
    @session_start();
    if (isset($_SESSION["msg"]) && isset($_SESSION["alertIcon"])) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '" . addslashes($_SESSION['msg']) . "',
                text: '" . addslashes($_SESSION['alertMsg']) . "',
                icon: '{$_SESSION['alertIcon']}'
            });
        });
    </script>";
        unset($_SESSION["msg"]);
        unset($_SESSION["alertMsg"]);
        unset($_SESSION["alertIcon"]);
    }




    ?>


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
                    Aprovação de imagens:
                </div>

                <a href="adm.php" class="admin-button outline">Voltar</a>
            </div>



            <div class="admin-card-content">
                <main class="main-content">
                    <div class="container">
                        <!-- Events Section -->
                        <section id="events">

                            <?php


                            extract($_GET);

                            require_once("../Model/connect.php");
                            $consulta = mysqli_query($con, "SELECT g.*,u.*, g.caminhoFoto AS foto, DATE_FORMAT(g.dataHora, '%d/%m/%Y - %H:%i') AS data_formatada FROM galeriafotos g
                LEFT JOIN usuario u ON g.idUsuario = u.id
                WHERE g.status = 2 ORDER BY g.dataHora DESC");
                            ?>





                            <section id="imoveis" style="margin-top: 50px;">


                                <div class="classified-grid">
                                    <!-- Classified Ad Card 1 -->
                                    <?php
                                    if ($consulta->num_rows == 0) {
                                    ?>
                                        <h2>Não há imagens para serem aprovados</h2>

                                    <?php   }
                                    while ($imagem = mysqli_fetch_assoc($consulta)) {

                                    ?>
                                        <div class="classified-card card-container">

                                            <img src="<?= $imagem['foto'] ?>" alt="Apartamento à venda" class="classified-image">
                                            <div class="classified-content">
                                                <h3 class="classified-title"><?= strtoupper($imagem['nome']) ?></h3>


                                                <p class="classified-description">Postado em: <?= $imagem['data_formatada'] ?></p>
                                                <div class="classified-contact" style="color:orange">
                                                    Aguardando aprovação</div>


                                                <button class='btn btn-editar' onclick="aprovar(<?= $imagem['idFoto'] ?>)">Aprovar</button>
                                                <button class='btn btn-excluir' onclick="excluir(<?= $imagem['idFoto'] ?>)">Excluir</button>

                                            </div>
                                        </div>
                                    <?php

                                    }
                                    ?>

                                </div>
                            </section>
                    </div>


            </div>



</body>

</html>