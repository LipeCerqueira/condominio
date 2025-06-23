<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Como Instalar um APK no Android</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/paginaInicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/infoUteis.css">
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <?php

    require "partes/header.php"

    ?>

    <div class="max-w-md mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">Como Instalar o APP</h1>
        <h2 class="text-center">Válido apenas para Android</h2>


        <div class="button-container">
            <a href="../controller/baixar.php" class="recommend-btn">
                <i class="fa-solid fa-download"></i> Instalar
            </a>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">1. Clique no botão</h2>
            <p></p>
            <p class="mt-2">Toque no botão de download. O arquivo APK começará a ser baixado.</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">2. Instalar fontes desconhecidas</h2>
            <p>Durante a instalação, o Android pode bloquear o APK por segurança.</p>
            <p class="mt-2">Nesse caso, será exibido um aviso. Toque em <strong>"Configurações"</strong> e habilite a opção <strong>"Permitir desta fonte"</strong>.</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">3. Instale o APK</h2>
            <p>Depois que o download terminar, toque no arquivo APK (geralmente na notificação ou na pasta "Downloads").</p>
            <p class="mt-2">O Android mostrará uma tela pedindo confirmação. Toque em <strong>"Instalar"</strong>.</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">4. Concluído!</h2>
            <p>Após a instalação, você pode tocar em <strong>"Abrir"</strong> para iniciar o app ou encontrá-lo no menu do seu celular.</p>
        </div>


    </div>

    <?php

    require "partes/footer.php";

    ?>

</body>

</html>