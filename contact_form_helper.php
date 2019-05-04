<?php
$email = $_POST['email'];
$to ="contact@klci.com.ng";
$subject = "New email (Contact Form)";
$headers = "From: $email\n";
$message = $_POST['comments'];
mail($to, $subject, $message, $headers);

include 'header.html';
include "navbar.html";
  echo '<div class="container jumbotron" style="margin-top: 70px; margin-bottom:100px; padding: 30px">
  <h3>Thank you for reaching out to us, we have received your message and we will get back to you if need be.</h3>
  </div>' ;

include 'https://klci.com.ng/footer.php'; ?>
</body>
</html>