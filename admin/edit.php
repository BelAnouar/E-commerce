    
<?php
    

    require_once '../data/header.php';
    require_once '../db/conn.php';
    
    $results = $product->gettype();

    if(!isset($_GET['id']))
    {
        //echo 'error';
        include '../includes/errormessage.php';
        header("Location: view.php");
    }
    else{
        $id = $_GET['id'];
        $r = $product->getproductDetails($id);
        if(isset($_POST['edit'])){
          //extract values from the $_POST array
          $marque=$_POST["marque"];
          $price=$_POST["price"];
          $description=$_POST["description"];
          $type=$_POST["type"];
    
          //Call Crud function
          $result = $product->editproduct($id, $marque, $description, $price,$type);
        }
    

    
?>
<h1 class="text-center text-danger">Modifier</h1>
<h1 class="text-center">ADD product</h1>
 <form method="post" action="" enctype="multipart/form-data">

       

   <div class="form-group">
     <label for="marque">marque</label>
     <input type="text" name="marque" class="form-control" id="marque"   value="<?php echo  $r["marque"] ; ?>">
   </div>

   <div class="form-group">
     <label for="price">prix</label>
     <input type="number" name="price" class="form-control" id="price" min="1000" placeholder="Enter prix" value="<?php echo  $r["price"] ; ?>">
   </div>

   <div class="form-group">
     <label for="description">Detail product</label>
      <textarea name="description" class="form-control" rows="8" cols="80" placeholder=""><?php echo  $r["description"] ;  ?></textarea>
   </div>


   <div class="form-group">
     <label for="type">Type product</label>
     <select name="type" class="form-control" id="type">
       <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
      <option value="<?php echo $r["type_id"]?>" <?php if($r['type_id'] == $r['type_id']) echo 'selected' ?>><?php  echo $r["name_type"]?></option>

      

  <?php }?>

     </select>
   </div>
    

  

  <input type="submit" name="submit" name="edit" class="btn btn-primary mt-3" value="submit">
 </form>
<?php } ?>