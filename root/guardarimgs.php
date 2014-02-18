<?php 
	if(true)
	{
		$option = $_POST['op'];
		$ident = $_POST['id'];
		$imagen = $_POST['img'];
		$imagen = str_replace('data:image/png;base64,','', $imagen);
		$imagen = str_replace(' ','+', $imagen);
		$data = base64_decode($imagen);
		if(strcmp($option, "usuario")==0)
		{
			$file = '../images/users/'.$ident.'.png';
		}
		else if(strcmp($option, "paciente")==0)
		{
			$file = '../images/pacientes/'.$ident.'.png';
		}
		$success = file_put_contents($file, $data);
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "");
		$json = json_encode($arr);
		echo $json;
	}
 ?>
