<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		date_default_timezone_set('America/Los_Angeles');

		$script_tz = date_default_timezone_get();

		if (strcmp($script_tz, ini_get('date.timezone'))){
		    echo 'La zona horaria del script difiere de la zona horaria de la configuracion ini.';
		} else {
		    echo 'La zona horaria del script y la zona horaria de la configuración ini coinciden.';
		}
	?>
</body>
</html>