<?php
	if($_POST){
		$idp=$_POST['idp'];
		$cont=0;//contador para saber cuantas citas fueron en total
		$cadena="";
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		$data = mysql_query("select tipo,idDoctor,fecha from Consultas where idPaciente='$idp' order by fecha desc",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		while($datos=mysql_fetch_array($data, MYSQL_ASSOC)){
			$json = json_encode($datos);
			// echo $json;
			$cadena=$cadena.',"'.$cont.'":'.$json;
			$cont++;
		}
		echo '{"tot":'.$cont.$cadena.'}';
		// $arr = array('ok' => 1);
		// $json = json_encode($datos);
		// echo $json;
	}else{
		$arr = array('tot' => -1);
		$json = json_encode($arr);
		echo $json;
	}
?>