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
            window.location.href = '../controller/aprovarAnuncio.php?id=' + id;
        }

        function excluir(id, local) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../Controller/excluirAnuncio.act.php?id=' + id + '&local=' + local;
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
                    Aprovação de anúncios:
                </div>
                
                <a href="adm.php" class="admin-button outline">Voltar</a>
            </div>



            <div class="admin-card-content">
            <main class="main-content">
        <div class="container">
            <!-- Events Section -->
            <section id="events">
                
                <?php

                function formatarTelefone($telefone)
                {
                    return substr($telefone, 0, 10) . '-XXXX';

                    // Monta o link do WhatsApp

                    // Remove tudo que não for número
                    $numeroLimpo = preg_replace('/\D/', '', $telefone);
                }

                ?>
                <?php


                extract($_GET);

                require_once("../Model/connect.php");
                $consulta = mysqli_query($con, "SELECT c.*, u.*, DATE_FORMAT(c.dataAnuncio, '%d/%m/%Y - %H:%i') AS data_formatada, c.status AS status_anuncio, c.id as id_anuncio FROM classificados c
                                INNER JOIN usuario U on c.id_usuario = u.id
                                where c.status = 'Aguardando Aprovação'
                                order by c.id desc
    
    ");

                ?>

                <section id="imoveis" style="margin-top: 50px;">


                    <div class="classified-grid">
                        <!-- Classified Ad Card 1 -->
                        <?php
                        if($consulta->num_rows == 0){
                            ?>
                                <h2>Não há anúncios para serem aprovados</h2>
                        
                        <?php   }
                        while ($anuncio = mysqli_fetch_assoc($consulta)) {

                        ?>
                            <div class="classified-card card-container">

                                <img src="<?= $anuncio['imagem'] ?>" alt="Apartamento à venda" class="classified-image">
                                <div class="classified-content">
                                    <h3 class="classified-title"><?= strtoupper($anuncio['titulo']) ?></h3>
                                    <div class="classified-price">
                                        <?php

                                        @session_start();
                                        if (isset($_SESSION["logado"])) {
                                            echo $anuncio['valor'];
                                        } else {
                                            echo "R$ XXXX,XX";
                                        }

                                        ?>
                                    </div>
                                    <p class="classified-description"><?= $anuncio['descricao'] ?></p>
                                    <p class="classified-description">Anunciado por: <?= $anuncio['nome'] ?></p>
                                    <div class="classified-contact" <?php

                                                                    if ($anuncio['status_anuncio'] == "Aguardando Aprovação") {
                                                                        echo "style='color: orange';";
                                                                    }
                                                                    ?>>

                                        <?= $anuncio['status_anuncio'] ?>
                                    </div>
                                    <button class='btn btn-editar' onclick="aprovar(<?= $anuncio['id_anuncio'] ?>)">Aprovar</button>
                                    <button class='btn btn-excluir' onclick="excluir(<?= $anuncio['id_anuncio']?>, 'adm')">Excluir</button>

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