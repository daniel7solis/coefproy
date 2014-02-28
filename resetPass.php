<?php
	$user=$_POST['user'];
	$curp=$_POST['curp'];
	$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	$data=mysql_query("select idUsuario,nombre,email,semilla from usuarios where nombreUsuario='$user' and curp='$curp'",$conexion) or die("Problemas en la consulta ".mysql_error());
	$dataU=mysql_fetch_array($data);
	$semilla=$dataU['semilla'];
	$pass="";
	for ($i=0; $i<8; $i++){
		if($i%2!=0){
			// impar--> debe de estar entre el 65-90(A-Z) o 97-122(a-z)
			$caracter=chr(rand(65,90));
			$pass=$pass.$caracter;
		}else{
			// par debe concatenarse un digito 0-9
			$pass=$pass.rand(0,9);
		}
	}
	$passF=hash("sha512", $pass.$semilla,false);
	$idu=$dataU['idUsuario'];
	mysql_query("update usuarios set contrasena='$passF' where idUsuario='$idu'",$conexion) or die(mysql_error());
	$nombre=$dataU[1];
	echo $nombre;
	$email=$dataU[2];
	echo $email;
	require("class.phpmailer.php");
	$mail = new PHPMailer();
	$body = "<h2>Cambio de contraseña</h2>
	<h3>Contraseña temporal: $pass, por favor ingrese a su cuenta y cambie su contraseña.</h3>
	<h4>http://127.0.0.1/Eloi/coefproy/</h4><p>$email</p>";
	$mail->IsSMTP(); // usar SMTP
	$mail->SMTPAuth   = true;                  // auntenticar
	$mail->SMTPSecure = "tls";                
	$mail->Host       = "smtp.gmail.com";      // usar gmail como smtp
	$mail->Port       = 587;                   // puerto
	$mail->Username   = "webservicecoefproy@gmail.com";  // GMAIL cuenta
	$mail->Password   = "warcrack2";            // GMAIL contraseña

	$mail->SetFrom('webservicecoefproy@gmail.com', 'WEB DEVELOPER');
	$mail->Subject    = "Recupera Contraseña";
	$mail->MsgHTML($body);
	/*Datos del receptor*/
	// $address = "webservicecoefproy@gmail.com";
	$address = "$email";
	$mail->AddAddress($address, "$nombre");
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
		header("location: index.php");
	}
?>