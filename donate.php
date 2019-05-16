<?php
/* ============================================================================================================== */
/* Email logic  */

  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $to = "contact@klci.com.ng";
  $subject = "New email (Donation)";
  $headers = "From: $email\n";
  $message = "Name: $name\nEmail: $email\nPhone: $phone";
  mail($to, $subject, $message, $headers);
  /* ============================================================================= */
  /* Database Logic */
  $servername = "localhost";
  $username = "klcicomn_admin";
  $password = "3RnPnuRxFdzh";
  $dbname = "klcicomn_blog";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  

  $sql = "INSERT INTO donation (email, name, phone) VALUES ('$email', '$name', '$phone' )";

  $conn->query($sql);

include 'header.php';
include "navbar.php"; ?>
<div class="container-fluid team-desc-orange" style="padding-top: 70px">
  <div class="row v-center">
    <div class="col-md-8">
      <h2 class="text-center"><strong>Support A Child Today</strong></h2>
      <p class="short-aboute">Everyday nearly 400,000 babies are born around the world. Life starting point is a
        lottery, but their future should not be left to chance (World Bank 2018).
        The career of so many children born in marginalized communities has remained stunted because of the financial
        status of the parents. Many times, parents try so hard to send their
        kids to school but many of those kids could not complete primary or secondary school. In most cases they do not
        get to further to study up to the University because of their incapacity
        to pay for Unified Tertiary Matriculation Examination or Senior Secondary School Certificate Examination. We
        also conducted research and ask Senior Secondary School Students what their
        career needs are and 30.6% needs sponsorship to further their education. This has made so many of them to stay
        at home and may eventually not pass through the university. This is harmful
        to economic growth because of wasted human potential. Education is a key dimension of human progress and it
        should close the gap in inequalities not widen it. Join us as we work towards
        achieving the sustainable development goal 4 (Quality Education) with relation to target 4.1which implies by
        2030 ensure that all girls and boys complete free equitable and quality primary
        and secondary education leading to relevant and effective learning outcomes. As well as ensure entry into higher
        education of many of these children. Sponsor a child today through <strong>KLCI Scholarship Trust Fund.</strong>
      </p>
    </div>
    <div class="col-md-4">
      <span class="glyphicon glyphicon-usd logo-big-white slideanim"></span>
    </div>
  </div>
</div>

<div class="container-fluid donate">
  <div class="text-center" style="margin-top: 200px;">
    <h2 class="slideanim" style="color: white;"><strong>You too can contribute, donate today!</strong></h2>
    <br>
    <a href="#donate" class="btn btn-lg carousel-btn"> Donate</a>
  </div>
</div>

<!-- Donate Segment -->
<div id="donate">
  <h2 class="text-center">Our Account Details</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Kindly find below our accounts details
        </h4>
        <br>
        <ul class="list-group">
          <li class="list-group-item">
            <h4>Account Name: <strong>Kayode Alabi Leadership And Career</strong></h4>
          </li>
          <li class="list-group-item">
            <h4>Account Number: <strong>1016248804</strong></h4>
          </li>
          <li class="list-group-item">
            <h4>Bank Name: <strong>Zenith Bank</strong></h4>
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <div>
          <h4>To help you know where your donation went to kindly provide the following details for future correspondence
          </h4>
          <br>
          <form action="donate.php#donate" role="form" method="post">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number:</label>
              <input type="number" name="phone" class="form-control" id="phone" required>
            </div>
            <button type="submit" class="btn btn-lg carousel-btn"">Submit</button>
        </form>
      </div>
      <?php
      // Checks if message ws submitted
      if (isset($_POST['name'])) {
        echo '<div class="alert alert-success">
  <h4 id="details-success">Thank you for joining us restore the educational promise and librate the children in the under-served
  communities.</h4></div>';
      }
      ?>
        
      </div>
    </div>

  </div>

</div>
<!-- End of donate segment -->

<?php

// Scripts to perform submition 
if (isset($POST['name'])) {
  $name = $_POST['name'];
}
if (isset($POST['email'])) {
  $email = $_POST['email'];
}
if (isset($POST['phone'])) {
  $phone = $_POST['phone'];
}

include "footer.php";  ?>
</body>

</html>