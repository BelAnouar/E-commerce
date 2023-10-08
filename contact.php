<?php require_once "includes/header.php";
  

if(isset($_POST["send-us"])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$formcontent="you have recevid e-mail from: $name \n Message: $message";
$mailTo = "amine.belhassan23@gmail.com";
$subject = "Contact Form";
$res = "From: $email ";



mail($mailTo, $subject, $message, $res)
or die(" Error");
echo"sent successfully";
}

?>


<section class="container m-4">
<div class="border bg-light rounded p-4">
    <h3>Send us</h3>
<form class="side-form"  action="" method="post">

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <input type="text" id="FirstName" name="name" class="form-control" placeholder="Name">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <input type="email" id="UserMail"name="email" class="form-control" placeholder="Email">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input type="text" id="UserPhone" name="phone" class="form-control" placeholder="Phone (Optional)">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <textarea id="UserMessage" class="form-control" name="message" placeholder="Message" cols="30" rows="10"></textarea>
           
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
        <button class="btn send-btn"  type="submit">
            <input type="hidden" name="send-us">
        Send</button>
    </div>
</div>
</form>

</div>
</section>



<?php require_once "includes/footer.php";?>