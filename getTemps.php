<?php
	if(true)
	{
		date_default_timezone_set('America/Mexico_City');
		# Arreglos necesarios para pasar los registros y manejarlos mejor.
		$ids_temps;$horas_temps;$idpac_temps;$iddoc_temps;$fecha_temps;$mins_temps;
		$aux_temps=0;
		$user = $_POST['us'];
		$passwd = $_POST['pass'];
		$cadena = "";
		# Conexión a la base de datos.
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion);
		# Primero, verifica que el usuario que está en la sesión es el indicado, quien
		# guardó las citas en la tabla temporal. (Seguridad)
		$ver = mysql_query("select contrasena from usuarios where idUsuario='$user'",$conexion);
		$verify = mysql_fetch_array($ver);

		if(strcmp($passwd, $verify['contrasena'])==0)
		{
			# Query para seleccionar todo los registros de las citas temporales.
			$datos_temps=mysql_query("select * from tempCitas where usuario='$user'");
			while($arreglo_temps=mysql_fetch_array($datos_temps))
			{
				if($arreglo_temps['idCita']!=0)
				{
					$horas_temps[$aux_temps] = $arreglo_temps['hora'];
					$idpac_temps[$aux_temps] = $arreglo_temps['idPaciente'];
					$iddoc_temps[$aux_temps] = $arreglo_temps['idDoctor'];
					$fecha[$aux_temps] = $arreglo_temps['fecha'];
					$ids_temps[$aux_temps] = $arreglo_temps['idCita'];
					$mins_temps[$aux_temps] = $arreglo_temps['minutos'];
					$aux_temps++;
				}
			}
			for ($m=0; $m < $aux_temps; $m++) 
			{
				$cadena=$cadena.',"cita'.$m.'":{"id":"'.$ids_temps[$m].'","iddoc":"'.$iddoc_temps[$m].'","idpac":"'.$idpac_temps[$m].'","hora":"'.$horas_temps[$m].'","minuts":"'.$mins_temps[$m].'"}';
			}
			echo '{"nc":'.$aux_temps.''.$cadena.'}';
		}
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "");
		$json = json_encode($arr);
		echo $json;
	}
?>