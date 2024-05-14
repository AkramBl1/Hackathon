<?php 
include 'createdb.php';
$dsn = 'mysql:host=localhost;dbname=Hackathon';
$user = 'root';
$password = 'akram123';

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::FETCH_DEFAULT, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, PDO::ATTR_EMULATE_PREPARES);
    // echo 'CONNECT done !';
}catch(PDOException $e){
    echo 'error' . $e->getMessage();
}
?>
