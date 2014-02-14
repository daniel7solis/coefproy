<?php 
	if($_POST)
	{
		define('UPLOAD_DIR', 'images/pacientes/');
		$img = $_POST['imgBase64'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace('', '+', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR.2.'.jpg';
		$success = file_put_contents($file, $data);
	}
	else
	{
		echo '{"Fallo":"1"}';
	}
 ?>