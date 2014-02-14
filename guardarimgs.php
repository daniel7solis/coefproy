<?php 
	if(true)
	{
		define('UPLOAD_DIR', 'images/pacientes');
		$imagen = $_POST['img'];
		$option = $_POST['op'];
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