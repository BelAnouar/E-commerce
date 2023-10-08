<?php
class comment{

    private $db;
        
        
    function __construct($conn){
        $this->db = $conn;
    }
        
   public function insertmessage($page,$message,$time){
           try {
               // define sql statement to be executed
               $sql = "INSERT INTO `comments`( `id_page`, `comment`, `date`) VALUES ( :page,:message,:time)";
               //prepare the sql statement for execution
               $stmt = $this->db->prepare($sql);
               // bind all placeholders to the actual values
               $stmt->bindparam(':page',$page);
               $stmt->bindparam(':message',$message);
               $stmt->bindparam(':time',$time);
               

               // execute statement
               $stmt->execute();
               return true;

           } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
           }
       }


       public function getcommentpage($id){
        try{
            $sql = "SELECT * FROM comments where id_page  = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
          
            return $stmt;
       }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    }