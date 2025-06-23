<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Semanal - Portal Villa Dom Pedro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="../css/boletim.css">
</head>
<body>
    <?php 
   
    require('partes/header.php');
   ?>

    <main>
        <div class="bulletin-container">
            <div class="page-header">
                <h1>Boletim Semanal</h1>
                <p>Acompanhe os comunicados e informações semanais do Loteamento Villa Dom Pedro com resumos das principais atividades e avisos importantes.</p>
            </div>

            <div class="bulletins-grid">
                <div class="bulletin-card">
                    <!-- <div class="status-badge">Atual</div> -->
                    <div class="bulletin-period">Semana de 16 a 22 de Dezembro de 2024</div>
                    <div class="bulletin-header">
                        <h3 class="bulletin-title">Boletim Semanal - Preparativos para o Natal</h3>
                        <div class="bulletin-datetime">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Publicado em: 16/12/2024 às 08:00</span>
                        </div>
                    </div>
                    <p class="bulletin-description">
                        Esta semana destacamos os preparativos para as festividades natalinas, incluindo decoração das áreas comuns, horários especiais da portaria durante os feriados, e informações sobre o evento de confraternização dos moradores no salão de festas.
                    </p>
                    <div class="bulletin-meta">
                        <div class="last-update">
                            <i class="fa-solid fa-clock"></i>
                            <span>Atualizado em: 16/12/2024 às 14:30</span>
                        </div>
                        <!-- <a href="#" class="view-bulletin-btn">
                            <i class="fa-solid fa-eye"></i>
                            Ver Completo
                        </a> -->
                    </div>
                </div>


           
            

              
            </div>
        </div>
    </main>

   <?php 
   
    require('partes/footer.php');
   ?>
</body>
</html>
