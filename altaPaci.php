<?php
	$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
	mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
	mysql_set_charset("utf8", $conexion); 
	/*fin para verificar*/
	$nombre=$_REQUEST['nombre'];
	$ap=$_REQUEST['ap'];
	$dir=$_REQUEST['dir'];
	$age=$_REQUEST['age'];
	$bir=$_REQUEST['bir'];
	$mail=$_REQUEST['mail'];
	$tel=$_REQUEST['tel'];
	$suc=$_REQUEST['suc'];
	mysql_query("insert into Paciente (idPaciente, nombre, apeidos, direccion, edad, fecha_nac, email,tel,idSucursal)
	 values (null,'$nombre','$ap','$dir','$age','$bir','$mail','$tel','$suc')",$conexion) or die(mysql_error());
	$seleccionado = mysql_query("select idPaciente from Paciente where nombre='$nombre' and fecha_nac='$bir'");
	$ok=mysql_fetch_array($seleccionado);
	$id=$ok['idPaciente'];
	echo "<script language='javascript'> var idimg = $id; alert(idimg); </script>";
?>
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
	<script type="text/javascript" src="js/sesiones.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript" src="js/camera.js"></script>
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
				<li id="patients"><a href="pacientes.php"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>

		<section id="content">
			<div id="up_content">
				<h2 id="content_title">Usuario nuevo</h2>
				<p id="content_subtitle">Fotografía de perfil</p>
			</div>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Tome o cargue la foto:</p></div>
					<div class='contenido_item_perfil'>
		   				<!-- Take a picture -->
		   				<div id="photos_holder">
			   				<div class="photo_container">
						    	<div class="photo_frame_title">Cámara</div>
						    	<video id="camera" autoplay></video>
						    	<input id='start_camera' class='test' type='button' value = 'Iniciar' />
							    <input id='stop_camera' type='button' value = 'Detener' />
							    <div id="miniholder">
							    <input id='take_photo' type='button' value = 'Tomar foto'></input>
							    </div>
							</div>
							<div class="photo_container">
						    	<div class="photo_frame_title">Foto</div>
						    	<canvas id="photo" ></canvas>
							</div>
						</div>
		   				<div id="optional_photo">
			   					Si no puede usar la cámara, cargue una foto: 
			   					<input id='upload_photo' type='file' />
			   					<p id="atention">¡La imágen debe ser de <strong>250px</strong> de largo por <strong>187px</strong> de ancho!</p>
			   			</div>
						<div id="button_holder_down">
							<input id="new_user_submit" type="submit" value="Registrar" />   
						</div>
					</div>
				</div>
			</article>
		</section>
		<ul id='menu'>
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