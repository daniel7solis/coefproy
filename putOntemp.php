<?php
	if(true)
	{
		$ident = $_POST['id'];
		$user = $_POST['us'];
		$passwd = $_POST['pass'];
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion);
		
		# Primero, verifica que el usuario que está en la sesión es el indicado, quien
		# guardó las citas en la tabla temporal. (Seguridad)
		$ver = mysql_query("select contrasena from usuarios where idUsuario='$user'",$conexion);
		$verify = mysql_fetch_array($ver);
		#if(strcmp($passwd, $verify['contrasena'])==0)
		#{
			$registros = mysql_query("select * from citas where idCita='$ident'",$conexion);
			$datos = mysql_fetch_array($registros);
			$idCit=$datos['idCita'];
			$fech=$datos['fecha'];
			$hor=$datos['hora'];
			$idPacient=$datos['idPaciente'];
			$idDocto=$datos['idDoctor'];
			$minuto=$datos['minutos'];
			mysql_query("insert into tempCitas (idCita, fecha, hora, idPaciente, idDoctor, minutos, usuario) values ('$idCit','$fech','$hor','$idPacient','$idDocto','$minuto','$user')",$conexion) or die(mysql_error());
			mysql_query("delete from citas where idCita='$idCit'",$conexion) or die(mysql_error());
		#}
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "");
		$json = json_encode($arr);
		echo $json;
	}
?>