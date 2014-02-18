<?php
	if($_POST){
		$suc=$_POST['suc'];
		$cadena="";
		$cont=0; //Contador de numero de usuarios encontrados
		$x=1;//subindice que se concatena en la cadena para JSON
		/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
		// $conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		/*fin para verificar*/
		$list_idusers=mysql_query("select idUsuarios from permisosusuarios where idSucursal='$suc'",$conexion);
		while ($arreglo=mysql_fetch_array($list_idusers, MYSQLI_BOTH)){
			$cadena=$cadena.",";
			$cont++;
			$idu=$arreglo['idUsuarios'];
			$userdata=mysql_query("select * from usuarios where idUsuario='$idu'",$conexion) or die("Problemas en la consulta ".mysql_error());
			$arruser=mysql_fetch_array($userdata);
			$info=mysql_query("select idSucursal,idModulo,idPosicion from permisosusuarios where idUsuarios='$idu'",$conexion);
			$datos=mysql_fetch_array($info,MYSQLI_BOTH);
			$modulo=mysql_query("select modName from modulos where idModulo='$datos[1]'",$conexion);
			$reg=mysql_fetch_array($modulo);
			$posicion=mysql_query("select posicionName from posicion where idPosicion='$datos[2]'",$conexion);
			$reg2=mysql_fetch_array($posicion);
			$cadena=$cadena.'"usuario'.$x.'":{"nomUser":"'.$arruser['nombreUsuario'].'","nom":"'.$arruser['nombre'].'","mod":"'.$reg[0].'","pos":"'.$reg2[0].'","ph":"'.$idu.'"}';
			$x++;
		}
		echo '{"num":'.$cont.''.$cadena.',"s":"'.$suc.'"}';//cadena JSON por la que viajan los datos
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>