<?php
require_once 'db/conn.php';
require_once "includes/header.php";


$results=$product->getBureaux();
if (isset($_POST['add'])) {


  $Get_product=$_POST["product_id"];

  $res = $product->getproductDetails($Get_product);
  $img_cart=$res["img_product"];
  $marque=$res["marque"];
  $price=$res["price"];
  $qt=1;

 $cart->insertcart($img_cart, $marque,$price,$qt);



}
?>
 
 
 <!-- Images-PC -->

 <div class="image-pc ">

<div class="col-md-4">
  <h2>"Laptop Of The Future"</h2>
  <p>Turbocharge creativity with the most powerful 13-inch XPS laptop ever.</p>
  <span class="font-weight-light ">Show The Videos</span> <button type="button" class="btn btn-outline-light btn-lg ml-4 Show " name="button">
    <a href="#"></a> Show</button>
</div>

</div>
<main class="Body_page">







  
  <div class=" row ">
    <div class="col-md-3 mt-3">


      <!-- /filtter -->
      <div class="card card-filter bg-light">
        <h4 class=" mb-1">Filtter</h4>

      </div>

      <!-- RAM -->
      <div class="card card-filter bg-light">
        <p class="color-title mb-1">Memory (RAM)</p>
        <div class=" custom-checkbox">
          <input type="checkbox" class="ram" value="64" id="defaultInline1">
          <label class="-label" for="defaultInline1">64 GB </label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" class="ram" value="32" id="defaultInline2">
          <label class="-label" for="defaultInline2">32 GB</label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" class="ram" value="16" id="defaultInline3">
          <label class="-label" for="defaultInline3">16 GB</label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" class="ram" value="8" id="defaultInline4">
          <label class="-label" for="defaultInline4">8 GB</label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" class="ram" value="4" id="defaultInline5">
          <label class="-label" for="defaultInline5">4 GB </label>
        </div>
      </div>


      <!-- Storage Size -->
      <div class="card card-filter bg-light">
        <p class="color-title mb-1">Storage Size</p>
        <div class=" custom-checkbox">
          <input type="checkbox" value="1" class="Storage-Size" id="defaultInline1">
          <label class="-label"  for="defaultInline1">1TB </label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="512" class="Storage-Size"  id="defaultInline2">
          <label class="-label" for="defaultInline2">512 GB</label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="500" class="Storage-Size"  id="defaultInline3">
          <label class="-label" for="defaultInline3">500 GB</label>
        </div>


      </div>

      <!-- /Storage Type -->


      <div class="card card-filter bg-light">
        <p class="color-title mb-1">Storage Type</p>
        <div class=" custom-checkbox">
          <input type="checkbox" value="SSD(355)" class="Storage-type" id="defaultInline1">
          <label class="-label"  for="defaultInline1">SSD (355) </label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="eMMC (22)" class="Storage-type" id="defaultInline2">
          <label class="-label" for="defaultInline2">eMMC (22)</label>
        </div>


      </div>


      <!-- Processor Platform -->

      <div class="card card-filter bg-light">
        <p class="color-title mb-1">Processor Platform</p>
        <div class=" custom-checkbox">
          <input type="checkbox"value="Intel Evo vPro" class="P-platform" id="defaultInline1">
          <label class="-label" for="defaultInline1">Intel Evo vPro </label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="Intel Evo "class="P-platform" id="defaultInline2">
          <label class="-label" for="defaultInline2">Intel Evo</label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="Intel  vPro" class="P-platform" id="defaultInline3">
          <label class="-label" for="defaultInline3">Intel vPro</label>
        </div>


      </div>

      <!-- PRix -->

      <div class="card card-filter bg-light">
        <p class="color-title mb-1">Prix</p>
        <div class=" custom-checkbox">
          <input type="checkbox" value="1600" class="prix" id="defaultInline1">
          <label class="-label" for="defaultInline1">£1600 </label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="1400 and 1600"class="prix" id="defaultInline2">
          <label class="-label" for="defaultInline2">£1400 - £1600 </label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox"value="1200 and 1400" class="prix" id="defaultInline3">
          <label class="-label" for="defaultInline3">£1200 - £1400</label>
        </div>
        <div class=" custom-checkbox">
          <input type="checkbox" value="1000 and 1200" class="prix" id="defaultInline3">
          <label class="-label" for="defaultInline3">£1000 - £1200</label>
        </div>


      </div>

</div>

<!-- Product -->


<section class="col-md-9 mt-3  card-p">


  <div class="product-view">
    
  <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?><form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
  <div class="">
    <a href="shopping.php?id=<?php echo $r['id_product'] ?>">
      <img src="<?php echo $r['img_product'] ?>"   class="w-75 " alt="">

      <h6 class="mt-2" > <?php echo $r['marque'] ?> </h6>
      <small><?php echo $r['name_type'] ?></small>
      </a>
    <h6><?php echo $r['price'] ?>£<input type="hidden" name="product_id" value="<?=$r['id_product']?>">
    <input type="submit"   name="add" class="btn btn-secondary btn-sm  " value="Add card" > </h6>
  </div></form>
<?php }

?>


  </div>

</section>
</div>
</main>







<!-- Footer -->

<?php require_once "includes/footer.php";?>





<!-- moduls Hidden -->



<script>

$(":checkbox").click(function(){

filter_data();

function filter_data()
{
   
    var action = 'fetch_data';
 
    var ram = get_filter('ram');
    var Ssize = get_filter('Storage-Size');
    var Stype = get_filter('Storage-type');
    var Pplatform =get_filter('P-platform');
    var prix =get_filter('prix');
   
    $.ajax({
        url:"filter-data/filter-data_Bureau.php",
        method:"POST",
        data:{action:action,  ram:ram,Ssize:Ssize,Stype:Stype,Pplatform:Pplatform,prix:prix},
        success:function(data){
            $('.product-view').html(data);
        }
    });
}

function get_filter(class_name)
{
    var filter = [];  
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}


      

})

</script>

