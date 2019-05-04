<?php
$email = $_POST['email'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$occupation = $_POST['occupation'];
$phone = $_POST['number'];
$skills = $_POST['skills'];
$volunteer = $_POST['why'];
$know = $_POST['how'];
$long = $_POST['duration'];
$role = $_POST['role'];
$hours = $_POST['dedicate'];
$degree = $_POST['degree'];
$dob = $_POST['dob'];
$do = $_POST['do'];
$change = $_POST['change'];
$hope = $_POST['hope'];
$location = $_POST['location'];

$to ="contact@klci.com.ng";
$subject = "New email (Volunteer Role)";
$headers = "From: $email\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message = "Please find the details of the volunteer below<br><br><br>
<b>Email Address:</b> $email<br>
<b>Name:</b> $name<br><br>
<b>Gender:</b> $gender<br><br>
<b>Age:</b> $age<br><br>
<b>Location:</b> $location<br><br>
<b>Date of birth:</b> $dob<br><br>
<b>Occupation:</b> $occupation<br><br>
<b>Phone number:</b> $phone<br><br>
<b>What skills will you be bringing to the table? (100 words):</b> $skills<br><br>
<b>Why do you want to volunteer with KLCI? (100 words):</b> $volunteer<br><br>
<b>What does HOPE mean to you? (100 words):</b> $hope<br><br>
<b>What do you do (detailed) (100 words):</b> $do<br><br>
<b>How has it put you in a path to make change? (100 words):</b> $change<br><br>
<b>How did you get to know about KLCI?:</b> $know<br><br>
<b>How long do you want to stay with us?:</b> $long<br><br>
<b>Which of these volunteering role would you prefer?:</b> $role<br><br>
<b>How many hours can you dedicate to the volunteering work in a week?:</b> $hours<br><br>
<b>Degree:</b> $degree<br><br>
Also do ensure to get back to them with this email address (contact@klci.com.ng)";
$message .= '<html><body>';

$user = "$email";
$usersubject = "We are reviewing your application!";
$userheader = "From: contact@klci.com.ng". "\r\n";
$userheader .= "Reply-To: contact@klci.com.ng" . "\r\n";
$userheader .= "MIME-Version: 1.0\r\n";
$userheader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$usermessage = '<html><body>';
$usermessage .= '<div style="background-color: #53c68c; padding: 10px;">
<div style="margin-top:10px;">
	    <div>
			<a  onclick="location.href=\'https://klci.com.ng\'"><img class="img-responsive img-rounded"
				 src="https://klci.com.ng/images/klci.png" alt="KLCI" style="width:100px;"></a>
	          <div style="float: right;text-align: right; margin-top: 50px;"> 
	     <p><strong>Lagos, NG</strong></p>
      <p><strong> +2348092299879</strong></p>
	    </div>   
	</div>
	</div>';

$usermessage .= '</div>';
$usermessage .= '<div style="background-color: #dfdfdf; padding-top: 50px;padding-right: 10px;
padding-left: 10px; padding-bottom: 30px;">';
$usermessage .= "Hi <b>$name</b>,<br><br><br>
We appreciate your kind gesture requesting to be part of KLCI, we humbly request for your patience
as we review your application. We will get back to you as soon as the process is complete.
<br><br><br>
Please you can engage us by following our social media platforms.
<br><br>

<b>Facebook:</b> <a href='https://www.facebook.com/kayodealabiinitiative'>www.facebook.com/kayodealabiinitiative</a><br>
<b>Twitter:</b> <a href='https://www.twitter.com/KLCI_Initiative'>www.twitter.com/KLCI_Initiative</a><br>
<b>Instagram:</b> <a href='https://www.instagram.com/klci_initiative'>www.instagram.com/klci_initiative</a><br><br><br>
Regards,<br><br>
KLCI Recruitment Team";
$usermessage .= '</div>';
$usermessage .= '<div  style="background-color:black; color:white; padding: 10px;">
 <p> © 2019. KLCI. All Rights Reserved.</p>';
$usermessage .= '</body></html>';
                
mail($to, $subject, $message, $headers);
mail($user, $usersubject, $usermessage, $userheader); 

header("Location:join.php?result=sucess");
?>