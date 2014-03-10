<?php
	/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
	$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*fin para verificar*/
	$idu=$_REQUEST['idu'];
	$idp=$_REQUEST['idp'];
	$modulo=$_REQUEST['modulo'];
	$posicion=$_REQUEST['posicion'];
	mysql_query("update permisosusuarios set idModulo='$modulo',idPosicion='$posicion' where idUsuarios='$idu' and idPermisos='$idp'",$conexion) or die(mysql_error());
	// echo "<script language='javascript'> var idimg=$id; </script>";
	header("location: setting_user.php");
?>