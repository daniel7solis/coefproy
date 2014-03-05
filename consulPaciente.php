<?php
	if($_POST){
		$id=$_POST['id'];
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		// Defino que la conexion con la base de datos sera con la codificacion UTF-8
		mysql_set_charset("utf8", $conexion);
		mysql_query("insert into newPaciente (nombre,apeidos,edad,fecha_nac,email,tel,idSucursal)
		 values ('$nom','$ap','$edad','$dateB','$mail','$tel','$s')",$conexion) or die(mysql_error());
		$arr = array('ok' => 1,'nom' => $nom,'ap' => $ap);
		/*APARTE DE DEVOLVER LOS DATOS DEL PACIENTE RECIEN REGISTRADO, TAMBIEN
		SE VA A MANDAR LOS NOMBRES DE LOS DOCTORES Y SU ID*/
		$json = json_encode($arr);
		echo $json;
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>