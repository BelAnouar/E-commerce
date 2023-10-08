<?php
session_start();
require_once 'db/conn.php';



$res=$cart->getcart();
$Sumprice=$cart->getSumcart();
$rows=$res->rowCount();



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>OrdiShop</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/product.css">
  <link rel="icon" href="images/favicon (3).ico">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- bootstrap -->
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Font icon -->

  <script src="https://kit.fontawesome.com/e6d847830a.js" crossorigin="anonymous"></script>


  <!-- Font icon -->
</head>

<body>

  <section id="title">
    <div class="container-fluid">



      <!-- Nav Bar -->
      <nav id="menu" class="navbar navbar-expand-lg navbar-dark text-dark">
        <a class="navbar-brand" href="">
          <img src="images/My project-modified.png" alt="" width="38" height="37" class="d-inline-block align-text-top">
          OrdiShop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <p class="navbar-toggler-icon"></p>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mt-auto mt-lg-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link text-danger"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-laptop"></i>
                Nos ordinateurs
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item text-danger" href="bureau.php">Nos ordinateurs de bureau</a>
                <a class="dropdown-item text-danger" href="mini-pc.php">Mini PC</a>
                <a class="dropdown-item text-danger" href="pc.php">Ordinateurs portables</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="conf.php" class="nav-link text-danger"><i class="fas fa-boxes"></i> Nos coffrets</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-danger"><i class="fas fa-dolly"></i> Nos fournisseurs</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-danger"><i class="far fa-question-circle"></i> Qui sommes-nous?</a>
            </li>
            <li class="nav-item">
              <a href="blog.php" class="nav-link text-danger"><i class="fa-brands fa-blogger"></i> Blog</a>
            </li>

          </ul>
          <div class="navbar justify-content-end" id="collapsibleNavbar">
					    <ul class="navbar-nav ">
					      	<li class="nav-item dropdown ">
						        					          <a class="nav-link dropdown-toggle text-dark"  id="navbarDropdownMenuLink" data-toggle="dropdown" >
	<i class="fas fa-shopping-cart text-dark "></i>Basket
                      <?php if($rows>0){?>
                        <span class="badge badge-circle badge-primary badge-sm "><?php echo $rows?></span> 
                        <?php }?>
						        </a>
						        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                         
                    <?php if($rows>0){?>
                      <a class="nav-link text-dark"  href="basket.php">
                       <p>Basket(<?php echo $rows?> item)</p>

                       <p>total: <span class="ml-4 Gtotal"><?php echo $Sumprice["tprice"];?>£</span></p> 
      
                       
                    </a>

                  <?php }else{
                        echo "empty Basket";
                    } ?>
                        
						          
						        </div>
					      	</li>
         </div>
        
          <form class="form-inline my-2 my-lg-0" action="index.php" method="post">
          <?php
              if(!isset($_SESSION['username'])){

          ?>
            <a href="singn.php" class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="button"><i class="far fa-user"></i> Sign-Up </a>
            <?php } else { ?>
              <div class="dropdown">
				<a  data-toggle="dropdown" class="dropdown-toggle user-action nav-link text-dark ">
          <img src="images/profile.png" class="avatar" width="35 " alt="Avatar"> <?php echo substr($_SESSION['username'],0,6)?>
          <b class="caret"></b></a>
				<div class="dropdown-menu ">
                    <div class="m-2"> <span class ="font-weight-bold">Signed in as</span>  <?php echo substr($_SESSION['username'],0,6)?> </div>
					<div class="dropdown-divider"></div>
                    <div ><a   class="nav-link text-dark"><i class="fa fa-user-o"></i> Profile</a></div>


					<div class="divider"></li>
					<div ><a href="logout.php"  class="nav-link text-dark"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></div>
            </div>
            </div>
            <?php } ?>
        </form>

        </div>
      </nav>
