<?php
    session_start();

    include 'connection.php';
    include 'GoogleAuthenticator\PHPGangsta\GoogleAuthenticator.php';

    $pga = new PHPGangsta_GoogleAuthenticator();
    $secret = $_SESSION['secret'];
    $qr_code = $pga->getQRCodeGoogleUrl("Integrasi Sistem", $secret);
    $error_message = '';

    if (isset($_POST['btnValidate'])) {
        $code = $_POST['code'];

        if ($code == '') {
            $error_message = 'Scan QR code untuk konfigurasi aplikasi ini';
        }else{
            if ($pga->verifyCode($secret, $code, 2)) {
                echo '<script>window.location="home.php"</script>';
            }else{
                $error_message = 'Authentikasi tidak tersedia';
            }
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>INTEGRASI SISTEM - AUTH</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="container-fluid h-100">
            <div class="row align-item-center h-100">
                <div class="col-md-6 mx-auto">
                <h4>Authentikasi</h4>
                <p>
                    Silahkan download Google Authentication di Google Play Store dan scan QR Code ini!
                </p>
                <p>Atau <a href="index.php" class="text-danger">Kembali</a> ke halaman awal</p>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group text-center">
                                <img src="<?php echo $qr_code; ?>" alt="">
                            </div>
                            <form action="authenticator.php" method="post">
                                <?php
                                    if ($error_message != '') {
                                        echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Error </strong>'.$error_message.' 
                                                </div>
                                                
                                                <script>
                                                $(".alert").alert();
                                                </script>';
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="code-id">Masukan Auth code</label>
                                    <input id="code-id" class="form-control" type="text" placeholder="6 Digit kode" name="code">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btnValidate" class="btn btn-primary" value="Validasi">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>