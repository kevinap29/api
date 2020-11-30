<?php

require_once 'PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();

$qrCodeUrl = $ga->getQRCodeGoogleUrl('Belajar Google Authenticator - Kevin', $secret);

echo "<img src='$qrCodeUrl'>";

?>

