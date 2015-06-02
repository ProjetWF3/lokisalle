<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Humm pas bon!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'email@point.fr'; // put your email
$email_subject = "Contact Lokisalle:  $name";
$email_body = "Vous avez un nouveau message. \n\n".
				  "Name: $name \n ".
				  "Email: $email_address\n\n Message \n $message";
$headers = "From: contact@lokisalle.loki\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>