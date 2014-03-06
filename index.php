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
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
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
	<form name="login_form" action="sesion2.php" method="post" accept-charset="UTF-8">
		<section id="login">
			<!--figure>
				<img src="images/user.png" />
			</figure-->
			<p id="title">
				Bienvenid@, inicia sesión:
			</p>
			<p id="user_fields">
				<label id="user_label" for="user"></label>
		   		<input name="user" id="user" type="text" onkeyup="validar(this.value)" required>
		   		<br>
		   		<label id="password_label" for="password"></label>
		   		<input name="password" id="password" type="password" onkeyup="validar(this.value)" required>
			</p>
			<p id="info">
				<a href="javascript:showModal();">¿Olvidaste tu contraseña?</a>
			</p>
			<p id="button_field">
				<input id="login_button" type="submit" value="Iniciar sesión" />
			</p>
		</section>
	</form>
	<div id="modal_forgot">
		<h4>Para recuperar tu contraseña:</h4>
		<form id="modal_form_forgot" name="forgot_form" action="resetPass.php" method="post" accept-charset="UTF-8">
			<input class="restore" type="text" name="user" placeHolder="Ingresa tu nombre de usuario" required/><br>
			<input class="restore" type="text" name="curp" placeHolder="Ingresa tu CURP" required/>
			<input class="go_btn" type="submit" value="Aceptar"/>
		</form>
	</div>
</body>
</html>