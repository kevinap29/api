<?php
    /* //membuat curl resource
    $ch = curl_init();

    //mengeset url
    curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users?page=2");

    //mengembalikan transeran menjadi string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //$output berisikan string untuk output
    $output = curl_exec($ch);

    //tutup curl resource untuk membersihkan resources sistem
    curl_close($ch);

    echo json_encode($output); */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>INTEGRASI SISTEM</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img\favicon\favicon.ico" type="image/x-icon">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="container-fluid h-100">
            <div class="row align-item-center h-100">
                <div class="col-md-6 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-center text-white">
                            <h4>Registrasi</h4>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_GET['msg'])) {
                                    $register_error_message = $_GET['msg'];
                                }else {
                                    $register_error_message = '';
                                }
                                if ($register_error_message != "") {
                                    echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>Error </strong>'.$register_error_message.' 
                                            </div>
                                            
                                            <script>
                                            $(".alert").alert();
                                            </script>';
                                }
                            ?>
                            <form action="registration.php" method="post">
                                <div class="form-group">
                                    <label for="name-id">Nama</label>
                                    <input id="name-id" class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email-id">Email</label>
                                    <input id="email-id" class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="username-id">Username</label>
                                    <input id="username-id" class="form-control" type="text" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password-id">Password</label>
                                    <input id="password-id" class="form-control" type="password" name="password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btnRegister" class="btn btn-primary" value="Register">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                Klik <a href="login.php">Login</a> jika anda sudah terdaftar
                            </div>
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