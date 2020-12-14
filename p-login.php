<?php
    /* session_start();
    include 'connection.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (isset($_POST['btnSubmit'])) {
        if ($username == '' || $password == '') {
            $login_error_message = 'Form login tidak boleh kosong';
            echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Error </strong>'.$login_error_message.' 
                    </div>
                    
                    <script>
                    window.location("login.php");
                    $(".alert").alert();
                    </script>';
        }
            $statment = $conn->prepare("SELECT * FROM users WHERE username=? OR email=? AND password=?");
            $statment->execute([$username,$username,$password]);

            while ($hasil = $statment->fetch()) {
                if (!$hasil) {
                    $login_error_message = 'Terjadi Kesalahan/Akun tidak tersedia';
                    echo '<script>window.location="login.php?msg='.$login_error_message.'"</script>';
                }else{
                    $s_username = $hasil['username'];
                    $s_email = $hasil['email'];
                    $s_secret = $hasil['google_secret_code'];

                    $_SESSION['user'] = $s_username;
                    $_SESSION['email'] = $s_email;
                    $_SESSION['secret'] = $s_secret;

                    echo '<script>window.location="authenticator.php"</script>';
                } 

            }

            if ($hasil = 1) {
                echo '<script>window.location="authenticator.php"</script>';
                $s_username = $hasil['username'];
                $s_email = $hasil['email'];
                $s_secret = $hasil['google_secret_code'];

                $_SESSION['user'] = $s_username;
                $_SESSION['email'] = $s_email;
                $_SESSION['secret'] = $s_secret;
            }else {
                $login_error_message = 'Terjadi Kesalahan/Akun tidak tersedia';
                echo '<script>window.location="login.php?msg='.$login_error_message.'"</script>';
            }
        } */
?>
<!-- <!DOCTYPE html> -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<!-- <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body> -->
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
<!--         <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
 -->
<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$statement = $conn->prepare("SELECT google_secret_code FROM users WHERE username=? AND password = ?");
$hasil = $statement->execute(array($username,$password));
if($hasil>0){
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    //$_SESSION['user'] = $username;
	$_SESSION['secret'] = $data[0]['google_secret_code'];
	echo '<script>window.location="authenticator-login.php";</script>';
}else{
	echo '<script>window.location="login.php";</script>';
}
?>