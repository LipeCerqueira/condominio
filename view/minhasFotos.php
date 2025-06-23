<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Fotos</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
    <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="../css/galeriaFoto.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<body>

    <?php

    require("partes/header.php");
    ?>


    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Gallery Section -->
            <section id="galeria">
                <h2 class="section-title">Minhas Fotos</h2>

                <?php
                require("../Model/connect.php");
                @session_start();








                ?>





                <div class="gallery-grid">
                    <?php
                    @session_start();
                    $busca = mysqli_query($con, "
    SELECT 
        G.*, 
        U.*, 
        DATE_FORMAT(G.dataHora, '%d/%m/%Y - %H:%i') AS data_formatada, 
        G.caminhoFoto AS foto
    FROM 
        galeriaFotos G
    LEFT JOIN 
        usuario U ON G.idUsuario = U.id
    WHERE 
        G.status = 1 
        AND G.idUsuario = '{$_SESSION['id']}'
    GROUP BY 
        G.idFoto
");
                    if ($busca->num_rows > 0) {
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
                                    <div class="curtir-area" data-id="<?= $foto['idFoto'] ?>">
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

                                        <button class='btn btn-excluir' onclick="excluir(<?= $foto['idFoto'] ?>, 'user', '<?= $ip ?>', <?= $_SESSION['id'] ?>)">Excluir</button>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }else{
                       echo "<p class='gallery-description' style='color:red;'>Você ainda não postou nenhuma foto para a galeria</p>";
                    }

                    ?>
                </div>

            </section>
        </div>
    </main>

    <?php

    require("partes/footer.php")
    ?>



</body>

</html>