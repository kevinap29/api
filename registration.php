<?php
    session_start();

    include 'connection.php';
    include 'GoogleAuthenticator\PHPGangsta\GoogleAuthenticator.php';

    $pga = new PHPGangsta_GoogleAuthenticator();
    $secret = $pga->createSecret();

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $statment = $conn->prepare("INSERT INTO users (name,username,email,password,google_secret_code) VALUES (?,?,?,?,?)");
    $hasil = $statment->execute(array($name,$username,$email,$password,$secret));

    if ($hasil > 0) {
        echo '<script>window.location="authenticator.php"</script>';
        $_SESSION['user'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['secret'] = $secret;
    } else {
        $register_error_message = 'Terjadi Kesalahan';
        echo '<script>window.location="index.php?msg='.$register_error_message.'"</script>';
    }
    

?>