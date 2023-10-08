<?php


class cart{

  private $db;
        
        
        function __construct($conn){
            $this->db = $conn;
        }
        
         public function insertcart($img_cart, $marque,$price,$qt){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO `card`(`img_card`, `marque`, `price`,`quantite`) VALUES (:img,:marque,:price,:qt)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':img',$img_cart);
                $stmt->bindparam(':marque',$marque);
                $stmt->bindparam(':price',$price);
                $stmt->bindparam(':qt',$qt);
                // execute statement
                $stmt->execute();
                return true;
 
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getcart(){
            try{
                $sql = "SELECT * FROM card";
               $result = $this->db->query($sql);
                
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSumcart(){
            try{
                $sql = "SELECT sum(price) as tprice FROM card";
               $result = $this->db->query($sql);
                
               $results = $result->fetch();
               return $results;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function deletecart($del){
        try{
            $sql = "delete from card where id_card = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $del);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
}


}

 ?>
