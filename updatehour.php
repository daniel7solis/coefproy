<?php
	if($_POST)
	{
		$nuevahora = $_POST['h'];
		$ident = $_POST['id'];
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion);
		mysql_query("update citas set hora='$nuevahora' where idCita='$ident'");
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "");
		$json = json_encode($arr);
		echo $json;
	}
?>