<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Agendar nueva cita</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="jquery-ui-1.10.4/ui/jquery-ui.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript">
		$( document ).ready(function()
			{
				$('#menu').hide();
				$('html').click(function() 
				{
					$('#menu').hide('swing');
				});
				$('#chk_date').datepicker();
			});
		function mostrar()
		{
		$('#menu').slideToggle('swing');
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
				<h2 id="content_title">Nueva cita</h2>
			</div>
			<article id="check_patient_type">
				<h4>Ingrese nombre y fecha de nacimiento del paciente:</h4>
				<div class="fields_holder">
					<div id="chk_name_label_chk" class="new_user_labels" for="nombre"></div>
			   		<input name="nombre" id="chk_name" class="new_user_input" type="text" placeHolder="Nombre" required>
			   	</div>
			   	<br>
			   	<div class="fields_holder">
			   		<div id="chk_date_label_chk" class="new_user_labels" for="ap"></div>
			   		<input name="fecha" id="chk_date" class="new_user_input" type="text" placeHolder="Fecha" required>
			   	</div>
			   	<input id="new_user_submit" type="submit" value="Siguiente" />
			</article>
			<br><br>
			<article id="new_patient">
				<h3>Nuevo paciente</h3>
				<p>Nombre:</p>
				<p>Fecha de cita:</p>
			</article>
			<article id="already_patient">
				<h3>Id. paciente:</h3>
				<h3>Nombre:</h3>
				<p>Fecha de cita:</p>
			</article>
			<div id="quick_access">
			<ul>
				<li><a id="new" href="nuevacita.php"></a></li>
				<li><a id="look" href="#"></a></li>
				<li><a id="manage" href="#"></a></li>
				<li><a id="print" href="#"></a></li>
			</ul>
			</div>
		<div id='down_content'></div>
		</section>
		<ul id="menu">
			<li><a class="menu_profile" href="perfil.php">&nbsp;&nbsp;Perfil</a></li>
			<li><a class="menu_conf" href="">&nbsp;&nbsp;Configuración de cuenta</a></li>
			<li><a class="menu_help" href="">&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href="">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>