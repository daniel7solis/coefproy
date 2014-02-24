<?php
	if($_POST){
		$idp=$_POST['idp'];
		/*Hacer de nuevo la conexion*/
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		/*Consulto los datos del permiso que se modificara*/
		$dataP=mysql_query("select idUsuarios,idSucursal,idModulo,idPosicion from permisosusuarios where idPermisos='$idp'",$conexion);
		$dataPerm=mysql_fetch_array($dataP);
		$idu=$dataPerm['idUsuarios'];
		/*Determino el nombre del puesto actual para mandarlo y lo muestre como referencia*/
		$modulo;
		switch ($dataPerm['idModulo']) {
			case 1:
				$modulo="Datos Generales";				
			break;
			case 2:
				$modulo="Marketing";			
			break;
			case 3:
				$modulo="Comercial/ventas";				
			break;
			case 4:
				$modulo="Agenda";
			break;
			case 5:
				$modulo="Produccion";		
			break;
			case 6:
				$modulo="Administracion";	
			break;
			case 7:
				$modulo="Finanzas";			
			break;
			default:
				$modulo="0";
				// header("location: setting_user.php");
			break;
		}
		$posicion;
		switch ($dataPerm['idPosicion']) {
			case 1:
				$posicion="Gerente De Departamento";				
			break;
			case 2:
				$posicion="Cabecera de Departamento";			
			break;
			case 3:
				$posicion="Cabecera fuera de Dep";				
			break;
			case 4:
				$posicion="Administrativo";
			break;
			case 5:
				$posicion="Secretario";		
			break;
			case 6:
				$posicion="Recepcionista";	
			break;
			case 7:
				$posicion="Empleado";			
			break;
			default:
				$posicion="0";
			break;
		}
		/*Consulto los datos del usuario al que le corresponde el permiso*/
		$dataU=mysql_query("select nombre from usuarios where idUsuario='$idu'",$conexion);
		$dataUser=mysql_fetch_array($dataU);
		/*Consulto el nombre de la sucursal*/
		$ids=$dataPerm['idSucursal'];
		$dataS=mysql_query("select nombreSucursal,direccionSucursal from Sucursal where idSucursal='$ids'",$conexion);
		$dataSuc=mysql_fetch_array($dataS);
		/*Creo la cedena JSON para enviar los datos para la modificación del permiso*/
		echo '{"dirs":"'.$dataSuc['direccionSucursal'].'","noms":"'.$dataSuc['nombreSucursal'].'","nom":"'.$dataUser['nombre'].'","mod":"'.$modulo.'","pos":"'.$posicion.'","idu":"'.$idu.'"}';//cadena JSON por la que viajan los datos quito suc al final no la uso
		//,"suc":"'.$dataPerm['idSucursal'].'"
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>