<?php


class client{

  private $db;
        
        
        function __construct($conn){
            $this->db = $conn;
        }
   public function insertclient($fname, $email,$adr, $city, $state,$zip,$name_card,$Cnumber,$month,$year){
           try {
               // define sql statement to be executed
               $sql = "INSERT INTO `client`( `full_name`, `email_client`, `city`, `state`, `zip_code`, `name_card`, `credit_number`, `month`, `year`,`address_client`) VALUES
               (:fname, :email, :city, :state,:zip,:name_card,:Cnumber,:month,:year,:adr)";
               //prepare the sql statement for execution
               $stmt = $this->db->prepare($sql);
               // bind all placeholders to the actual values
               $stmt->bindparam(':fname',$fname);
               $stmt->bindparam(':email',$email);
               $stmt->bindparam(':adr',$adr);
               $stmt->bindparam(':city',$city);
               $stmt->bindparam(':state',$state);
               $stmt->bindparam(':zip',$zip);
               $stmt->bindparam(':name_card',$name_card);
               $stmt->bindparam(':Cnumber',$Cnumber);
               $stmt->bindparam(':month',$month);
               $stmt->bindparam(':year',$year);
               

               // execute statement
               $stmt->execute();
               return true;

           } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
           }
       }
    }