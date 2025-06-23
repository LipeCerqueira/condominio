<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
	<link rel="stylesheet" href="../css/paginaInicial.css">   
	<link rel="stylesheet" href="../css/detalheClassificados.css" >
 
	
	
	<script>
    function redirecionarParaWhatsApp(link) {
      window.open(link, '_blank');
    }
  </script>
</head>

<body>



<?php 
    require('partes/header.php');
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
    $consulta = mysqli_query($con, "SELECT c.*, u.*, DATE_FORMAT(c.dataAnuncio, '%d/%m/%Y - %H:%i') AS data_formatada  FROM classificados c
                                INNER JOIN usuario U on c.id_usuario = u.id
                                where c.tipo = '$tipo' AND c.status = 'Aprovado'
                                order by c.id desc
    
    ");

    ?>

    <section id="imoveis" style="margin-top: 50px;">
        <h2 class="section-title"><?= $nome ?></h2>

        <div class="classified-grid">
            <!-- Classified Ad Card 1 -->
            <?php
            while ($anuncio = mysqli_fetch_assoc($consulta)) {
                $telefoneBruto = $anuncio['telefone'];
                $numeroLimpo = preg_replace('/\D/', '', $telefoneBruto);
                $mensagem = "Olá! Vi seu anúncio através do Portal Villa Dom Pedro e gostaria de saber mais.";
                $mensagemCodificada = urlencode($mensagem);
                $linkWhatsapp = "https://wa.me/55" . $numeroLimpo . "?text=" . $mensagemCodificada;
            ?>
                <div class="classified-card card-container"  <?php
                @session_start();
                
                if (isset($_SESSION["logado"])): ?>
              onclick="redirecionarParaWhatsApp('<?= $linkWhatsapp ?>')"
              style="cursor: pointer;"
              <?php endif; ?>>

                    <img src="<?=$anuncio['imagem']?>" alt="Apartamento à venda" class="classified-image">
                    <div class="classified-content">
                        <h3 class="classified-title"><?= strtoupper($anuncio['titulo'])?></h3>
                        <div class="classified-price">
                            <?php 
                            
                            @session_start();
                                 if(isset($_SESSION["logado"])){
                                    echo $anuncio['valor'];
                                }else{
                                  echo "R$ XXXX,XX"; 
                                }
                            
                            ?>
                        </div>
                        <p class="classified-description"><?=$anuncio['descricao']?></p>
                        <div class="classified-contact">
                            <?php 
                            @session_start();
                            if(isset($_SESSION["logado"])){
                                echo $anuncio['telefone'];
                            }else{
                              echo formatarTelefone($anuncio['telefone']); 
                            }
                            
                            ?>
                         
                        </div>
                        <p class="professional-contact">Anunciado por: <?= $anuncio['nome'] ?></p>
                        <div class="classified-date">Publicado em:  <?=$anuncio['data_formatada']?></div>
                    </div>
                </div>
            <?php

            }
            ?>

        </div>
    </section>
    
<?php 
    require('partes/footer.php')

?>
</body>

</html>