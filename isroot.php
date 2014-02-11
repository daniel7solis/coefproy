<?php
	if($_POST){
		$nom=$_POST['user'];
		/*Verifico si es usuario root para mandar informcaión que se muestra en su perfil para configurar los usuarios*/
		$is_root="";
		if($nom=="root")
			$is_root="<a id='config' href='users.php'>&nbsp;&nbsp;Configuración de Usuarios</a>";
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