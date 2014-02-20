<?php
	if($_POST){
		$suc=$_POST['suc'];
		$cadena="";
		$totalPer="";
		$cont=0; //Contador de numero de usuarios encontrados
		$contP=0; //Contador de numero de permisos encontrados
		$x=1;//subindice de usuarios que se concatena en la cadena para JSON
		$y=1;//subindice de perfiles que se concatena en la cadena para JSON
		/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		/*fin para verificar*/
		$list_idusers=mysql_query("select distinct idUsuarios from permisosusuarios where idSucursal='$suc' order by idUsuarios",$conexion);
		while ($arreglo=mysql_fetch_array($list_idusers, MYSQLI_BOTH)){
			$cadena=$cadena.",";
			$cont++;
			$idu=$arreglo['idUsuarios'];
			$userdata=mysql_query("select * from usuarios where idUsuario='$idu'",$conexion) or die("Problemas en la consulta ".mysql_error());
			$arruser=mysql_fetch_array($userdata);
			$info=mysql_query("select idSucursal,idModulo,idPosicion from permisosusuarios where idUsuarios='$idu'",$conexion);
			//aqui tengo q iniciar el ciclo para los "n" perfiles que puede tener el usuario
			//$datos=mysql_fetch_array($info,MYSQLI_BOTH);
			//necesito otra variable que me controle el acceso a los datos segun la posicion del arreglo
			while($datos=mysql_fetch_array($info,MYSQLI_BOTH)){
				$modulo=mysql_query("select modName from modulos where idModulo='$datos[1]'",$conexion);
				$reg=mysql_fetch_array($modulo);
				$posicion=mysql_query("select posicionName from posicion where idPosicion='$datos[2]'",$conexion);
				$reg2=mysql_fetch_array($posicion);
				$totalPer=$totalPer.',"perfil'.$y.'":{"mod":"'.$reg[0].'","pos":"'.$reg2[0].'"}';
				$contP++;
				$y++;
			}
			$y=1;
			$modulo=mysql_query("select modName from modulos where idModulo='$datos[1]'",$conexion);
			$reg=mysql_fetch_array($modulo);
			$posicion=mysql_query("select posicionName from posicion where idPosicion='$datos[2]'",$conexion);
			$reg2=mysql_fetch_array($posicion);
			$cadena=$cadena.'"usuario'.$x.'":{"id":"'.$idu.'","nomUser":"'.$arruser['nombreUsuario'].'","nom":"'.$arruser['nombre'].'","totPer":"'.$contP.'"'.$totalPer.'}';//,"ph":"'.$idu.'
			$x++;
			$contP=0;
			$totalPer="";
		}
		echo '{"num":'.$cont.''.$cadena.',"s":"'.$suc.'"}';//cadena JSON por la que viajan los datos
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>