<?php
include 'header.php';
include "navbar.php";

if (isset($_GET['result'])) {

  echo '<div class="container jumbotron" style="margin-top: 70px; marging-bottom:70px; padding: 30px">
  <h3>Thank you for connecting us to a school, we believe in co-creation, together we shall make the world a better place.<br><br>Please check your <b>mail</b> inbox.</h3>
  </div>' ;
  
}else{

echo '<div class="container jumbotron" style="margin-top: 70px; padding: 30px">
  <h3>Connect us to a school in an underserved community (Rural or Urban) that needs access to skills and opportunities</h3>
  <form role="form" action="connect_helper.php" method="post">
    <div class="form-group">
  <div class="row" style="margin-top: 30px;">
        <div class="col-md-6">
          <label for="email">Email Address</label>
          <input id="email" class="form-control" name="email" placeholder="Your email address" type="email" required>
        </div>
        <div class="col-md-6">
          <label for="name">Name </label>
          <input class="form-control" id="name" name="name" placeholder="Your full name" type="text" required>
        </div>
      </div>



<div class="row" style="margin-top: 30px;">
        <div class="col-md-6">
          <label for="course">Name of school</label>
          <input id="occupation" class="form-control" name="school" placeholder="What is the name of the school?" type="text">
        </div>
        <div class="col-md-6">
          <label for="number">Phone Number</label>
          <input class="form-control" id="number" name="number" placeholder="Your phone number?" type="number" >
        </div>
      </div>

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-6 ">
          <label for="skills">Location</label>
          <textarea id="skills" class="form-control" name="location" placeholder= "Where is the school located?" type="text" required ></textarea>
        </div>
        <div class="col-md-6 ">
          <label for="why">Contact person</label>
          <textarea id="why" class="form-control" name="contact" placeholder="Phone number of the contact person in school?" type="email" required></textarea>
        </div>
        
      </div>

      

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-12 ">
          <label for="skills">Additional information</label>
          <textarea id="skills" class="form-control" name="extra" placeholder= "Any additional information?" type="text" ></textarea>
        </div>
        
      </div>
  
      
</div>
<input type="submit"  class="btn  btn-lg pull-right carousel-btn" value="Submit">
</div>

  </form>

  <div class="container jumbotron confirm" > 
    <h2>Thank you for showing interest, we will get back to you shortly!</h2>
  </div>
';
}


include 'footer.php';
echo '</body>
</html>';