<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript">
		$( document ).ready(function()
			{
				$('#menu').hide();
				$('html').click(function() 
				{
					$('#menu').hide('swing');
				});
			});
		function mostrar()
		{
		$('#menu').toggle('swing');
		}
	</script>
</head>
<body>
	<header>
		<figure id="logo">
			<img src="images/logo.png" />
		</figure>
		<div id="right_wrapper">
			<a href="#" id="notifications">
				<span id="numb">3</span>
			</a>
			<figure id="avatar">
				<img src="images/avatar.jpg" />
				<a id="deploy_menu" href="javascript:mostrar()"><figcaption></figcaption></a>
			</figure>
		</div>
	</header>
	<div id="search_wrapper">
		<label id="glass" class="label" for="search"></label>
		<input id="search" class="search_field" type="text">
	</div>
	<div id="content_wrapper">
		<nav>
			<ul>
				<li id="agenda"><a href="agenda.php"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>

		<section id="content">
			<div id="up_content"><h2 id="content_title">Usuario nuevo</h2><p id="nombre_user">Registro de Usuario</p></div>
			<article class='item_perfil'>
					<div class='title_item_perfil'><p>Datos Personales -</p></div>
					<div class='contenido_item_perfil'>
						<p>
						<form name="alta" id="alta" method="post" action="alta.php" accept-charset="UTF-8">
							<label id="user_label" for="nombre">Nombres:</label>
		   					<input name="nombre" id="nombre" type="text" onkeyup="sentName(this.value)" required>
		   					<br>
		   					<label id="ap_label" for="ap">Apellidos:</label>
		   					<input name="ap" id="ap" type="text" onkeyup="showHind(this.value)" required>
		   					<br>
		   					<label id="dir_label" for="dir">Direccion:</label>
		   					<input name="dir" id="dir" type="text" required>
		   					<br>
		   					<label id="tel_label" for="tel">Telefono:</label>
		   					<input name="tel" id="tel" type="tel" required>
		   					<br>
		   					<label id="mail_label" for="mail">Email:</label>
		   					<input name="mail" id="mail" type="email" required>
		   					<br>
		   					<label id="curp_label" for="curp">CURP:</label>
		   					<input name="curp" id="curp" type="text" required>
		   					<br>
		   					<label id="rfc_label" for="rfc">RFC:</label>
		   					<input name="rfc" id="rfc" type="text" required>
		   					<br>
		   					<input type="submit" value="Registrar">
						</form>
						</p>
					</div>
			</article>
			<article class='item_perfil'>
					<div class='title_item_perfil'><p>Datos Cuenta -</p></div>
					<div class='contenido_item_perfil'>
						<p>Nombre Usuario:<span id="to_user"></span><br>
						Contraseña:<span id="to_pass"></span><br>
						</p>
					</div>
			</article>
		</section>
		<ul id='menu'>
			<li><a class='menu_profile' href='perfil.php'>&nbsp;&nbsp;Perfil</a></li>
				<li><a class='menu_conf' href=''>&nbsp;&nbsp;Configuración de cuenta</a></li>
				<li><a class='menu_help' href=''>&nbsp;&nbsp;Ayuda</a></li>
				<li><a class='close_session' href=''>Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>