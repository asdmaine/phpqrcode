<?php
include ('src/qrlib.php');

// fungsi buat random string
function generateRandomString($length = 20)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// Buat random string
$randomString = generateRandomString(10);

// Atur direktori dimana mau disimpan
$Direktori = 'img/';

// Masukkan random string
$codeContents =  $randomString;

// Buat Filename
$fileName = $randomString. '.png';

$pngAbsoluteFilePath = $Direktori . $fileName;
$urlRelativeFilePath = $Direktori . $fileName;

// generating
if (!file_exists($pngAbsoluteFilePath)) {
    QRcode::png($codeContents, $pngAbsoluteFilePath);
    echo 'File generated!';
    echo '<hr />';
} else {
    echo 'File already generated! We can use this cached file to speed up site on common codes!';
    echo '<hr />';
}


// UBAH PNG JADI BENTUK TEXT BASE64
$base64Image = base64_encode(file_get_contents($pngAbsoluteFilePath));


echo 'Server PNG File: ' . $pngAbsoluteFilePath;
echo '<hr />';
// echo berdasarkan direktori
echo '<img src="' . $urlRelativeFilePath . '" />'.'relative path : '.$urlRelativeFilePath.'</br>from : direktori <hr/></br>';
// echo berdasarkan base64
echo '<img src="data:image/png;base64,' . $base64Image . '" />' . '</br>from : base64<hr/></br>';

?>


