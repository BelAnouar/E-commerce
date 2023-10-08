<?php


class product{

  private $db;
        
        
        function __construct($conn){
            $this->db = $conn;
        }
        
   public function insertProduct($destination, $marque, $description, $price,$type,$processor,$OpSystem,$Gcard,$Display,$HDrive,$Memory,$PBattery,$Wireless,$RAM,$Ssize,$Stype,$Pplatform){
           try {
               // define sql statement to be executed
               $sql = "INSERT INTO `product`(`img_product`, `marque`, `price`, `description`, `type_id`,`processor`,`operating_System`, `Graphics_Card`, `Display`, `Hard_Drive`, `primary_Battery`, `wireless`, `memory`,`ram`,`Storage_size`,`Storage_type`,`processor_paltform`)VALUES (:img,:marque,:price,:description,:type,:processor,:OpSystem,:Gcard,:Display,:HDrive,:PBattery,:Wireless,:Memory,:ram,:size,:stype,:platform)";
               //prepare the sql statement for execution
               $stmt = $this->db->prepare($sql);
               // bind all placeholders to the actual values
               $stmt->bindparam(':img',$destination);
               $stmt->bindparam(':marque',$marque);
               $stmt->bindparam(':description',$description);
               $stmt->bindparam(':price',$price);
               $stmt->bindparam(':type',$type);
               $stmt->bindparam(':processor',$processor);
               $stmt->bindparam(':OpSystem',$OpSystem);
               $stmt->bindparam(':Gcard',$Gcard);
               $stmt->bindparam(':Display',$Display);
               $stmt->bindparam(':HDrive',$HDrive);
               $stmt->bindparam(':PBattery',$PBattery);
               $stmt->bindparam(':Wireless',$Wireless);
               $stmt->bindparam(':Memory',$Memory);
               $stmt->bindparam(':ram',$RAM);
               $stmt->bindparam(':size',$Ssize);
               $stmt->bindparam(':stype',$Stype);
               $stmt->bindparam(':platform',$Pplatform);

               // execute statement
               $stmt->execute();
               return true;

           } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
           }
       }
       public function gettype(){
            $sql="SELECT * FROM type_product";
            $result = $this->db->query($sql);
            return $result;
        }
        public function getBureaux(){
            try{
                $sql = "SELECT * FROM product p  inner join type_product t on p.type_id = t.type_id where p.type_id = 1";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }
        public function getmini_Pc(){
            try{
                $sql = "SELECT * FROM product p  inner join type_product t on p.type_id = t.type_id where p.type_id = 3";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
        }
        public function getPC(){
            try{
                $sql = "SELECT * FROM product p  inner join type_product t on p.type_id = t.type_id where p.type_id = 2";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getproductDetails($id){
            try{
                $sql = "SELECT * FROM product p  inner join type_product t on p.type_id = t.type_id where id_product  = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function deleteproduct($id){
            try{
                 $sql = "delete from product where id_product= :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }
         public function getProduct(){
            try{
                $sql = "SELECT * FROM product p  inner join type_product t on p.type_id = t.type_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }
        public function editAttendee($id, $marque, $description, $price,$type){
            try{ 
                 $sql = "UPDATE `attendee` SET `marque`=:marque,`description`=:description,`price`=:price,`type_id`=:type_id : WHERE id_product = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':marque',$marque);
                 $stmt->bindparam(':description',$description);
                 $stmt->bindparam(':price',$price);
                 $stmt->bindparam(':type_id',$type);
                 
 
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }
         


}

 ?>
