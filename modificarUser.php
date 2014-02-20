<?php
	/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
	$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*fin para verificar*/
	$id=$_REQUEST['id'];
	$nombre=$_REQUEST['nombre'];
	$dir=$_REQUEST['dir'];
	$tel=$_REQUEST['tel'];
	$mail=$_REQUEST['email'];
	$curp=$_REQUEST['curp'];
	$rfc=$_REQUEST['rfc'];
	mysql_query("update usuarios set nombre='$nombre',direccion='$dir',telefono='$tel',email='$mail',curp='$curp',rfc='$rfc' where idUsuario='$id'",$conexion) or die(mysql_error());
	// echo "<script language='javascript'> var idimg=$id; </script>";
	header("location: setting_user.php");
?>