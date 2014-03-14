<?php
	if($_POST)
	{
		date_default_timezone_set('America/Mexico_City');
		# Arreglos necesarios para pasar los registros y manejarlos mejor.
		$cant=0;$aux=0;
		$date = $_POST['fecha'];
		$arreglo;
		# Conexión a la base de datos.
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion);
		# Cuenta las citas
		$ver = mysql_query("select * from citas where fecha='$date'",$conexion);
		while($verify=mysql_fetch_array($ver))
		{
			$arreglo[$aux] = $verify['idCita'];
			$aux++;
		}
		$cant=count($arreglo);
		echo '{"qty":'.$cant.'}';
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "0");
		$json = json_encode($arr);
		echo $json;
	}
?>