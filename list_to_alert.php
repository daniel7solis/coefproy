<?php
	$lista_alert;
	$list;
	$ind=0;
	$cad="";
	date_default_timezone_set("America/Mexico_City");
	$fechaG=getdate();/*Fecha de hoy, capturada del sistema*/
	/*Capturamos los datos del arreglo fechaG y convertimos la fecha*/
	$fechaJ=gregoriantojd($fechaG['mon'],$fechaG['mday'],$fechaG['year']);/*Convertimos la fecha de Gregoriano a Julian date*/
	$fechaJ=$fechaJ+0;/*Sumamos la cantidad de dias de anticipacion que será la alarma*/
	$arr=cal_from_jd($fechaJ,CAL_GREGORIAN);/*convertimos la fecha Juliana a Gregoriano*/
	$d=$arr['day'];
	if(strlen($arr['day'])==1)/*Pregunto si el dia es de un solo digito, si lo es concateno un "0" por que en la DB tiene dos digitos*/
		$m="0".$arr['day'];
	$m=$arr['month'];
	if(strlen($arr['month'])==1)/*Igual que en el dia, si solo es 1 dig. antepongo un "0"*/
		$m="0".$arr['month'];
	$fechaBusq=$arr['year']."-".$m."-".$d;/*Damos el formato que se tiene
	en la DB para hacer la busqueda de las citas*/
	$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*
	
	CON EL CAMBIO DE LA TABLA DE CITAS (EL CAMPO SI ES PACIENTE REGISTRADO O NO "ISPAC")
	SE NECESITA CONSULTAR ESTE CAMPO PARA SABER A QUE TABLA SE VA A IR A BUSCAR EL CORREO
	Y LOS DATOS DEL PACIENTE, SI ES EN LA TABLA DE PACIENTES O EN LA DE NEWPACIENTE

	*/
	$datos = mysql_query("select idPaciente from citas where fecha='$fechaBusq'",$conexion);
	while ($paci=mysql_fetch_array($datos)) {
		$idp=$paci[0];
		$d=mysql_query("select nombre,apeidos,email,tel from Paciente where idPaciente='$idp'",$conexion);
		$a=mysql_fetch_array($d,MYSQLI_ASSOC);
		$cad=$cad.',"id'.$ind.'":'.json_encode($a);
		$ind++;
	}
	// echo '{"cant":"'.$ind.'"'.$cad.'}';
	$Ojson='{"cant":"'.$ind.'"'.$cad.'}';
	// echo $fechaBusq;
?>