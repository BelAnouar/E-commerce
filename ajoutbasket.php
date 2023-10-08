<?php
require_once 'db/conn.php'; 
if (isset($_POST['action'])) {


 

  
    $img_cart=$_POST["img_cart"];
    $marque=$_POST["marque"];
    $price=$_POST["Tprice"];
    $qt=$_POST["qtproduct"];
  
    $cart->insertcart($img_cart, $marque,$price,$qt);
  
  
  
  }else{
    require_once "includes/errormessage.php";
  }
  
?>