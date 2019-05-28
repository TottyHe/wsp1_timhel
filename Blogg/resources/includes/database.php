<?php
$host = 'localhost';
$dbname = 'blogg';
$user = 'admin';
$password = 'Hamburgare343';


$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);


$dsn = "mysql:host=$host;dbname=$dbname,charset=utf8mb4";

$pdo = new PDO($dsn,$user,$password,$attr);





?>
