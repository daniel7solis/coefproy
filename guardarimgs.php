<?php 
	if(true)
	{
		$option = $_POST['op'];
		if(strcmp($option,"usuario")==0)
		{
			define('UPLOAD_DIR', 'images/users/');
		}
		else if(strcmp($option,"paciente")==0)
		{
			define('UPLOAD_DIR', 'images/pacientes/');
		}
		$imagen = $_POST['img'];
		$imagen = str_replace('data:image/png;base64,','', $imagen);
		$imagen = str_replace(' ','+', $imagen);
		$data = base64_decode($imagen);
		$file = UPLOAD_DIR.'1.png';
		$success = file_put_contents($file, $data);
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "");
		$json = json_encode($arr);
		echo $json;
	}
 ?>