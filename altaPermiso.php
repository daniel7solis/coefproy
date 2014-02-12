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
		<?php
			$id=$_GET["id"];
			/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
			$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion); 
			/*fin para verificar*/
			$datos=mysql_query("select nombre from usuarios where idUsuario='$id'",$conexion)or die(mysql_error());
			$nombre=mysql_fetch_array($datos);
		?>
		<section id="content">
			<div id="up_content">
				<h2 id="content_title">Perfil nuevo</h2>
				<p id="content_subtitle"><?php echo $nombre[0] ?></p>
			</div>
			<article class='item_perfil'>
					<div class='title_item_perfil'><p>Datos Perfil:</p></div>
					<div class='contenido_item_perfil'>
						<form name="altaPermiso" id="altaPermiso" method="post" action="altaP.php" accept-charset="UTF-8">
							<div id="main_fields_holder">
								<div class="fields_holder">
									<div id="user_label" class="new_user_labels" for="sucursal"></div>
			   						<select name="sucursal">
			   							<?php
			   								$datos=mysql_query("select idSucursal,nombreSucursal,direccionSucursal from Sucursal",$conexion)or die(mysql_error());
			   								while($opciones=mysql_fetch_array($datos)){
			   									echo "<option value='$opciones[0]'>$opciones[1] | $opciones[2]</option>";
			   								}
			   							?>
			   						</select>
			   					</div>
			   					<br>
			   					<div class="fields_holder">
			   						<div id="ap_label" class="new_user_labels" for="modulo"></div>
			   						<select name="modulo">
			   							<?php
			   								$datos=mysql_query("select idModulo,modName from modulos",$conexion)or die(mysql_error());
			   								while($opciones=mysql_fetch_array($datos)){
			   									echo "<option value='$opciones[0]'>$opciones[1]</option>";
			   								}
			   							?>
			   						</select>
			   					</div>
			   					<br>
			   					<div class="fields_holder">
			   						<div id="dir_label" class="new_user_labels" for="posicion"></div>
			   						<select name="posicion">
			   							<?php
			   								$datos=mysql_query("select idPosicion,posicionName from posicion",$conexion)or die(mysql_error());
			   								while($opciones=mysql_fetch_array($datos)){
			   									echo "<option value='$opciones[0]'>$opciones[1]</option>";
			   								}
			   							?>
			   						</select>
			   					</div>
			   					<br>
		   					</div>	 
		   					<?php
		   						// hidden de el id de usuario
			   					echo "<input type='hidden' name='id' value='$id'>";
		   					?>  					
		   					<!-- Submit button -->
							<input id="new_user_submit" type="submit" value="Dar alta" />   
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