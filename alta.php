<?php
	/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
	$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*fin para verificar*/
	$nombre=$_REQUEST['nombre']." ".$_REQUEST['ap'];
	$nom=$_REQUEST['nombre'];
	$dir=$_REQUEST['dir'];
	$tel=$_REQUEST['tel'];
	$mail=$_REQUEST['mail'];
	$curp=$_REQUEST['curp'];
	$rfc=$_REQUEST['rfc'];
	mysql_query("insert into usuarios (nombreUsuario, contrasena, nombre, direccion, telefono, email, curp,rfc)
	 values ('$nom','$nom','$nombre','$dir','$tel','$mail','$curp','$rfc')",$conexion) or die(mysql_error());
	header("location: altaUser.php");
?>