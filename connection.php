<?php
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','integrasi_sistem');

try{
    $conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE,USER,PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " .$e->getMessage();
}
?>