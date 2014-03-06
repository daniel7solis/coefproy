<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" />
	<link rel="stylesheet" type="text/css" href="css/responsivelogin.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/sesiones.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript">
		revisarSesionIndex();
		function hideAdvice()
		{
			$('header').hide('linear');
		}
		function showModal()
		{
			$('#modal_forgot').dialog({
		      modal: true
		    });
		    $('.ui-button-text').html('x');
		    $('#modal_forgot').css({'width':'265px'});
		}
	</script>
</head>

<body>
<header>
	<p id="advice">Para una mejor <span class="enhanced1">funcionalidad</span> y <span class="enhanced1">experiencia</span>, se recomienda usar un navegador actualizado.</p>
	<a id="advice_close" href="javascript:hideAdvice();"><strong>x</strong></a>
</header>
	<?php
			$nombre=$_REQUEST['user'];
			$pass=$_REQUEST['password'];
			$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion); 
			$datos = mysql_query("select idUsuario,nombreUsuario,contrasena,semilla from usuarios where nombreUsuario='$nombre'",$conexion);
			// consulto en permisos el id de sucursal
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
					";
			
			if($arreglo=mysql_fetch_array($datos)){
				if($nombre==$arreglo['nombreUsuario']){
					$semilla=$arreglo['semilla'];
					$passF=hash("sha512", $pass.$semilla,false);
					if($passF==$arreglo['contrasena']){
						$su=$arreglo['idUsuario'];
						$datos=mysql_query("select idSucursal from permisosusuarios where idUsuarios='$su'",$conexion) or die("Problemas en la consulta ".mysql_error());
						$suc=mysql_fetch_array($datos);
						$arr=array('id' => $arreglo['idUsuario'], 'nombre' => $nombre,'idd' => $passF,'s' => $suc['idSucursal']);
						$json = json_encode($arr);
						echo "<script language='javascript'>";
						echo "var json='".$json."';";#creo un objeto json para almacenar los datos
						echo "sesion();";
						echo "</script>";
						// header("location: perfil.php");
						exit();
					}else{
						echo "<p id='error_message'>Usuario ó contraseña incorrecta, vuelve a intentarlo.</p>";
					}
				}
			}else{
				echo "<p id='error_message'>Inserta nombre de usuario y contraseña.</p>";
			}echo "<p id='info'>
						<a href='javascript:showModal();'>¿Olvidaste tu contraseña?</a>
					</p>
					<p id='button_field'>
						<input type='submit' value='Iniciar sesión' id='login_button'/>
					</p>"; 
			echo "</section>";
			echo "</form>";
	?>
	<script type="text/javascript">$(function(){$('#user').css({'border':'1px solid #c0392b'});$('#password').css({'border':'1px solid #c0392b'});}());</script>
	<div id="modal_forgot">
		<h4>Para recuperar tu contraseña:</h4>
		<form id="modal_form_forgot" name="forgot_form" action="resetPass.php" method="post" accept-charset="UTF-8">
			<input class="restore" type="text" name="user" placeHolder="Ingresa tu nombre de usuario" required/><br>
			<input class="restore" type="text" name="curp" placeHolder="Ingresa tu nombre de CURP" required/>
			<input class="go_btn" type="submit" value="Aceptar"/>
		</form>
	</div>
</body>
</html>
