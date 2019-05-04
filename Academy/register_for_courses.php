<?php
include '../header.php';
include "../navbar.php";

if (isset($_GET['result'])) {

  echo '<div class="container jumbotron" style="margin-top: 70px; margin-bottom:100px; padding: 30px">
  <h3>Thank you for registering for our courses, you have not just taken this step to acquire knowledge but also to empower a child in an underserved community. <br><br>Please check your <strong>mail</strong> as we have sent you a message to take you through the next step.</h3>
  </div>' ;
  
}else{

echo '<div class="container jumbotron" style="margin-top: 70px; padding: 30px">
  <h4>Fill in your details to register for these courses.</h4>
  <form role="form" action="register_helper.php" method="post">
    <div class="form-group">
  <div class="row" style="margin-top: 30px;">
        <div class="col-md-6">
          <label for="name">Name</label>
          <input id="name" class="form-control" name="name" placeholder="Your full name" type="text" required>
        </div>
        <div class="col-md-6">
          <label for="email">Email aaddress</label>
          <input class="form-control" id="name" name="email" placeholder="Your email address" type="email" required>
        </div>
      </div>
      <div class="row" style="margin-top: 30px;">
        <div class="col-md-12 ">
          <label for="why">Why do you want to take this course?</label>
          <textarea id="why" class="form-control" name="why" placeholder= "Answer" type="text" required ></textarea>
        </div>
        
      </div>    
</div>
<input type="submit"  class="btn  btn-lg pull-right carousel-btn" value="Submit">
</div>

  </form>
  </div>' ;
}


include '../footer.php';
echo '</body>
</html>';