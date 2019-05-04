<?php
include 'header.html';
$email = $_POST['email'];
$name = $_POST['name'];
$why = $_POST['why'];
$to ="academy@klci.com.ng";
$subject = "New email (Course Registration)";
$headers = "From: $email\n";
$message = "Name: $name\n
Email Address: $email\n
Why do you want to take these courses?: $why";

$user = "$email";
$usersubject = "KLCI Academy";
$userheader = "From: academy@klci.com.ng". "\r\n";
$userheader .= "Reply-To: academy@klci.com.ng" . "\r\n";
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
$usermessage .= '<div style="background-color: #dfdfdf; padding-top: 50px;padding-right: 10px;
padding-left: 10px; padding-bottom: 30px;">';
$usermessage .= "Dear <b>$name</b>,<br><br>
Thank you for registering for our courses!<br><br><br>
Please note that you are to make payment of <b>N2000 ($6)</b> to take this course for <b>12 weeks (Every Saturday).</b>
This is in a bid to develop yourself and indirectly enable
children in underdeserved communities access quality education.<br><br><br>
Find the payment details below:<br><br>
   Account Name: <strong> Alabi Hammed Kayode</strong><br>
   Account Number: <strong> 0121551088 </strong><br>
   Bank: <strong>Guaranty Trust Bank</strong><br><br>
   <b>N.B</b>: Kindly respond to this mail with evidence of payment and a congratulatory mail will follow and a link to join class.
   <br><br>
   The KLCI Academy since inception have trained over 100 young professionals. This is a great oppurtunity to tap into the network of youmg Nigerians and Africans doing amazing stuffs.<br><br>
   For more enquiry contact Zainab the Academy coordinator zainab@klci.com.ng<br><br><br>
   <b>Regards</b>,<br><br>
   KLCI Academy Team";
$usermessage .= '</div>';
$usermessage .= '<div  style="background-color:black; color:white; padding: 10px;">

 <p> © 2019. KLCI. All Rights Reserved.</p>';

$usermessage .= '</div>';
$usermessage .= '<html><body>';


mail($to, $subject, $message, $headers);
mail($user, $usersubject, $usermessage, $userheader); 


  header("Location: register_for_courses.php?result=success");
?>