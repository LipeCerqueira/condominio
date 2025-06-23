<?php
$arquivo = '../portal_villa_dom_pedro.apk';
$destino = "../view/app.php";

if (file_exists($arquivo)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.android.package-archive');
    header('Content-Disposition: attachment; filename="' . basename($arquivo) . '"');
    header('Content-Length: ' . filesize($arquivo));
    readfile($arquivo);

    header("location:$destino");
    exit;
} else {
    echo "Arquivo não encontrado.";
}
?>
