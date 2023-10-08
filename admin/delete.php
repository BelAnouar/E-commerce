<?php
   
    require_once '../db/conn.php';
    if(!isset($_GET['id'])){
        include '../includes/errormessage.php';
        header("Location: view.php");
    }else{
        // Get ID values
        $id = $_GET['id'];

        //Call Delete function
        $result = $product->deleteproduct($id);
        //Redirect to list
        if($result)
        {
            header("Location: view.php");
        }
        else{
            include '../includes/errormessage.php';
        }
    }

?>