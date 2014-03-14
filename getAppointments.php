<?php
	if($_POST)
	{
		$dateTS = $_POST['dts'];
		$hourTS = $_POST['hts'];
		$tede = $_POST['td'];
		$cadena = "";
		date_default_timezone_set('America/Mexico_City');
		# Arreglos necesarios para pasar los registros y manejarlos mejor.
		$horas;$idpac;$iddoc;$fecha;$ids;$mins;$ispaci;$idsuc;$nombres;
		$aux=0;
		# Conexión a la base de datos.
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion);
		# Query para seleccionar todo los registros de la cita. AQUÍ FALTA QUE VERIFIQUE LA FECHA
		# PARA QUE SOLO MUESTRE LAS CITAS DEL DÍA QUE SE SELECCIONE.
		$datos=mysql_query("select * from citas where fecha='$dateTS' and hora='$hourTS'",$conexion);
		# Éste ciclo manda todos los datos a los arreglos definidos al inicio, para una mejor
		# manipulación.
		while($arreglo=mysql_fetch_array($datos))
		{
			$horas[$aux] = $arreglo['hora'];
			$idpac[$aux] = $arreglo['idPaciente'];
			$ispaci[$aux] = $arreglo['isPac'];
			if($ispaci[$aux]==0)
			{
				$datos2 = mysql_query("select nombre,apeidos from newPaciente where idPacTemp='$idpac[$aux]'",$conexion);
				while($arreglo2=mysql_fetch_array($datos2))
				{
					$nombres[$aux] = $arreglo2['nombre']." ".$arreglo2['apeidos'];
				}
			}
			else if($ispaci[$aux]==1)
			{
				$datos2 = mysql_query("select nombre,apeidos from Paciente where idPaciente='$idpac[$aux]'",$conexion);
				while($arreglo2=mysql_fetch_array($datos2))
				{
					$nombres[$aux] = $arreglo2['nombre']." ".$arreglo2['apeidos'];
				}
			}
			$iddoc[$aux] = $arreglo['idDoctor'];
			$fecha[$aux] = $arreglo['fecha'];
			$ids[$aux] = $arreglo['idCita'];
			$mins[$aux] = $arreglo['minutos'];
			$idsuc[$aux] = $arreglo['idSucursal'];
			$aux++;
		}

		for ($m=0; $m < $aux; $m++) 
			{
				$cadena=$cadena.',"cita'.$m.'":{"id":"'.$ids[$m].'","iddoc":"'.$iddoc[$m].'","idpac":"'.$idpac[$m].'","nompac":"'.$nombres[$m].'","hora":"'.$horas[$m].'","minuts":"'.$mins[$m].'","itpa":"'.$ispaci[$m].'","sucs":"'.$idsuc[$m].'"}';
			}

		echo '{"td":'.$tede.',"nc":'.$aux.''.$cadena.'}';
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "Bad!):");
		$json = json_encode($arr);
		echo $json;
	}
?>