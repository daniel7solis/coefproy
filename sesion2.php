<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" />
	<link rel="stylesheet" type="text/css" href="css/responsivelogin.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<!-- Daniel Code -->
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript">
		function sesion () {
			sessionStorage.setItem("id", json);
			document.location.href="perfil.php";
		}
	</script>
	<!-- Daniel code fin -->
</head>

<body>
	<?php
			$nombre=$_REQUEST['user'];
			$pass=$_REQUEST['password'];

			$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion); 
			$datos = mysql_query("select idUsuario,nombreUsuario,contrasena,semilla from usuarios where nombreUsuario='$nombre'",$conexion);
			echo 
			"<form name='login_form' action='sesion2.php' method='post'>
				<section id='login'>
					<p id='title'>Bienvenid@, inicia sesión:</p>
					<p id='user_fields'>
						<label id='user_label' for='user'></label>
						<input name='user' id='user' type='text' onkeyup='validar(this.value)' required>
						<br>
						<label  id='password_label' for='password'></label>
		    			<input name='password' id='password'type='password' onkeyup='validar(this.value)' required>
					</p>
					<p id='info'>
						<input type='checkbox'>&nbsp;Recuérdame</input><br>
						<a href='#'>¿Olvidaste tu contraseña?</a>
					</p>
					<p id='button_field'>
						<input type='submit' value='Iniciar sesión' id='login_button'/>
					</p>"; 
			
			if($arreglo=mysql_fetch_array($datos)){
				if($nombre==$arreglo['nombreUsuario']){
					$semilla=$arreglo['semilla'];
					$passF=hash("sha512", $pass.$semilla,false);
					if($passF==$arreglo['contrasena']){
						$arr=array('id' => $arreglo['idUsuario'], 'nombre' => $nombre);
						$json = json_encode($arr);
						// echo $json;
						echo "<script language='javascript'>";
						echo "var json='".$json."';";
						echo "sesion();";
						echo "</script>";
						/**/
						// header("location: perfil.php");
						// header("location: perfil.php?id=".$arreglo['idUsuario']."&nombre=".$arreglo['nombreUsuario']."&contrasena=".$arreglo['contrasena']);
						exit();
					}else{
						echo "<p>Usuario ó contraseña incorrecta, vuelve a intentarlo</p>";
					}
				}
				/*echo "<p>Usuario inexistente</p>";
				/*$mensaje="Usuario inexistente";
				die($mensaje);*/
			}else{
				echo "<p>Inserta nombre de usuario y contraseña</p>";
			}
			echo "</section>";
			echo "</form>";
	?>
</body>
</html>
8L8w8R4F
