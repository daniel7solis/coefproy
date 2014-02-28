<?php
	/*Importo la clase de alertMail que lista las personas para enviar una alerta*/
	require_once('list_to_alert.php');/*Objeto JSON global con el listado, llamado */
	require("class.phpmailer.php");/*Clase requerida para enviar correo electronico*/
	$datos=json_decode($Ojson,true);
	// var_dump($datos);
	// echo $datos['id1']['nombre'];
	// var_dump($ciclo);
	/*Recorremos la lista de elementos para enviar la alerta*/
	for($i=0; $i<((int)$datos['cant']); $i++){//
		send_email("webservicecoefproy@gmail.com","DANNNN");
		send_email($datos['id'.$i]['email'],$datos['id'.$i]['nombre']);
	}
	/*FUNCION PARA ENVIAR EMAIL*/
	/*Recibo el correo, y el nombre del elemento */
	function send_email($correo,$nom){
		$mail = new PHPMailer();
		$body = "<h2>Recuerda tu cita</h2>";
		$mail->IsSMTP(); // usar SMTP
		$mail->SMTPAuth   = true;                  // auntenticar
		$mail->SMTPSecure = "tls";                
		$mail->Host       = "smtp.gmail.com";      // usar gmail como smtp
		$mail->Port       = 587;                   // puerto
		$mail->Username   = "webservicecoefproy@gmail.com";  // GMAIL cuenta
		$mail->Password   = "warcrack2";            // GMAIL contraseña
		$mail->SetFrom('webservicecoefproy@gmail.com', 'WEB DEVELOPER');
		$mail->Subject    = "Recordatorio";
		$mail->MsgHTML($body);
		/*Datos del receptor*/
		// $address = "webservicecoefproy@gmail.com";
		$address = "$correo";
		$mail->AddAddress($address,"$nom");
		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	}
?>