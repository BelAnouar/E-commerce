<?php

require_once "db/conn.php";

if(isset($_POST["login"])){
  if($_POST['Password']==$_POST['conasPassword']){
  $fname= $_POST["firstname"];
  $lname= $_POST["secondname"];
  $email =strtolower(trim( $_POST["Email"]));
  $password =$_POST['Password'];
  $new_password=md5($email.$password);
  $login=$user->insertUser($fname,$lname,$email,$new_password);
  if ($login) {
    return true;
  }else{
    echo $errorMsg="email deja exhist";
  }}else{
    echo $errorMsgP="is not the same password";
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

    <h2 class="logo-login"><i class="fas fa-user"></i> sign up</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="input-field ">

        <input type="text" name="firstname" id="firstname" placeholder="Enter Your firstname">
        <div class="underline"></div>
          <span class="erreur"></span>
      </div>
      <div class="input-field ">
        <input type="text" name="secondname" id="secondname" placeholder="Enter Your secondname">
        <div class="underline"></div>

      </div>

      <div class="input-field ">
      
        <input type="email" name="Email" id="Email" placeholder="Enter Your Email">
        <div class="underline"></div>
        <p> <?PHP
  if(isset($errorMsg) && $errorMsg) {
    echo "<div class='alert alert-danger'>",htmlspecialchars($errorMsg),"</div>\n\n";
  }
?></p>
      </div>

      <div class="input-field">
        <input type="password" name="Password" id="conPassword" placeholder="Enter Your  Password">
        <div class="underline"></div>


      </div>
      <div class="input-field">
        <input type="password" name="conasPassword" id="conPassword" placeholder="Enter Your config Password">
        <div class="underline"></div>
        <p> <?PHP
  if(isset($errorMsgP) && $errorMsgP) {
    echo "<div class='alert alert-danger'>",htmlspecialchars($errorMsgP),"</div>\n\n";
  }
?></p>


      </div>

      <input type="submit" name="login" class="login" value="Login">
    </form>

    <div class="footer">

      <div class="bottom-text">
        have account? <a href="singn.php">login</a>
      </div>
    </div>
  </main>


  <script src="js/sign.js" charset="utf-8"></script>
</body>

</html>
