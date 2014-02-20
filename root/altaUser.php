<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Registro Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/responsive.css" />
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="js/checkroot.js"></script>
	<script type="text/javascript" src="../js/prefixfree.min.js"></script>
	<script type="text/javascript" src="../js/ValAndAltauser.js"></script>
	<script type="text/javascript" src="../js/camera.js"></script>
	<script type="text/javascript">
	revisarSesion();
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
			<img src="../images/logo.png" />
		</figure>
		<div id="right_wrapper">
			<a href="#" id="notifications">
				<span id="numb">3</span>
			</a>
			<figure id="avatar">
				<img src="../images/avatar.jpg" />
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
			<div id="up_content">
				<h2 id="content_title">Usuario nuevo</h2>
				<p id="content_subtitle">Registro de Usuario</p>
			</div>
			<article class='item_perfil'>
					<div class='title_item_perfil'><p>Datos Personales:</p></div>
					<div class='contenido_item_perfil'>
						<form name="alta" id="alta" method="post" action="alta.php" accept-charset="UTF-8">
							<div id="main_fields_holder">
								<div class="fields_holder">
									<div id="user_label" class="new_user_labels" for="nombre"></div>
			   						<input name="nombre" id="nombre" class="new_user_input" type="text" onkeyup="sentName(this.value)" placeHolder="Nombre" required>
			   					</div>
			   					<div class="fields_holder">
			   						<div id="ap_label" class="new_user_labels" for="ap"></div>
			   						<input name="ap" id="ap" class="new_user_input" type="text" onkeyup="showHind(this.value)" placeHolder="Apellidos" required>
			   					</div>
			   					<div class="fields_holder">
			   						<div id="dir_label" class="new_user_labels" for="dir"></div>
			   						<input name="dir" id="dir" class="new_user_input" type="text" placeHolder="Direccion" required>
			   					</div>
			   					<div class="fields_holder">
			   						<div id="tel_label" class="new_user_labels" for="tel"></div>
			   						<input name="tel" id="tel" class="new_user_input" type="text" maxlength="10" placeHolder="Teléfono" required>
			   					</div>
			   					<div class="fields_holder">
			   						<div id="mail_label" class="new_user_labels" for="mail"></div>
			   						<input name="mail" id="mail" class="new_user_input" type="text" placeHolder="E-mail" required>
			   					</div>
			   					<div class="fields_holder">
			   						<div id="curp_label" class="new_user_labels" for="curp"></div>
			   						<input name="curp" id="curp" class="new_user_input" type="text" placeHolder="CURP" required>
			   					</div>
			   					<div class="fields_holder">
			   						<div id="rfc_label" class="new_user_labels" for="rfc"></div>
			   						<input name="rfc" id="rfc" class="new_user_input" type="text" placeHolder="RFC" required>
			   					</div>
			   					<div id="vertical_spacer">
			   					</div>
		   					</div>
							<input name="to_user" id="to_user" type="Hidden"/>
		   					<input name="to_pass" id="to_pass" type="text"/>
							<!-- Submit button -->
							<input id="new_user_submit" type="submit" value="Continuar" />   
						</form>
						<br>
					</div>
			</article>
		</section>
		<ul id='menu'>
			<li><a class='menu_profile' href='perfil.php'>&nbsp;&nbsp;Perfil</a></li>
				<li><a class='menu_conf' href=''>&nbsp;&nbsp;Configuración de cuenta</a></li>
				<li id="rconfig"></li>
				<li><a class='menu_help' href=''>&nbsp;&nbsp;Ayuda</a></li>
				<li><a class='close_session' href=''>Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coefficient &copy; 2014</p>
	</footer>

</body>
</html>