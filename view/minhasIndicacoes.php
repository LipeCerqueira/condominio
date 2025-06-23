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
            window.location.href = '../view/editarIndicacao.php?id=' + id;
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
                    window.location.href = '../Controller/excluirIndicacao.act.php?id=' + id;
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
                <h2 class="section-title">Minhas indicações</h2>
                
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
                $nome = mysqli_real_escape_string($con, $_SESSION['nome']);
$consulta = mysqli_query($con, "
    SELECT profissional.*, profissao.*, 
           DATE_FORMAT(profissional.horaIndicacao, '%d/%m/%Y') AS data_formatada 
    FROM profissional
    INNER JOIN profissao ON profissional.idProfissao = profissao.idProfissao
    WHERE 
      profissional.status = 1 
      AND profissional.indicacao LIKE '%$nome%'
      ORDER BY profissional.id DESC
");
                ?>

                <section id="imoveis" style="margin-top: 50px;">


                    <div class="classified-grid">
                        <!-- Classified Ad Card 1 -->
                        <?php
                        if($consulta->num_rows>0){

                        
                        while ($indicacao = mysqli_fetch_assoc($consulta)) {

                        ?>
                            <div class="classified-card card-container">

                               
                                <div class="classified-content">
                                    <h3 class="classified-title"><?= strtoupper($indicacao['nome']) ?> (<?= ($indicacao['nomeProfissao']) ?>) </h3>
                                    <h3 class="classified-title"></h3>
                                    <div class="classified-price">
                                        <?php

                                       
                                       
                                            echo $indicacao['telefone'];
                                        

                                        ?>
                                    </div>
                                     <p class="classified-description"> Indicado em: <?= $indicacao['data_formatada'] ?></p>
                                  
                                    
                                    <button class='btn btn-editar' onclick="editar(<?= $indicacao['id'] ?>)">Editar</button>
                                    <button class='btn btn-excluir' onclick="excluir(<?= $indicacao['id'] ?>)">Excluir</button>

                                </div>
                            </div>
                        <?php

                        }
                        }else{
                             echo "<p class='gallery-description' style='color:red;'>Você ainda não realizou nenhuma indicação</p>";
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