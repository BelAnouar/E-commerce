<?php

require_once 'includes/header.php';
require_once 'db/conn.php'; 





if(isset($_POST["send"])){
  $message=$_POST["message"];
  $time=date("h:i:sa");
  $page = $_GET['id'];
  $send=$comment->insertmessage($page,$message,$time);
}

if(!isset($_GET['id'])){
  include 'includes/errormessage.php';
  
} else{
  $id = $_GET['id'];
  $r = $product->getproductDetails($id);
  $gcomment=$comment->getcommentpage($id)


 ?>

<section id="shop"class=" container">
  <div class="row m-5">
    <div class="col-lg-5 col-md-12">

      <img src="<?php echo $r['img_product'] ?>" class="w-100 img-fluid name_img" alt="">

    </div>
    <div class="col-lg-6 col-md-12">
      <h4 class="marque"><?php echo $r['marque'] ?></h4>
      <h3 class="py-2"><?php echo $r['name_type'] ?></h3>
      <h2  class="total1">
      <input type="hidden" class="pr1"  value="<?php echo $r['price']?>"><?php echo $r['price'] ?>£</h2>
      <input type="number" class="qt1"name="quantity" min="1" value="1">
      
      <button type="submit" class="btn btn-dark add-basket" name="button">
        
        Add to cart</button> <span class="erorr"></span>
      <h4>Details</h4>
      <span><?php echo $r['description'] ?></span>
    </div>

    

  </div>


  <div class="tech-product m-5">



    <div class="row tab-product">
      <!--start row tab-product-->

      <div class="col-sm-6 ">
        <div class="product-title">
        <i class="fa-solid fa-microchip"></i> <strong>Processor</strong>
          <div class="product-content"><?php echo $r['processor'] ?></div>
        </div>
      </div>


      <div class="col-sm-6">
        <div class="product-title">
        <i class="fa-brands fa-redhat"></i> <strong>Operating System</strong>
          <div class="product-content"><?php echo $r['operating_System'] ?></div>
        </div>
      </div>


      <!--end row tab-product-->
    </div>
    <div class="row tab-product">
      <!--start row tab-product-->
      <div class="col-sm-6">
            <div class="product-title">
            <i class="fa-solid fa-bars-progress"></i>
          <strong>Graphics Card</strong>
          <div class="product-content"><?php echo $r['Graphics_Card'] ?></div>
        </div>
      </div>


      <div class="col-sm-6">
        <div class="product-title">
        <i class="fa-solid fa-display"></i> <strong>Display</strong>
          <div class="product-content"><?php echo $r['Display'] ?></div>
        </div>
      </div>


      <!--end row tab-product-->
    </div>
    <div class="row tab-product">
      <!--start row tab-product-->
      <div class="col-sm-6">
        <div class="product-title">
        <i class="fa-solid fa-hard-drive"></i> 
        <strong>Hard Drive</strong>
          <div class="product-content"><?php echo $r['Hard_Drive'] ?></div>
        </div>
      </div>


      <div class="col-sm-6">
        <div class="product-title">
        <i class="fa-solid fa-memory"></i> <strong>Memory</strong>
          <div class="product-content"><?php echo $r['memory'] ?></div>
        </div>
      </div>


      <!--end row tab-product-->
    </div>
    <div class="row tab-product">
      <!--start row tab-product-->
      <div class="col-sm-6">
        <div class="product-title">
        <i class="fa-solid fa-battery-empty"></i> <strong>Primary Battery</strong>
          <div class="product-content"><?php echo $r['primary_Battery'] ?></div>
        </div>
      </div>


      <div class="col-sm-6">
        <div class="product-title">
        <i class="fa-brands fa-nfc-directional"></i>
        <strong>Wireless</strong>
          <div class="product-content"><?php echo $r['wireless'] ?></div>
        </div>
      </div>


      <!--end row tab-product-->
    </div>






  </div>

</section>
<?php }?>




<section id="Features" >


      <h3 class="ml-4 ">Features</h3>
      <div class="d-flex">



     <div class="col-lg-4 col-md-4 col-12">
       <a class="nav-item" href="shopping.php">
         <img src="../images/IMAC.png" class="w-50 img-bureau" alt="">
         </a>
         <h6 class="mt-2 text-secondary" >MAC</h6>
         <small >ordinateur Bureau</small>

       <h6 class="ml-0">12,999 <span class="btn btn-secondary btn-sm btn-card  ">Add card</span></h6>
     </div>

     <div class="col-lg-4 col-md-4 col-12">
       <a class="nav-item" href="shopping.php">
         <img src="../images/kindpng_3572956.png" class="w-50 img-bureau" alt="">
         </a>
         <h6 class="mt-2 text-secondary" >Del</h6>
         <small >ordinateur Bureau</small>

       <h6 class="ml-0">12,999 <span class="btn btn-secondary btn-sm btn-card  ">Add card</span></h6>
     </div>

     <div class="col-lg-4 col-md-4 col-12">
       <a class="nav-item" href="shopping.php">
         <img src="../images/h.png" class="w-50 img-bureau" alt="">
         </a>
         <h6 class="mt-2 text-secondary" >Hwai</h6>
         <small >ordinateur Bureau</small>

       <h6 class="ml-0">12,999 <span class="btn btn-secondary btn-sm btn-card  ">Add card</span></h6>
     </div>


</div>

</section>
<div class="container">
<div class="row ">
    <div class="col-md-8 col-sm-12">
        <div class="">
            <div class="">
                <h3 class="">
                    Comment panel
</h3>
                <form action="" method="post" class="">
         

                    <textarea class="form-control w-100" name="message" placeholder="write a comment..." cols="30" rows="10"></textarea>
                    <br>
                    <button type="submit" class="btn btn-info pull-right">
                      <input type="hidden" name="send"> Post</button>
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list"><?php while ($resuls = $gcomment->fetch(PDO::FETCH_ASSOC))  {
                            # code...
                          ?>
                        <li class="media mt-3">
                          
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="rounded-circle mr-2">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?php echo $resuls["date"] ?></small>
                                </span>
                                <?php if(isset($_SESSION['username'])){ ?>
                                <strong class="text-success"><?php echo $_SESSION['username']?></strong>
                                <?php }else{?>
                                  <strong class="text-success">@User::root</strong>
                               <?php } ?>
                                <p>
                                    <?php echo $resuls["comment"]?>
                                </p>
                            </div>
                            
                        </li>
                        <?php } ?>
                        
                    </ul>
</form>
            </div>
        </div>

    </div>
</div>
</div>


<p class="ana"></p>
<?php

 require_once 'includes/footer.php';


  ?>
<script>
  // $(".qt1").change(function(){
  //  document.querySelector(".total1").innerHTML= $(".qt1").val()*$("pr1").val()
  // })

  const pr = document.querySelector(".pr1");
const quantite =document.querySelector(".qt1") ;
const total1 =document.querySelector(".total1");


  $(".qt1").change(function(){
      
      
      
        total1.innerHTML=(pr.value)*(quantite.value)
        

      
     
     
  })


  $(".add-basket").click(function(){

    add_data();


    

function add_data()
{
   
    var action = 'add';
 
    var img_cart=$(".name_img").attr("src");
    var marque=$(".marque").text();
    var Tprice=pr.value;
    var qtproduct=quantite.value;
   
    $.ajax({
        url:"ajoutbasket.php",
        method:"POST",
        data:{action:action, img_cart:img_cart,marque:marque, Tprice:Tprice,qtproduct:qtproduct},
        success:function(data){
            $(".erorr").text(data);
            window.location.reload() ;
        }
    });
}



  })
  
</script>