<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Registro Usuario</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript" src="js/camera.js"></script>
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
		window.onload=modPerfil;//
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
			<!-- barra de navegación del sistema -->
				<li id="agenda"><a href="agenda.php"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<?php
			/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
			$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion); 
			/*fin para verificar*/

			/*Consulto la información del usuario al que se dara de alta el nuevo permiso*/
			// $datos=mysql_query("select nombre from usuarios where idUsuario='$id'",$conexion)or die(mysql_error());
			/*Convierto los datos de la consulta en un arreglo para poder manipularlo*/
			// $nombre=mysql_fetch_array($datos);
		?>
		<section id="content">
			<div id="up_content">
				<h2 id="content_title">Perfil modificación</h2>
				<!-- Muestro el nombre del usuario que se esta dando de alta -->
				<p id="content_subtitle"><span id="nom"></span></p>
			</div>
			<article class='item_perfil'>
					<div class='title_item_perfil'><p>Modificar Perfil:</p></div>
					<div class='contenido_item_perfil'>
						<form name="modPermiso" id="modPermiso" method="post" action="modificaP.php" accept-charset="UTF-8">
							<div id="main_fields_holder">
								<div class="fields_holder">
									<div id="user_label" class="new_user_labels" for="sucursal"></div>
									<label id="label_suc" for="suc"></label>
									<!--input id="suc" type="hidden" name="sucursal" readonly size="60" /-->
			   					</div>
			   					<br>
			   					<div class="fields_holder">
			   						<div id="ap_label" class="new_user_labels" for="modulo"></div>
			   						<label id="mod" for="modulo"></label>
			   						<select id="modulo" name="modulo">
			   							<?php
			   							/*Muestro en  una lista de seleccion los modulos en los que se puede dar de alta el nuevo usuario*/
			   								$datos=mysql_query("select idModulo,modName from modulos",$conexion)or die(mysql_error());
			   								while($opciones=mysql_fetch_array($datos)){
			   									if($opciones[0]!=8 && $opciones[0]!=9)
			   										echo "<option value='$opciones[0]'>$opciones[1]</option>";
			   								}
			   							?>
			   						</select>
			   					</div>
			   					<br>
			   					<div class="fields_holder">
			   						<div id="dir_label" class="new_user_labels" for="posicion"></div>
			   						<label id="pos" for="posicion"></label>
			   						<select id="posicion" name="posicion">
			   							<?php
			   							/*Muestro en  una lista de seleccion las posiciones en los que se puede dar de alta el nuevo usuario*/
			   								$datos=mysql_query("select idPosicion,posicionName from posicion",$conexion)or die(mysql_error());
			   								while($opciones=mysql_fetch_array($datos)){
			   									if($opciones[0]!=8 && $opciones[0]!=9)
			   										echo "<option value='$opciones[0]'>$opciones[1]</option>";
			   								}
			   							?>
			   						</select>
			   					</div>
			   					<br>
		   					</div>	 
		   				    <!-- // hidden de el id de permiso -->
			   				<input type='hidden' name='idu' id='idu'>
		   					<input type='hidden' name='idp' id='idp'>					
		   					<!-- Submit button -->
							<input id="new_user_submit" type="submit" value="Modificar" /> 
							<input id="cancelar" type="button" value="Cancelar" onclick="document.location.href='setting_user.php'" />   
						</form>
						<br>
					</div>
			</article>
		</section>
		<ul id='menu'>
		<!-- Menu de cuenta y configuraciones -->
			<li><a class='menu_profile' href='perfil.php'>&nbsp;&nbsp;Perfil</a></li>
				<li><a class='menu_conf' href=''>&nbsp;&nbsp;Configuración de cuenta</a></li>
				<li id="rconfig"></li>
				<li><a class='menu_help' href=''>&nbsp;&nbsp;Ayuda</a></li>
				<li><a class='close_session' href="index.php" onclick="cerrarSesion()">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coefficient &copy; 2014</p>
	</footer>

</body>
</html>