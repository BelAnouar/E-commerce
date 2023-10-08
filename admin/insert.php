<?php
$title="PRODUCT PAGE";



require_once '../db/conn.php';
if(isset($_POST['submit'])){

  // ADDPRODUCT
  $marque=$_POST["marque"];
  $price=$_POST["price"];
  $description=$_POST["description"];
  $type=$_POST["type"];
  // ADD OPTION PRODUCT

  $processor=$_POST['process'];
  $OpSystem=$_POST['OpSystem'];
  $Gcard=$_POST['Gcard'];
  $Display=$_POST['Display'];
  $HDrive=$_POST['HDrive'];
  $Memory=$_POST['Memory'];
  $PBattery=$_POST['PBattery'];
  $Wireless=$_POST['Wireless'];
  

  $RAM= $_POST['ram'];
  $Ssize=$_POST['Ssize'];
  $Stype=$_POST["Stype"];
  $Pplatform=$_POST["Pplatform"];

  // $orig_file = $_FILES["img"]["tmp_name"];
  // $filename = $_FILES["img"]["name"];
  // $target_dir = '../images/';
  // $img_product = "$target_dir.$filename";
  // move_uploaded_file($orig_file,$img_product);
  $orig_file = $_FILES["img"]["tmp_name"];
  $ext = $_FILES["img"]["name"];
  $target_dir = '../images/';
  $destination = "$target_dir.$ext";
  move_uploaded_file($orig_file,$destination);



  

  $isSuccess=$product-> insertProduct($destination, $marque, $description, $price,$type,$processor,$OpSystem,$Gcard,$Display,$HDrive,$Memory,$PBattery,$Wireless,$RAM,$Ssize,$Stype,$Pplatform);
  
   if ($isSuccess) {?>
     <a href="index.php"> retun</a>
  <?php }
 
}?>



