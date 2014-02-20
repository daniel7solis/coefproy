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
		/*cargo la función de sesionPerfil al cargar el archivo*/
		window.onload=sesionPerfil();
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
				<li id="agenda"><a href="agenda.php"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<section id='content'>
			<div id='up_content'><h2 id='content_title'>Perfil</h2><p id='content_subtitle'><span class="nom"></span></p></div>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Datos Generales:</p></div>
				<div class='contenido_item_perfil'>
					<p id="profile_pic"><span id="id_img"></span><span id="user"></span></p>
					<div id="data_holder">
						<p id="personal_data">Nombre: <span class="nom"></span><br>
						Dirección: <span id="dir"></span><br>
						Telefono: <span id="tel"></span><br>
						Email: <span id="email"></span></p>
						<p id="other_data">CURP: <span id="curp"></span><br>
						RFC: <span id="rfc"></span></p>
					</div>
				</div>
			</article>
			<article class='item_perfil_in'>
				<div class='title_item_perfil'><p>Aspecto Laboral -</p></div>
				<div class='contenido_item_perfil'>
					 <!-- Aqui van los "n" perfiles que puede tener el usuario -->
					<span id="perf"><br></span>
				</div>
			</article>
			<article class='item_perfil_in'>
				<div class='title_item_perfil'><p>Permisos -</p></div>
				<div class='contenido_item_perfil'>
					<!-- Aqui van los "n" permisos que puede tener el usuario -->
					<span id="perm"></span>
		 		</div>
			</article>
			<div id='down_content'></div>
		</section>
		<ul id='menu'>
			<li><a class='menu_profile' href='perfil.php'>&nbsp;&nbsp;Perfil</a></li>
			<li><a class='menu_conf' href='#'>&nbsp;&nbsp;Configuración de cuenta</a></li>
			<li id="rconfig"></li>
			<li><a class='menu_help' href='#'>&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href='index.php' onclick="cerrarSesion()">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>