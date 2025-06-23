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

</head>

<body>
    <!-- Header -->
    <!-- Header -->
    <?php

    require("partes/header.php");
    ?>


    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Gallery Section -->
            <section id="galeria">
                <h2 class="section-title">Galeria de Fotos</h2>

                <?php
                require("../Model/connect.php");
                @session_start();
                if (isset($_SESSION['id'])) {

                    $sql = mysqli_query($con, "SELECT * FROM galeriaFotos WHERE idUsuario = '{$_SESSION['id']}'");
                }

                if ($sql->num_rows < 3) {

                    echo "<p class='gallery-description'>Participe! Limite de 03 fotos por conta.</p>";
                ?>






                    <div class="photo-button-container">
                        <form id="uploadForm" enctype="multipart/form-data">
                            <label for="foto" class="send-photo-btn">
                                <i class="fas fa-camera"></i> Enviar Foto
                            </label>
                            <input type="file" name="foto" id="foto" accept="image/*" style="display: none;">
                            <?php

                            $ip = $_SERVER['REMOTE_ADDR'];

                            $ip = $_SERVER['REMOTE_ADDR'];
                            if ($ip == '::1') {
                                $ip = '127.0.0.1';
                            }
                            ?>

                            <input type="hidden" name="ip" value="<?= $ip ?>" />
                        </form>
                    </div>

                <?php
                } else {
                    echo "<p class='gallery-description' style='color:red;'>Você atingiu o limite de 3 fotos por conta</p>";
                }
                ?>
                <script>
                    const input = document.getElementById('foto');

                    input.addEventListener('change', function() {

                        <?php
                        @session_start();
                        if (!isset($_SESSION['id'])):
                        ?>
                            alert("⚠️ Você precisa estar logado para enviar uma foto.");
                            return;
                        <?php else: ?>
                            const formData = new FormData();
                            formData.append('foto', input.files[0]);

                            const ip = document.querySelector('input[name="ip"]').value;
                            formData.append('ip', ip);
                            formData.append('id', '<?= $_SESSION['id'] ?>');

                            fetch('../controller/upload.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: data.title,
                                        text: data.message,
                                        icon: data.status === 'success' ? 'success' : 'error',
                                        confirmButtonText: 'OK'
                                    });
                                })

                                .catch(error => {
                                    console.error('Erro no upload:', error);
                                });
                        <?php endif; ?>
                    });
                </script>




                <div class="gallery-grid">
                    <?php
                    @session_start();
                    $idUsuario = $_SESSION['id'] ?? null;


                    $busca = mysqli_query($con, "SELECT G.*, U.*, DATE_FORMAT(G.dataHora, '%d/%m/%Y - %H:%i') AS data_formatada, G.caminhoFoto AS foto FROM galeriaFotos G LEFT JOIN usuario U ON G.idUsuario = U.id WHERE G.status = 1");

                    while ($foto = mysqli_fetch_assoc($busca)) {
                        $jaCurtiu = false;
                        if ($idUsuario) {
                            $idFoto = $foto['idFoto'];
                            $verificaCurtida = mysqli_query($con, "SELECT 1 FROM curtidas WHERE idUsuario = $idUsuario AND idFoto = $idFoto");
                            $jaCurtiu = mysqli_num_rows($verificaCurtida) > 0;
                        }
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
                                    <button class="curtir-btn" <?= $jaCurtiu ? 'disabled' : '' ?>>
                                        <i class="fas fa-heart"></i> <?= $jaCurtiu ? 'Curtido' : 'Curtir' ?>
                                    </button>
                                    <span class="curtidas-contador"><?= $foto['curtidas'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>

                </div>
            </section>
        </div>
    </main>

    <?php

    require("partes/footer.php")
    ?>
    <script>
        document.querySelectorAll('.curtir-btn').forEach(button => {
            button.addEventListener('click', function() {
                const area = this.closest('.curtir-area');
                const idFoto = area.getAttribute('data-id');

                fetch('../controller/curtir.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'id_foto=' + idFoto
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            area.querySelector('.curtidas-contador').textContent = data.novasCurtidas;
                            this.disabled = true;
                        } else {
                            alert(data.message || 'Erro ao curtir.');
                        }
                    });
            });
        });
    </script>


</body>

</html>