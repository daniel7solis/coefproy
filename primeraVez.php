<?php
	if(/*$_POST*/true){
		// $idp=$_POST['idp'];
		$idp=1;
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		$data = mysql_query("select cons from Paciente where idPaciente='$idp'",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		
	}else{
		$arr = array('tot' => -1);
		$json = json_encode($arr);
		echo $json;
	}
?>