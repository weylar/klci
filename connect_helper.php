
<?php
$email = $_POST['email'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$phone = $_POST['number'];
$school = $_POST['school'];
$location = $_POST['location'];
$extra = $_POST['extra'];
$to ="contact@klci.com.ng";
$subject = "New email (School Connection)";
$headers = "From: $email\n";
$message = "Email Address: $email\n
Name: $name\n
Phone: $phone\n
School: $school\n
Location: $location\n
Additional Information: $extra\n";

  
$servername = "localhost";
$username = "klcicomn_admin";
$password = "";
$dbname = "klcicomn_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO connect (email, name, school, phone_num, location, contact_person, extra) VALUES ('$email', '$school', '$name', '$phone', '$location', '$contact', '$extra' )";

$conn->query($sql);

$user = "$email";
$usersubject = "Thank you! KLCI";
$userheader = "From: contact@klci.com.ng". "\r\n";
$userheader .= "Reply-To: contact@klci.com.ng" . "\r\n";
$userheader .= "MIME-Version: 1.0\r\n";
$userheader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$usermessage = '<html><body>';

$usermessage .= '<div style="background-color: #53c68c; padding: 10px;">
	
	<div style="margin-top:10px;">
	    <div>
	        <a  onclick="location.href=\'https://klci.com.ng\'"><img class="img-responsive img-rounded" src="https://klci.com.ng/images/klci.png" alt="KLCI" style="width:100px;"></a>
	          <div style="float: right;text-align: right; margin-top: 50px;"> 
	     <p><strong>Lagos, NG</strong></p>
      <p><strong> +2348092299879</strong></p>
	    </div>
	    
	   
	</div>
	</div>';
	
$usermessage .= '</div>';
$usermessage .= '<div style="background-color: #dfdfdf; padding-top: 50px;padding-right: 10px; padding-left: 10px; padding-bottom: 30px;">';
$usermessage .= "
Dear <b>$name</b>,<br><br>
You are an Education Hero!<br><br>
Thank you for connecting us to a school. We will reach out you if need be. Kindly find other ways you can work with us, 
check out about our various outreaches and interventions <a href='https://blog.klci.com.ng/index.php?tag=outreaches'><b>here</b></a> .
<br><br><br>
<b>Regards</b>,<br><br>
KLCI Engagement Team";
$usermessage .= '</div>';
$usermessage .= '<div  style="background-color:black; color:white; padding: 10px;">
 <p> © 2019. KLCI. All Rights Reserved.</p>';
$usermessage .= '</div>';
$usermessage .= '</body></html>';

mail($to, $subject, $message, $headers);
mail($user, $usersubject, $usermessage, $userheader); 


header("Location: connect.php?result=success")
?>