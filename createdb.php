<?php 
$dsn = 'mysql:host=localhost;';
$user = 'root';
$password = 'akram123';

try{
    $pdo = new PDO($dsn, $user, $password);
    $sql = $pdo->prepare("CREATE DATABASE IF NOT EXISTS Hackathon ;")->execute();
    $sql = $pdo->prepare("USE Hackathon ;")->execute();
    $sql = $pdo->prepare("CREATE TABLE IF NOT EXISTS users (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        password varchar(100) NOT NULL
        ) ")->execute();
    // echo 'create done !';
}catch(PDOException $e){
    echo 'error' . $e->getMessage();
}

?>
