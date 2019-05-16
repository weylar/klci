
<?php

$email = $_POST['email'];
$name = $_POST['name'];
$to ="contact@klci.com.ng";
$subject = "New email (Contact Form)";
$headers = "From: $email\n";
$message = $_POST['comments'];
mail($to, $subject, $message, $headers);

include 'header.php';
include 'navbar.php';
  echo '<div class="container jumbotron" style="margin-top: 70px; margin-bottom:100px; padding: 30px">
  <h3>Thank you for reaching out to us, we have received your message and we will get back to you if need be.</h3>
  </div>' ;
  
  
$servername = "localhost";
$username = "klcicomn_admin";
$password = "3RnPnuRxFdzh";
$dbname = "klcicomn_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO message (email, name, message) VALUES ('$email', '$name', '$message' )";

$conn->query($sql);

include 'footer.php'; ?>
</body>
</html>