<?php
	if(/*$_POST*/true){
		// $idp=$_POST['idp'];
		$idp=1;
		$bandera=0;
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		$data = mysql_query("select cons,fPrimCon from Paciente where idPaciente='$idp'",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		$tiene=mysql_fetch_array($data);
		if($tiene[0]==1){//si tiene una consulta, por lo que se tiene que mostrar la vista de ingresar nueva consulta
			//ahora se verifica si ya se ingreso los datos de primera vez (primera consulta)
			if($tiene[1]==null){//si es null, no se ha llenado los datos de primera vez
				$bandera=0;//se pasa este argumento, para saber que se tiene que llenar los datos de primera vez
			}else{
				$bandera=1;//este parametro indica que se tiene una consulta, pero ya se llenaron los datos de primera vez
			}
		}else{//no tiene cita a una consulta, por lo que se tiene que mandar solo al listado
			$bandera=2;//este indica que solo se van a consultar las consultas jaja del paciente
		}
		$arr = array('ban' => $bandera);
		$json = json_encode($arr);
		echo $json;
	}else{
		$arr = array('ban' => -1);
		$json = json_encode($arr);
		echo $json;
	}
?>