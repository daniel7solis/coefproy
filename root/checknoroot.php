<?php
	if(true)
	{
		$idd = $_POST['idd'];
		$n = $_POST['n'];
		$isDifferent = 0;
		$isEmpty = 0;
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			// Defino que la conexion con la base de datos sera con la codificacion UTF-8
		mysql_set_charset("utf8", $conexion); 
			/*fin para verificar*/
		$regrt=mysql_query("select nombreUsuario,contrasena from usuarios where nombreUsuario='root'",$conexion)or die("Problemas en la consulta la base de datos ".mysql_error());
		$rt=mysql_fetch_array($regrt);
		if(strcmp($n, $regrt['nombreUsuario'])!=0 && strcmp($idd, $regrt['contrasena'])!=0)
		{
			$isDifferent = 1;
		}
		if(strcmp($idd, "")==0 || strcmp($n, "")==0 || strcmp($s,"")==0)
		{
			$isEmpty = 1;
		}
		$cadena = '{"ok":'.$isDifferent.',"em":'.$isEmpty.'}';
		echo $cadena;
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "):");
		$json = json_encode($arr);
		echo $json;
	}
?>