<?php
	/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
	$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*fin para verificar*/
	$suc=$_REQUEST['sucursal'];
	$mod=$_REQUEST['modulo'];
	$pos=$_REQUEST['posicion'];
	$id=$_REQUEST['id'];
	mysql_query("insert into permisosusuarios (idSucursal,idUsuarios,idModulo,idPosicion)
	 values ('$suc','$id','$mod','$pos')",$conexion) or die(mysql_error());
	// echo "<script language='javascript'>";
	// echo "var idUser=".$idUsera[0].";";
	// echo "";
	// echo "</script>";
	header("location: users.php");
?>