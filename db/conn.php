<?php
$host="localhost";
$db="e-commerce|ordishop";
$user="root";
$pass='';


$dsn = "mysql:host=$host;dbname=$db";
try {
  $pdo =new PDO($dsn,$user,$pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  throw new PDOException($e->getMessage());
}
require_once 'product.php';
$product = new product($pdo);
require_once 'user.php' ;
$user= new user($pdo);
require_once 'cart.php' ;
$cart= new cart($pdo);
require_once "client.php";
$client=new client($pdo);
require_once 'comment.php';
$comment =new comment($pdo);


?>
