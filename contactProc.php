<?php
//error_reporting(-1);
//var_dump($_POST);
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$message = $_POST["message"];

$contact_email = "kofosu89@gmail.com";
$subject = "PHP Course Contact Form";
$headers = "From: $email\r\nReply-To: $email\r\n";

//build email body containing user email and information
$msg = "Email from Contact Form\n\n";
$msg .= "First Name: $firstName\n\n";
$msg .= "Last Name: $lastName\n\n";
$msg .= "Email: $email\n\n";
$msg .= "Comments\n $message\n";

//tell php to send the memail
//$mailSent = mail($contact_email, $subject, $msg, $headers);
//echo $msg;
//exit();
?><!doctype html>
<body>
	<h1><?php echo "Hi $firstName $lastName!";?></h1>
	
	<h2>
	<?php 
		if ($mailSent){
			echo "Your message was sent. Thank you.";}else{echo "Could not send the message. Please try again.";}
		?></h2>
</body>
