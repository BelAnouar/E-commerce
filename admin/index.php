<?php
require_once '../data/header.php';
require_once '../db/conn.php';

 $results = $product->gettype();
 ?>
 <h1 class="text-center">ADD product</h1>
 <form method="post" action="insert.php" enctype="multipart/form-data">

       <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="img" >
            <label class="custom-file-label" for="avatar">Choose File</label>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

        </div>

   <div class="form-group">
     <label for="marque">marque</label>
     <input type="text" name="marque" class="form-control" id="marque"  placeholder="Enter la marque">
   </div>

   <div class="form-group">
     <label for="price">prix</label>
     <input type="number" name="price" class="form-control" id="price" min="1000" placeholder="Enter prix">
   </div>

   <div class="form-group">
     <label for="description">Detail product</label>
      <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
   </div>


   <div class="form-group">
     <label for="type">Type product</label>
     <select name="type" class="form-control" id="type">
       <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
      <option value="<?php echo $r["type_id"]?>"><?php echo $r["name_type"]?></option>


  <?php }?>

     </select>
   </div>
    

   <h1 class="text-center">Details Option product</h1>


   <div class="form-group">
     <label for="process">processor</label>
     <input type="text" name="process" class="form-control" id="process" placeholder="Enter process">

   </div>

   <div class="form-group">
     <label for="OpSystem">Operating System</label>
     <input type="text" name="OpSystem" class="form-control" id="OpSystem" placeholder="Enter Operating System">

   </div>

   <div class="form-group">
     <label for="Gcard">Graphics Card</label>
     <input type="text" name="Gcard" class="form-control" id="Gcard" placeholder="Enter Graphics Card">

   </div>

   <div class="form-group">
     <label for="Display">Display</label>
     <input type="text" name="Display" class="form-control" id="Display" placeholder="Enter Display">

   </div>

   <div class="form-group">
     <label for="HDrive">Hard Drive</label>
     <input type="text" name="HDrive" class="form-control" id="HDrive" placeholder="Enter Hard Drive">

   </div>
   <div class="form-group">
     <label for="Memory">Memory</label>
     <input type="text" name="Memory" class="form-control" id="Memory" placeholder="Enter Memory">

   </div>

   <div class="form-group">
     <label for="PBattery">Primary Battery</label>
     <input type="text" name="PBattery" class="form-control" id="PBattery" placeholder="Enter Primary Battery">

   </div>
   <div class="form-group">
     <label for="Wireless">Wireless</label>
     <input type="text" name="Wireless" class="form-control" id="Wireless" placeholder="Enter Wireless">

   </div>
   <h1 class="text-center">Option product</h1>
   <div>
    <label for="">RAM</label>
    <select class="form-control" name="ram" id="">
      <option value="64">64 GB</option>
      <option value="32">32 GB</option>
      <option value="16">16 GB</option>
      <option value="8">8 GB</option>
      <option value="4">4 GB</option>

    </select>
   </div><div>
    <label for="">Storage Size</label>
    <select class="form-control" name="Ssize" id="">
      <option value="1">1 TB</option>
      <option value="512">512 GB</option>
      <option value="500">500 GB</option>
      

    </select>
   </div>
   <div>
    <label for="">Storage Type</label>
    <select class="form-control" name="Stype" id="">
      <option value="SSD(355)">SSD (355)</option>
      <option value="eMMC (22)">eMMC (22)</option>
     

    </select>
   </div>
   <div>
    <label for="">Processor Platform</label>
    <select class="form-control" name="Pplatform" id="">
      <option value=" Intel Evo vPro"> Intel Evo vPro</option>
      <option value=" Intel Evo "> Intel Evo </option>
      <option value=" Intel vPro "> Intel vpro </option>
     

    </select>
   </div>



  <input type="submit" name="submit" class="btn btn-primary mt-3" value="submit">
 </form>


