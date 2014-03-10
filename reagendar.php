<?php
	if($_POST)
	{
		$ident = $_POST['id'];
		$nuevahora = $_POST['h'];
		$nuevodia = $_POST['nd'];
		$nuevomes = $_POST['nm'];
		$nuevoano = $_POST['na'];
		$isthispat = $_POST['itp'];
		$sucursal = $_POST['suc'];
		if($nuevomes<10)
		{
			$nuevafecha = $nuevoano."-0".$nuevomes."-".$nuevodia;
		}
		else
		{
			$nuevafecha = $nuevoano."-".$nuevomes."-".$nuevodia;
		}
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion);
		$registros = mysql_query("select * from tempCitas where idCita='$ident'",$conexion);
		$datos = mysql_fetch_array($registros);
		$idCit=$datos['idCita'];
		$fech=$datos['fecha'];
		$hor=$datos['hora'];
		$idPacient=$datos['idPaciente'];
		$idDocto=$datos['idDoctor'];
		$minuto=$datos['minutos'];
		mysql_query("insert into citas (idCita, fecha, hora, idPaciente, idDoctor, minutos, isPac, idSucursal) values ('$idCit','$nuevafecha','$nuevahora','$idPacient','$idDocto','$minuto','$isthispat','$sucursal')",$conexion) or die(mysql_error());
		mysql_query("delete from tempCitas where idCita='$idCit'",$conexion) or die(mysql_error());
	}
	else
	{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "");
		$json = json_encode($arr);
		echo $json;
	}
?>