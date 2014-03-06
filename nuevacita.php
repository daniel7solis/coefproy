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
	<script type="text/javascript" src="js/sesiones.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/aplication.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript">
		revisarSesion();
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
				<span id="actual_day_nom"></span>,&nbsp;&nbsp;<span id="actual_day_numb"></span>/<span id="actual_month"></span>/<span id="actual_year"></span>&nbsp;&nbsp;&nbsp;&nbsp;
				<span id="hora"></span>
				<?PHP
					// echo $_REQUEST['hora'];	 
				?>
				</p>
			</div>
			<article id="item_perfil">
			<div class='title_item_perfil'><p>Ingrese apellidos y fecha nacimiento:</p></div>
				<div class='contenido_item_perfil'>
					<div class="fields_holder_chk">
						<div id="chk_name_label" class="new_user_labels" for="nombre"></div>
						<!--input donde se tiene los apellidos del usuario-->
		   				<input name="apellido" id="chk_lastname" class="new_user_input_chk" type="text" placeHolder="Apellidos" required>
			   		</div>
				   	<div class="fields_holder_chk">
				   		<div id="chk_date_label" class="new_user_labels" for="ap"></div>
				   		<!--input donde se tiene la fecha de nacimiento-->
				   		<input name="fecha" id="chk_date" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   	</div>
				   	<!--Boton de envio de consulta para buscar al paciente-->
			   		<input id="new_user_submit2" type="submit" value="Siguiente" onclick="busq_paciente()" />
					<span id="lista"></span>
				</div>
			</article>
			<article id="new_patient" class="patient_check" style="display:none">
				<div class="contenido_item_perfil">
					<h3>NUEVO PACIENTE</h3>
					<hr class="inner_separator">
					<div class="fields_holder_chk">
						<div id="np_name_label" class="new_user_labels" for="nombre"></div>
			   			<input name="np_name" id="np_name" class="new_user_input_chk" type="text" placeHolder="Nombres" required>
			   		</div><br>
				   	<div class="fields_holder_chk">
				   		<div id="np_ap_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_ap" id="np_ap" class="new_user_input_chk" type="text" placeHolder="Apellidos" required>
				   		<div class="you_should_check">¡Verifique que los apeídos sean correctos!</div>
				   	</div><br>
				   	<div class="fields_holder_chk">
				   		<div id="np_fn_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_fn" id="np_fn" class="new_user_input_chk" type="text" placeHolder="Fecha nacimiento" required>
				   		<div class="you_should_check">¡Verifique que la fecha de nacimiento sea correcta!</div>
				   	</div><br>
				   	<div class="fields_holder_chk">
						<div id="np_direction_label" class="new_user_labels" for="nombre"></div>
			   			<input name="np_tel" id="np_tel" class="new_user_input_chk" type="text" placeHolder="Telefono movil" required>
			   		</div><br>
				   	<div class="fields_holder_chk">
				   		<div id="np_age_label" class="new_user_labels" for="ap"></div>
				   		<input name="np_email" id="np_email" class="new_user_input_chk" type="text" placeHolder="Email" required>
				   	</div>
				   	<!--Boton de registro de un nuevo paciente-->
				   	<input id="new_user_submit2" type="submit" value="Registrar" onclick="registrar_paci()" />
				</div>   	
			</article>
			<article id="already_patient" class="patient_check" style="display:none">
				<div class='title_item_perfil'><p>Datos de la cita</p></div>
				<form onsubmit="agendarCita()">
				<div class="contenido_item_perfil">
					<div id="name_already_patient">Nombre: <span id="nom"></span></div>
					<input type="hidden" name="idp" id="idp"/>
					<input type="hidden" name="isPac" id="isPac"/>
					<div id="duration_already_patient">Duración:
					<select name="dur" id="dur"/>
						<option value="15">0:15</option>
						<option value="30">0:30</option>
						<option value="45">0:45</option>
						<option value="60" selected>1</option>
						<option value="75">1:15</option>
						<option value="90">1:30</option>
						<option value="105">1:45</option>
						<option value="120">2</option>
						<option value="135">2:15</option>
						<option value="150">2:30</option>
						<option value="165">2:45</option>
						<option value="180">3</option>
						<option value="195">3:15</option>
						<option value="210">3:30</option>
						<option value="225">3:45</option>
						<option value="240">4</option>
					</select> hora(s)</div>
					<div>Doctor: <input type="number" id="doc" name="doc" required></div>
					<input type="submit" id="new_user_submit" value="Agendar" onclick="agendarCita()">
				</form>
				</div>
			</article>
		<div id='down_content'></div>
		</section>
		<ul id="menu">
			<li><a class="menu_profile" href="perfil.php">&nbsp;&nbsp;Perfil</a></li>
			<li><a class="menu_conf" href="">&nbsp;&nbsp;Configuración de cuenta</a></li>
			<li id="rconfig"></li>
			<li><a class="menu_help" href="">&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href="index.php" onclick="cerrarSesion()">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coefficient &copy; 2014</p>
	</footer>

</body>
</html>