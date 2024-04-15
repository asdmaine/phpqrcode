<?php
include ('src/qrlib.php');

// Atur teks kode QR
$codeText = 'Hello, World!';

// Mulai output buffering
ob_start();

// Menghasilkan gambar QR langsung ke output sebagai aliran PNG
QRcode::png($codeText, null);

// Menangkap output yang dihasilkan
$imageData = ob_get_clean();

// Mengonversi gambar PNG ke dalam format base64
$base64Image = base64_encode($imageData);

// Menampilkan gambar QR dalam bentuk teks base64
echo $base64Image;
echo '<br><img src="data:image/png;base64,' . $base64Image . '" />';
?>
