	<?php
	/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
	$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*fin para verificar*/
	$nombre=$_REQUEST['nombre']." ".$_REQUEST['ap'];
	$nombreUser=$_REQUEST['to_user'];
	$pass=$_REQUEST['to_pass'];
	$semilla=hash("sha512", $pass, false);
	$passF=hash("sha512", $pass.$semilla,false);
	$dir=$_REQUEST['dir'];
	$tel=$_REQUEST['tel'];
	$mail=$_REQUEST['mail'];
	$curp=$_REQUEST['curp'];
	$rfc=$_REQUEST['rfc'];
	mysql_query("insert into usuarios (nombreUsuario, contrasena, nombre, direccion, telefono, email, curp,rfc,semilla)
	 values ('$nombreUser','$passF','$nombre','$dir','$tel','$mail','$curp','$rfc','$semilla')",$conexion) or die(mysql_error());
	$idUser=mysql_query("select idUsuario from usuarios where nombreUsuario='$nombreUser' and nombre='$nombre' and contrasena='$passF'",$conexion) or die(mysql_error());
	$idUsera=mysql_fetch_array($idUser);
	// echo "<script language='javascript'>";
	// echo "var ids=sessionStorage.getItem('id');";
	// echo "var idd=JSON.parse(ids);";
	// echo "$suc=idd.nombre;";
	// echo "</script>";
	// echo $suc;
	header("location: altaPermiso.php?id=$idUsera[0]");

	
?>