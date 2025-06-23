
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos - Portal Villa Dom Pedro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="../css//documentos.css">
</head>
<body>
   <?php 
   
    require('partes/header.php');
   ?>

    <main>
        <div class="documents-container">
            <div class="page-header">
                <h1>Documentos do Loteamento</h1>
                <p>Acesse e baixe os documentos importantes do nosso loteamento, incluindo regulamentos, atas, relatórios e comunicados oficiais.</p>
            </div>

            <div class="category-section">
             
                <div class="documents-grid">
                    <div class="document-card">
                        <div class="document-icon">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>
                        <h3 class="document-title">Regimento Interno do Condomínio</h3>
                        <p class="document-description">Documento oficial com todas as regras e normas de convivência do condomínio Villa Dom Pedro.</p>
                        <div class="document-meta">
                            <div class="meta-item">
                                <i class="fa-solid fa-calendar"></i>
                                <span>Publicado em: 15/01/2024</span>
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-clock"></i>
                                <span>Última atualização: 20/11/2024</span>
                            </div>
                        </div>
                        <a href="#" class="download-btn">
                            <i class="fa-solid fa-download"></i>
                            Baixar Documento
                        </a>
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