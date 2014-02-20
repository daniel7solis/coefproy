<?php
	if($_POST){
		$id=$_POST['id'];
		$nom=$_POST['user'];
		$suc=$_POST['suc'];
		/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
		// $conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		// Defino que la conexion con la base de datos sera con la codificacion UTF-8
		mysql_set_charset("utf8", $conexion); 
		/*fin para verificar*/
		// $datos=mysql_query("select idSucursal from permisosusuarios where idUsuarios='$id'",$conexion)or die("Problemas en la consulta la base de datos ".mysql_error());
		// $ids=mysql_fetch_array($datos);
		$datos=mysql_query("select nombreSucursal,direccionSucursal from Sucursal where idSucursal='$suc'",$conexion)or die("Problemas en la consulta la base de datos ".mysql_error());
		$arr=mysql_fetch_array($datos);
		/*Cadena con formato json*/
		$cadenaJson='{"id":"'.$suc.'","name":"'.$arr[0].'","dir":"'.$arr[1].'"}';
		// $cadenaJson='{"rc":"hola"}';
		echo $cadenaJson;
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>