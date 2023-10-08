<?php require_once "includes/header.php";


if(isset($_POST["send"])){
  $email =$_POST['email'];

   $query="INSERT INTO `newsletter`( `email`) VALUES ('".$email."')";

   $statement = $pdo->prepare($query);
   $statement->execute();
}

?>



  <!-- header -->
  <section class="feature-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 feature-title">
          <h3 class="text-uppercase">Get Update From anywhere</h3>

          <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam,
            consequuntur.</p>
        </div>
        <div class=" Send col-lg-6 col-md-12 ">
          <form class="w-100" action="" method="post">
            <div class="d-flex">
              <input type="text" id="textEmail" name="email" class="form-control " placeholder="Your Email">
              <button type="submit" class="btn btn-info ml-2 float-right" name="button">
                <input type="hidden" name="send">
              Send</button>
            </div>

          </form>


        </div>

      </div>

    </div>

  </section>

  <!-- Testimonials -->
  <section id="testimonials">


    <!-- First row -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
           <img class=" card-img-top w-100 image-top" src="../images/ram.png" alt="Card image cap">

          <div class="card-body">
            <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <button type="button" class="btn btn-primary btn-lg" name="button">Read more</button>

          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card">
           <img class=" card-img-top w-100 image-top" src="../images/cd.png" alt="Card image cap">

          <div class="card-body">
            <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <button type="button" class="btn btn-primary btn-lg" name="button">Read more</button>
          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card">
           <img class=" card-img-top w-100 "image-top src="../images/binary-code.png" alt="Card image cap">

          <div class="card-body">
            <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <button type="button" class="btn btn-primary btn-lg" name="button">Read more</button>
          </div>
        </div>
      </div>




    </div>

    <!-- Second row -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
             <img class=" card-img-top w-100 image-top" src="../images/diagram.png" alt="Card image cap">

          <div class="card-body">
            <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <button type="button" class="btn btn-primary btn-lg" name="button">Read more</button>
          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card">
             <img class=" card-img-top w-100 "image-top src="../images/cpu.png" alt="Card image cap">

          <div class="card-body">
            <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <button type="button" class="btn btn-primary btn-lg" name="button">Read more</button>
          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card">
             <img class=" card-img-top w-100 image-top" src="../images/office.png" alt="Card image cap">

          <div class="card-body">
            <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <button type="button" class="btn btn-primary btn-lg" name="button">Read more</button>
          </div>
        </div>
      </div>




    </div>




  </section>




  <!-- Footer -->

  <?php require_once "includes/footer.php";?>

</body>

</html>
