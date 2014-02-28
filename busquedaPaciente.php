<?php
	if(/*$_POST*/true){
		$nom=$_POST['nom'];
		$ap=$_POST['ap'];
		$dateB=$_POST['dateB'];
		/*Hacer de nuevo la conexion*/
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		$list_idusers=mysql_query("select idPaciente from Paciente where nombre='$nom',apeidos='$ap',fecha_nac='$dataB', order by idUsuarios",$conexion);
		echo '{"ok":"1"}';
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>