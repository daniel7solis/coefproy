<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/sesiones.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript">
	revisarSesion();
		$( document ).ready(function()
			{
				var ses = sessionStorage.getItem("id");
				var idim = JSON.parse(ses);
				$('#deploy_menu').prepend("<img src='images/users/"+idim.id+".png' />");
				
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
		// mando ejecutar la función de usuarios donde obtengo los usuarios a mostrar en la pagina dentro del span "users"
		// window.onload=usuarios();
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
			<!-- barra de navegación del sistema -->
				<li id="agenda"><a href="agenda.php"></a></li>
				<li id="patients"><a href="pacientes.php"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<section id="content_users">
			<div id="up_content"><h2 id="content_title_users">Primera vez</h2><p id="content_subtitle">Nombre del paciente</p></div>
		<form name="form" action="saveConsul.php" method="post" accept-charset="UTF-8">
			Fecha de consulta consecutiva: <input type="date" name="consCons"><!--Aqui va la fecha del momento en que se guardan estos datos-->
			Peso: <input type="number" name="peso">
			TA: <input type="number" name="ta"><br>
			Fecha de nacimiento: <input type="date" name="fn">
			Edad: <input type="number" name="edad"><hr>
			Antecedenetes Heredo Familiares AHF<br><input type="text" name="ahf"><hr>
			Antecedentes Personales Patologicos APP<br>
			Varicela:<input type="text" name="varicela">
			Rubeola:<input type="text" name="rubeola">
			Sarampión:<input type="text" name="sarampion">
			Parotiditis:<input type="text" name="parotiditis">
			Friebre reumática:<input type="text" name="fiebre">
			Otros:<input type="text" name="otros">
			Qx:<input type="text" name="qx">
			Fx:<input type="text" name="fx">
			Alergias:<input type="text" name="alergias">
			Hospitalizaciones:<input type="text" name="hospita">
			<hr>
			Antecedentes Personales No Patologicos AP No P<br>
			Alimentación:<input type="text" name="alimen">
			Tabaquismo:<input type="text" name="tabaquismo">
			Alcoholismo:<input type="text" name="alcoholismo">
			Transfusiones:<input type="text" name="trans">
			Grupo y RH:<input type="text" name="rh">
			<hr>
			AGO<br>
			Menarca:<br>
			G<input type="text" name="g">
			P<input type="text" name="p">
			C<input type="text" name="c">
			A<input type="text" name="a">
			IVSA:<input type="text" name="ivsa">
			#PAR:<input type="text" name="par">
			FUM:<input type="text" name="fum">
			Ritmo<input type="text" name="ritmo"><br>
			Disminorrea:<input type="text" name="dism">
			Dispareunia:<input type="text" name="disp">
			FUPAP:<input type="text" name="fupap">
			MPF:<input type="text" name="mpf">
			Embarazos previstos:<input type="text" name="emb"><br>			
			Tumuraciones mamas:<input type="text" name="tum_mamas"><br>
			Infecciones genitales:<input type="text" name="inf_genitales">
			Ardor:<input type="text" name="ardor">
			Prurito:<input type="text" name="prurito"><br>
			<input type="submit" value="Guardar">
		</form>
		</section>
		<ul id='menu'>
		<!-- Menu desplegable para la configuración de usuarios y de perfil -->
			<li><a class='menu_profile' href='perfil.php'>&nbsp;&nbsp;Perfil</a></li>
				<li><a class='menu_conf' href=''>&nbsp;&nbsp;Configuración de cuenta</a></li>
				<li id="rconfig"></li>
				<li><a class='menu_help' href=''>&nbsp;&nbsp;Ayuda</a></li>
				<li><a class='close_session' href="index.php" onclick="cerrarSesion()">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>