<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Pacientes</title>
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
		<aside>
			<article><img src="images/pacientes/1.png" /></article>
			<article><h4>Ultimas consultas</h4></article>
			<article>
				<div>Tipo de consulta</div>
				<div>Doctor que la hizo</div>
				<div>Fecha de esa consulta</div>
			</article>
			<article>
				<div>Tipo de consulta</div>
				<div>Doctor que la hizo</div>
				<div>Fecha de esa consulta</div>
			</article>
			<article>
				<div>Tipo de consulta</div>
				<div>Doctor que la hizo</div>
				<div>Fecha de esa consulta</div>
			</article>
			<article>
				<div>Tipo de consulta</div>
				<div>Doctor que la hizo</div>
				<div>Fecha de esa consulta</div>
			</article>
		</aside>
		<section id="content_users">
			<div id="up_content"><h2 id="content_title_users">Consultas</h2><p id="content_subtitle">Listado de Pacientes</p></div>
			<span id="users"><!-- AQUÍ SE GENERAN LOS USUARIOS --></span>
			<?php
			$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion);
			/*Selecciono a los pacientes, para mostrarlos en una tabla*/
			$datos = mysql_query("select idPaciente,nombre,apeidos,edad,tel,email,fProxCita from Paciente order by case when fProxCita is null then 1 else 0 end,fProxCita",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			echo "<table border=1>";
			echo "<tr><td>Nombre</td><td>Apellido</td><td>Edad</td><td>Telefono</td><td>Correo</td><td>Proxima cita</td></tr>";
			while ($arr=mysql_fetch_array($datos)){
				if($arr[6]==null){
					/*Mostramos los datos del paciente, cuando no tiene citas agendadas se muestra el mensaje*/
					echo "<tr><td style='display:none'>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>".$arr[3]."</td><td>
									".$arr[4]."</td><td>".$arr[5]."</td><td>No tiene</td></tr>";
				}else{
					/*Mostramos los datos del paciente, mostramos la fecha de la cita mas proxima*/
					echo "<tr><td style='display:none'>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>".$arr[3]."</td><td>
					".$arr[4]."</td><td>".$arr[5]."</td><td>".$arr[6]."</td></tr>";					
				}
			}
			/*Hago la busqueda de las citas y las ordeno por fecha de cita; en caso de existir dos citas 
			para un mismo paciente, selecciono la mas proxima*/ 
			echo "</table>";
			?>
		</section>
		<ul id='menu'>la configuración de usuarios y de perfil -->
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