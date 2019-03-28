<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Please fill the form";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'info@tagehitus.ee'; // Add your email address inbetween the '' replacing info@tagehitus.ee - This is where the form will send a message to.
$email_subject = "Veebikontaktvorm:  $name";
$email_body = "Oled saanud uue e-maili veebilehe kaudu.\n\n"."Siin on detailid:\n\nName: $name\n\nEmail: $email_address\n\Sõnum:\n$message";
$headers = "From: noreply@tagehitus.ee\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>