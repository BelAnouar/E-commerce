<?php
  
    require_once 'db/conn.php'; 
    session_start();
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password=md5($username.$password);

        $result = $user->getUser($username,$new_password);
        if(!$result){
          echo $errorMsg="Username or Password is incorrect! Please try again. ";
          
        }else{
           
            $_SESSION['username'] = $username;
            header("Location: index.php");
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">

  <!-- Font icon -->
  <script src="https://kit.fontawesome.com/ae880099db.js" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


  <!-- Font icon -->
  <!-- bootstrap -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <title></title>
  <link rel="stylesheet" href="css/Sign.css">
</head>

<body>


  <main class="container">
    <div class="background">
   <div class="shape"></div>
   <div class="shape"></div>
</div>
    <h2 class="logo-login"><i class="fas fa-user"></i> Login</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div><?PHP
  if(isset($errorMsg) && $errorMsg) {
    echo "<div class='alert alert-danger text-lowercase '>",htmlspecialchars($errorMsg),"</div>\n\n";
  }
?></div>
      <div class="input-field">
        <input type="text" name="username" id="username"  placeholder="Enter Your Username">

        <div class="underline"></div>
      
      </div>
      <div class="input-field">
        <input type="password" name="password" id="password" placeholder="Enter Your Password">
        <div class="underline"></div>
      </div>

      <input type="submit" value="Login">
    </form>

    <div class="footer">
      <span>Or Connect With Social Media</span>
      <div class="social-fields">
        <div class="social-field twitter">
          <a href="#"><i class="fab fa-twitter"></i>  Sign in with Twitter  </a></div>
        <div class="social-field facebook">
          <a href="#"><i class="fab fa-facebook-f"></i>  Sign in with Facebook</a>
        </div>
      </div>
      <div class="bottom-text">
        Don't have account? <a href="login.php">Sign up</a>
      </div>
    </div>
  </main>
</body>

</html>
