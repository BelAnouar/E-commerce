<?php

class user{
    private $db;
        
    //constructor to initialize private variable to the database connection
    function __construct($conn){
        $this->db = $conn;
    }

    public function insertUser($fname,$lname,$email,$pass){ 
        try{
            $results=$this->getUserbyEmail($email);
            if($results['num']>0){
                return false;
            }else{
             $new_password = md5($pass.$email);
             $sql="INSERT INTO user (firstname, lastname, adress, password) values (:fname,:lname,:email,:pass)";
             $stmt=$this->db->prepare($sql);
             $stmt->execute([":fname"=>$fname,":lname"=>$lname,":email"=>$email,":pass"=>$new_password]);
             return true;}
         }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
   }
    public function getUserbyEmail($email){
           try{
            
            $sql="select count(*) as num from user where adress=:email";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([":email"=>$email]);
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($username,$password){
        try{
            $new_password = md5($password.$username);
            $sql = "select * from user where adress = :username AND password = :password ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $new_password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
       }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}



?>