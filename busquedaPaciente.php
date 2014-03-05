<?php
	if($_POST){
		$cad="";
		$ind=0;
		$ap=strtolower($_POST['ap']);
		$d=str_split($_POST['dateB']);
		// $ap="cruz solis";strtolower($_POST['ap']);
		// $d="12-02-1992";/*str_split($_POST['dateB']);*/
		$dateB=$d[6].$d[7].$d[8].$d[9].$d[2].$d[3].$d[4].$d[2].$d[0].$d[1];//formateo la fecha aaaa-mm-dd
		/*Hacer de nuevo la conexion*/
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		$list_idPac=mysql_query("select idPaciente,nombre,apeidos,edad from Paciente where fecha_nac='$dateB'",$conexion);
		while($list=mysql_fetch_array($list_idPac)){
			if(strcmp((strtolower($list['apeidos'])),$ap)==0){
				$cad=$cad.',"'.$ind.'":{"nom":"'.$list['nombre'].'","ap":"'.$list['apeidos'].'","ed":"'.$list['edad'].'","id":"'.$list['idPaciente'].'"}';
				$ind++;
			}
		}
		echo '{"num":"'.$ind.'"'.$cad.'}';
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>