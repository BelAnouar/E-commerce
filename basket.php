<?php

require_once 'db/conn.php';

$res=$cart->getcart();
$Sumprice=$cart->getSumcart();
$rows=$res->rowCount();
require_once "includes/header.php";


  if( isset($_SESSION['username'])){
  if (isset($_POST["addClient"])) {
  $fname=$_POST["fname"];
  $email=$_POST["email"];
  $adr=$_POST["adr"];
  $city=$_POST["city"];
  $state=$_POST["state"];
  $zip=$_POST["zip"];
  $name_card=$_POST["ncard"];
  $Cnumber=$_POST["cnumber"];
  $month=$_POST["month"];
  $year=$_POST["year"];
  $isSuccess=$client->insertclient($fname, $email,$adr, $city, $state,$zip,$name_card,$Cnumber,$month,$year);


  if ($isSuccess) {
    echo "hh";
  }else{
    echo "jdkj";
  }
}}  else{
   echo "<script> window.location.href='singn.php'</script>";
  
}


if (isset($_GET["del_card"])) {
 $del=$_GET["del_card"];
    $delete=$cart->deletecart($del);

    if ($rows=0) {
      header("location:index.php");
    }
   
}


?>



<section id="Item-basket">
  <main class ='container'>
    
    <h1>Basket <span class="mr-3 item-span">(<?php echo $rows ?>item)</span></h1>
    <div class="row">
      <div class="col-lg-9">
      <table class='table'>
        <thead>
        <tr>
            <th colspan="2">Item</th>
            <th>price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
       
            <?php

               while ($r = $res->fetch(PDO::FETCH_ASSOC)) {?>
               <tr>
                <td class="img"><img class="image" src="<?php echo $r["img_card"]?>"width="60" height="60" alt=""></td>
                 <td>
                        <p > <input class="marque" value="<?=$r['marque']?>" type="hidden"> <?php echo $r['marque']?></p>
                        <br>
                        
                        <a href="basket.php?del_card=<?= $r["id_card"] ?>" name="RV" class="remove">
                           
                           Remove
                        
                         </a> 
                    </td>
                    <td class="price">&euro; <?php echo $r['price']?> <input type="hidden" class="pr"  value="<?php echo $r['price']?>"></td>
                    <td class="quantity">
                        <input type="number" class="qt"name="quantity"min="1" value="<?php echo $r['quantite']?>"  placeholder="Quantity" required>
                    </td>
                    <td class="ToL"> <span class="total"><?php echo $r['price'];?></span> <span>&euro;</span></td>
                </tr>
            <?php }
            ?>
           
           
        </tbody>
      </table>
      
    </div>
      <div class="col-lg-3">
       <div class="border bg-light rounded p-3">
        <h3 class="text-center mb-3">Shipping cart</h3>
           
       <div class="d-flex justify-content-between">
         

       <h5 class="">item(<?php echo $rows ?>) </h4>
       <span class ="summ" name="summ" ><?php echo $Sumprice["tprice"];?>£</span>
               </div>
       <div class="d-flex justify-content-between">
         
         <h4 >Total:</h4>
         <h3 class="Gtotal" name ="gtotal"><?php echo $Sumprice["tprice"];?>£</h3>
         </div>
         
         <BUtton class="btn btn-success btn-md btn-block btn-card  buy">
           Buy</BUtton>
       </div>
       </div>
   
    </div>
  </div>
    </main>
</section>

<p id="results">p</p>

<!--Foooter--><?php require_once "includes/footer.php";?>

<!-- moduls Hidden -->

<div class="modals hidden">

<h2 class="modal__header">
  Open your bank account
</h2>
<div class="d-flex">
  <form class=".modal__form" action="" method="post">

    <div class="row">

      <div class="col">

        <h3 class="title">billing address</h3>

        <div class="inputBox">
          <label>full name :</label>
          <input name="fname" class="fname" type="text" placeholder="full name">
        </div>
        <div class="inputBox">
          <label>email :</label>
          <input type="email" class="email"  name="email" placeholder="example@example.com">
        </div>
        <div class="inputBox">
          <label>address :</label>
          <input type="text" class="adr" name="adr" placeholder="room - street - locality">
        </div>
        <div class="inputBox">
          <label>city :</label>
          <input type="text" class="city" name="city" placeholder="city">
        </div>

        <div class="flex">
          <div class="inputBox">
            <label>state :</label>
            <input type="text" class="state" name="state" placeholder="state">
          </div>
          <div class="inputBox">
            <label>zip code :</label>
            <input type="text" class="zip" name="zip" placeholder="Code Zip">
          </div>
        </div>

      </div>

      <div class="col">

        <h3 class="title">payment</h3>

        <div class="inputBox">
          <label>cards accepted :</label>
          <img src="../images/card_img.png" alt="">
        </div>
        <div class="inputBox">
          <label>name on card :</label>
          <input type="text" class="ncard" name="ncard" placeholder="credit card">
        </div>
        <div class="inputBox">
          <label>credit card number :</label>
          <input type="number" class="cnumber" name="cnumber" placeholder="1111-2222-3333-4444">
        </div>
        <div class="inputBox">
          <label>exp month :</label>
          <input type="text" class="" name="month" placeholder="Month">
        </div>

        <div class="flex">
          <div class="inputBox">
            <label>exp year :</label>
            <input type="number" name="year" placeholder="years">
          </div>

        </div>

      </div>

    </div>


      <input type="submit"class="submit-btn btn btn-success" value="proceed to checkout" name="addClient">
      

  </form>

</div>

</div>
<div class="overlay hidden"></div>







<script src="js/product.js"></script>







<!--    
<script>
  
   $(".buy").click(function()
   {
    $(".image").each(function(){
    var img=($('.image').attr('src'));
     
    var mar=$('.marque').val();
    console.log(mar);
    var qt=($('.qt').val());
     console.log(qt);
  
    var total=($('.total').text());
    console.log(total);
 
  $.post("credit-card.php", { img: img, mar: mar, qt: qt, total: total },
    function(data) {
      
	      $('#results').html(data);})
	
   })
  });


  
  


</script>

 -->

   
