<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Agendar nueva cita</title>
	<!-- Hojas de estilos -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.10.4.custom/css/redmond/jquery-ui-1.10.4.custom.css" />
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/aplication.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
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
				<a id="deploy_menu" href="javascript:mostrar();"><figcaption></figcaption></a>
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
				<li id="agenda" class="current"><a href="agenda.php"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<section id="content">
			<div id='up_content'>
				<h2 id="content_title">Agendar</h2>
				<p id="content_subtitle">
				<span id="actual_day_numb"></span>/<span id="actual_month"></span>/<span id="actual_year"></span>&nbsp;&nbsp;&nbsp;&nbsp;
				<?PHP
					echo $_REQUEST['hora'];	 
				?>
				</p>
			</div>
			<article id="item_perfil">
			<div class='title_item_perfil'><p>Ingrese nombre y fecha nacimiento:</p></div>
				<div class='contenido_item_perfil'>
					<div class="fields_holder_chk">
						<div id="chk_name_label" class="new_user_labels" for="nombre"></div>
			   			<input name="nombre" id="chk_name" class="new_user_input_chk" type="text" placeHolder="Nombre" required>
			   		</div>
				   	<div class="fields_holder_chk">
				   		<div id="chk_date_label" class="new_user_labels" for="ap"></div>
				   		<input name="fecha" id="chk_date" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   	</div>
			   		<input id="new_user_submit2" type="submit" value="Siguiente" />
				</div>
			</article>
			<article id="new_patient" class="patient_check">
				<h3>NUEVO PACIENTE</h3>
				<hr class="inner_separator">
				<div class="fields_holder_chk">
						<div id="np_name_label" class="new_user_labels" for="nombre"></div>
			   			<input name="np_name" id="np_name" class="new_user_input_chk" type="text" placeHolder="Nombre" required>
			   		</div>
				   	<div class="fields_holder_chk">
				   		<div id="np_ap_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_ap" id="np_ap" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   	</div>
				   	<div class="fields_holder_chk">
						<div id="np_direction_label" class="new_user_labels" for="nombre"></div>
			   			<input name="np_direction" id="np_direction" class="new_user_input_chk" type="text" placeHolder="Nombre" required>
			   		</div>
				   	<div class="fields_holder_chk">
				   		<div id="np_age_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_age" id="np_age" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   	</div>
				   	<div class="fields_holder_chk">
						<div id="np_birth_label" class="new_user_labels" for="nombre"></div>
			   			<input name="np_birth" id="np_birth" class="new_user_input_chk" type="text" placeHolder="Nombre" required>
			   		</div>
				   	<div class="fields_holder_chk">
				   		<div id="np_email_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_email" id="np_email" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   	</div>
				   	<div class="fields_holder_chk">
				   		<div id="np_tel_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_tel" id="np_tel" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   	</div>
			</article>
			<article id="already_patient" class="patient_check">
				<h3>Id. NOMBRE</h3>
				<hr class="inner_separator">
				<p>Fecha de cita:</p>
			</article>
		<div id='down_content'></div>
		</section>
		<ul id="menu">
			<li><a class="menu_profile" href="perfil.php">&nbsp;&nbsp;Perfil</a></li>
			<li><a class="menu_conf" href="">&nbsp;&nbsp;Configuración de cuenta</a></li>
			<li id="rconfig"></li>
			<li><a class="menu_help" href="">&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href="">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coefficient &copy; 2014</p>
	</footer>

</body>
</html>