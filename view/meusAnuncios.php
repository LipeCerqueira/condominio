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
    <script>
        function editar(id) {
            window.location.href = '../view/editarAnuncio.php?id=' + id;
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
                    window.location.href = '../Controller/excluirAnuncio.act.php?id=' + id;
                }
            })
        }
    </script>

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

    <?php

    require('partes/header.php'); ?>
    <main class="main-content">
        <div class="container">
            <!-- Events Section -->
            <section id="events">
                <h2 class="section-title">Meus Anúncios</h2>
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
                                where c.id_usuario = {$_SESSION['id']}
                                order by c.id desc
    
    ");

                ?>

                <section id="imoveis" style="margin-top: 50px;">


                    <div class="classified-grid">
                        <!-- Classified Ad Card 1 -->
                        <?php
                        if ($consulta->num_rows > 0) {
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
                                        <div class="classified-contact" <?php

                                                                        if ($anuncio['status_anuncio'] == "Aguardando Aprovação") {
                                                                            echo "style='color: orange';";
                                                                        }
                                                                        ?>>

                                            <?= $anuncio['status_anuncio'] ?>
                                        </div>
                                        <button class='btn btn-editar' onclick="editar(<?= $anuncio['id_anuncio'] ?>)">Editar</button>
                                        <button class='btn btn-excluir' onclick="excluir(<?= $anuncio['id_anuncio'] ?>)">Excluir</button>

                                    </div>
                                </div>
                            <?php

                            }
                        } else {
                            echo "<p class='gallery-description' style='color:red;'>Você não tem anúncios</p>";
                            ?>
                            <div class="button-container">
                                <a href="anuncio.php" class="recommend-btn">
                                    <i class="fa-solid fa-tag"></i> ANUNCIAR
                                </a>
                            </div>
                        <?php

                        }
                        ?>

                    </div>
                </section>
                <!-- <table>
  <thead>
    <tr>
      <th>Anúncio</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php

    // if(mysqli_num_rows($consulta) == 0){
    //     echo "<tr><td colspan='2'>Nenhum anúncio encontrado.</td></tr>";
    // }
    //     while($linha = mysqli_fetch_assoc($consulta)){
    //         echo "<tr>";
    //         echo "<td data-label='Anúncio'>{$linha['titulo']}</td>";
    //         echo "<td data-label='Ações'>";
    //         echo "<button class='btn btn-editar' onclick='editar({$linha['id']})'>Editar</button>";
    //         echo "<button class='btn btn-excluir' onclick='excluir({$linha['id']})'>Excluir</button>";
    //         echo "</td>";
    //         echo "</tr>";
    //     }
    ?>
  
   
  </tbody>
</table> -->



            </section>
        </div>
    </main>
    <?php
    require('partes/footer.php');
    ?>
</body>

</html>