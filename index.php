<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Login</title>
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC|Gafata|Pathway+Gothic+One' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" />
	<link rel="stylesheet" type="text/css" href="css/responsivelogin.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<!-- Daniel Code -->
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<!-- Daniel code fin -->
</head>

<body>
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
				<input type="checkbox">&nbsp;Recuérdame</input><br>
				<a href="#">¿Olvidaste tu contraseña?</a>
			</p>
			<p id="button_field">
				<input id="login_button" type="submit" value="Iniciar sesión" />
			</p>
		</section>
	</form>
</body>
</html>