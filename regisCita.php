<?php
	if($_POST){
		$f=$_POST['fecha'];//"2014-03-05";//
	    $h=$_POST['hora'];//"7:00pm";	        
	    $p=$_POST['idp'];//1;//
	    $d=$_POST['idd'];#1;//
	    $m=$_POST['min'];//60;//
		$i=$_POST['isPac'];//0;//
		$s=$_POST['suc'];//1;//
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		mysql_query("insert into citas (fecha,hora,idPaciente,idDoctor,minutos,isPac,idSucursal)
		 values ('$f','$h','$p','$d','$m','$i','$s')",$conexion) or die(mysql_error());
		// echo '{"ok":"1"}';
		$arr = array('ok' => 1);
		$json = json_encode($arr);
		echo $json;
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>