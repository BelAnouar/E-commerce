<?php



require_once '../db/conn.php';

if(isset($_POST["action"]))
{
 $query = "SELECT * FROM product p  inner join type_product t on p.type_id = t.type_id where p.type_id = 3";
 

 if(isset($_POST["ram"]))
 {
  $ram_filter = implode("','", $_POST["ram"]);
  $query .= "
   And  ram IN('".$ram_filter."')
  ";
 } if(isset($_POST["Ssize"]))
 {
  $Ssize_filter = implode("','", $_POST["Ssize"]);
  $query .= "
   AND Storage_size IN('".$Ssize_filter."')
  ";
 }

 if(isset($_POST["Stype"]))
 {
  $Stype_filter = implode("','", $_POST["Stype"]);
  $query .= "
   AND Storage_type IN('".$Stype_filter."')
  ";
 }
 if(isset($_POST["Pplatform"]))
 {
  $Pplatform_filter = implode("','", $_POST["Pplatform"]);
  $query .= "
   AND processor_paltform IN('".$Pplatform_filter."')
  ";
 }
 if(isset($_POST["prix"]))
 {
  $prix_filter = implode("','", $_POST["prix"]);

  if($prix_filter != "1600"){
    $query .= "
   AND  price BETWEEN ".$prix_filter."
  ";}else{

    $query .= "
   AND  price > ".$prix_filter."
  ";

  }
  

  

  
 }
 
 

 $statement = $pdo->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $r)
  {
   $output .= '
  
      <div class="">
        <a href="shopping.php?id='.  $r["id_product"] .'">
          <img src="'.  $r['img_product'] .'"   class="w-75 " alt="">

          <h6 class="mt-2" > '.  $r['marque'] .' </h6>
          <small>'. $r['name_type'] .'</small>
          </a>
        <h6>'.  $r['price'] .'£<input type="hidden" name="product_id" value="<?='.$r['id_product'].'?>">
        <input type="submit"   name="add" class="btn btn-secondary btn-sm  " value="Add card" > </h6>
      </div>
    


   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>