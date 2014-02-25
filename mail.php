<?php
	require("class.phpmailer.php");
	$mail = new PHPMailer();
	$body = "<h1 style='color:blue'>hola ai</h1>";
	$mail->IsSMTP(); // telling the class to use SMTP
	// $mail->Host= "mail.yourdomain.com"; // SMTP server
	// $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only.

	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "webservicecoefproy@gmail.com";  // GMAIL username
	$mail->Password   = "warcrack2";            // GMAIL password
 
	$mail->SetFrom('webservicecoefproy@gmail.com', 'WEB DEVELOPER');
 
	// $mail->AddReplyTo("daniel7solis@yourdomain.com","ING. DANIEL SOLIS WEB DEVELOPER");

 
	$mail->Subject    = "Recupera Contraseña";
 

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test


	$mail->MsgHTML($body);
	 
	$address = "webservicecoefproy@gmail.com";
	$mail->AddAddress($address, "Nombre receptor");
 
	// $mail->AddAttachment("images/phpmailer.gif");      // attachment
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
?>