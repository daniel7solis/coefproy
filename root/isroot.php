<?php
	if($_POST){
		$id=$_POST['id'];
		$nom=$_POST['user'];
		/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
		$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		// Defino que la conexion con la base de datos sera con la codificacion UTF-8
		mysql_set_charset("utf8", $conexion); 
		/*fin para verificar*/
		/*verifico la sucursal a la que pertenece el usuario, para mostrar solo los usuarios correspondientes en "users.php"*/
		$datos=mysql_query("select idSucursal from permisosusuarios where idUsuarios='$id'",$conexion)or die("Problemas en la consulta la base de datos ".mysql_error());
		$ids=mysql_fetch_array($datos);
		/*Verifico si es usuario root para mandar informcaión que se muestra en su perfil para configurar los usuarios*/
		$is_root="";
		if($nom=="root")
			$is_root="<a id='config' href='usersroot.php?suc=$ids[0]'>&nbsp;&nbsp;Configuración de Usuarios</a>";
		else
			$is_root="";

		/*Cadena con formato json*/
		$cadenaJson='{"rc":"'.$is_root.'"}';
		// $cadenaJson='{"rc":"hola"}';
		echo $cadenaJson;
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('rc' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>