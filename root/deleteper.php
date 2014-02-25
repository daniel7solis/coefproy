<?php 
	if($_POST){
		$idp=$_POST['idp'];
		/*Hacer de nuevo la conexion */
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		// $conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		// Defino que la conexion con la base de datos sera con la codificacion UTF-8
		mysql_set_charset("utf8", $conexion); 
		/*fin*/
		mysql_query("delete from permisosusuarios where idPermisos='$idp'",$conexion) or die("Problemas en la eliminacion".mysql_error());
		$arr = array('ok' => "1");
		$json = json_encode($arr);
		echo $json;
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>