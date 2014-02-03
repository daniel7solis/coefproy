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
			<div id="up_content"><h2 id="content_title">Usuarios</h2><p id="nombre_user">Listado de Usuarios</p></div>
		<?php
			/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
			$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion); 
			/*fin para verificar*/
			$users=mysql_query("select * from usuarios",$conexion);
			while($arrUsers=mysql_fetch_array($users,MYSQLI_ASSOC)){
				echo 
				"<article class='item_perfil'>
					<div class='title_item_perfil'><p>$arrUsers[nombreUsuario]</p></div>
					<div class='contenido_item_perfil'>
						<p>ID: $arrUsers[idUsuario]<br>
						Nombre: $arrUsers[nombreUsuario]<br>
						Contraseña: $arrUsers[contrasena]</p>";
						$info=mysql_query("select * from permisosusuarios where idUsuarios='$arrUsers[idUsuario]'",$conexion);
						while($datos=mysql_fetch_array($info,MYSQLI_BOTH)){
							$modulo=mysql_query("select modName from modulos where idModulo='$datos[3]'",$conexion);
							$reg=mysql_fetch_array($modulo);
							$posicion=mysql_query("select posicionName from posicion where idPosicion='$datos[4]'",$conexion);
							$reg2=mysql_fetch_array($posicion);
							echo
							"<p>Numero de Permiso: $datos[0]<br>
							Modulo: $reg[0]<br>
							Posición: $reg2[0]<br>
							Sucursal: $datos[1]</p>";
						}
						echo 
					"</div>
				</article>";
			}	
		?>
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
Nombre
Direccion
Telefono
Foto
email
curp
rfc