<?php
session_start();

include 'connection.php';
require_once 'GoogleAuthenticator/PHPGangsta/GoogleAuthenticator.php';
$pga = new PHPGangsta_GoogleAuthenticator();

$secret = $_SESSION['secret'];

$qr_code =  $pga->getQRCodeGoogleUrl("Integrasi Sistem", $secret);

$error_message = '';

if (isset($_POST['btnValidate'])) {

    $code = $_POST['code'];

    if ($code == "") {
        $error_message = 'Please Input Authentication Code!';
    }
    else
    {
        if($pga->verifyCode($secret, $code, 2))
        {
        		$_SESSION['secret'] = $secret;
            echo '<script>window.location="home.php?page=home";</script>';
        }
        else
        {
            $error_message = 'Invalid Authentication Code!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm User Device</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h4>Application Authentication</h4>
        <p>
            Please download and install Google authenticate app on your phone, and scan following QR code to configure your device.
        </p>

        <div class="card">
        	<div class="card-body">
		        
		        <form method="post" action="authenticator-login.php">
		            <?php
		            if ($error_message != "") {
		                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $error_message . '</div>';
		            }
		            ?>
		            <div class="form-group">
		                <label for="code">Enter Authentication Code:</label>
		                <input type="text" name="code" placeholder="6 Digit Code" class="form-control">
		            </div>
		            <div class="form-group">
		                <button type="submit" name="btnValidate" class="btn btn-primary">Validate</button>
		            </div>
		        </form>
		      </div>
		    </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>