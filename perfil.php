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
		<?php
			$id=$_GET['id'];
			$nombre=$_GET['nombre'];
			$pass=$_GET['contrasena'];
			echo
		"<section id='content'>
			<div id='up_content'><h2 id='content_title'>Perfil</h2><p id='content_subtitle'>$nombre</p></div>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Datos Generales -</p></div>
				<div class='contenido_item_perfil'>
					<p>ID: $id<br>
					Nombre: $nombre<br>
					Contraseña: $pass</p>
				</div>
			</article>";
			/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
<<<<<<< HEAD
			$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
=======
			$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
			mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
			mysql_set_charset("utf8", $conexion); 
>>>>>>> b26d03eec46ecac49df9f1fdef99594a7ce18d8e
			/*fin para verificar*/
			$datos=mysql_query("select * from permisosusuarios where idUsuarios='$id'",$conexion);
			$cont=0;
			$x=1;
			while ($arreglo=mysql_fetch_array($datos, MYSQLI_BOTH)){
				$codestring='$perfil'.$x.';';
				eval($codestring);
				for ($i=0; $i <count($arreglo)/2; $i++) { 
					$codestring='$perfil'.$x.'[$i]=$arreglo[$i];';
					eval($codestring);
				}
				$x++;
				$cont++;
			}
			$cont_r=$cont;
			$x=1;//regreso variable a 1 
			echo 
			"<article class='item_perfil'>
				<div class='title_item_perfil'><p>Aspecto Laboral -</p></div>
				<div class='contenido_item_perfil'>";
				while ($cont>0) {
						$codestring='$z=$perfil'.$x.'[0];';
						eval($codestring);
						print "<p>Numero de Permiso: ".$z."<br>";
						$codestring='$z=$perfil'.$x.'[3];';
						eval($codestring);
						/*Capturar los tipos de modulos que puede ser el usuario*/
						$codestring='$mod'.$x.'='.$z.';';
						eval($codestring);
						/**/
						$modulo=mysql_query("select modName from modulos where idModulo='$z'",$conexion);
						$reg=mysql_fetch_array($modulo);
						print "Modulo: ".$reg[0]."<br>";
						$codestring='$z=$perfil'.$x.'[4];';
						eval($codestring);
						/*Capturar los tipos de posicion  que puede ser el usuario*/
						$codestring='$pos'.$x.'='.$z.';';
						eval($codestring);
						/**/
						$posicion=mysql_query("select posicionName from posicion where idPosicion='$z'",$conexion);
						$reg2=mysql_fetch_array($posicion);
						print "Posición: ".$reg2[0]."<br>";
						$codestring='$z=$perfil'.$x.'[1];';
						eval($codestring);
						print "Sucursal: ".$z."</p>";
						$cont--;
						$x++;
					}
					$x=1;
			echo
				"</div>
			</article>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Permisos -</p></div>
				<div class='contenido_item_perfil'>";
				for ($i=1; $i <= $cont_r; $i++) { 
					$codestring='$m=$mod'.$i.';';
					eval($codestring);
					$codestring='$p=$pos'.$i.';';
					eval($codestring);
					$permiso=mysql_query("select accesoTotal,creacion,edicion,lectura,anexar,impresion from permisos where idModulo='$m' and idPosicion='$p'",$conexion);
					$codestring='$permiso'.$i.'=mysql_fetch_array($permiso,MYSQLI_BOTH);';
					eval($codestring);
				}
				$x=1;
				/*$perFin=[0,0,0,0,0,0];*/
				$perFin[0]=0;
				$perFin[1]=0;
				$perFin[2]=0;
				$perFin[3]=0;
				$perFin[4]=0;
				$perFin[5]=0;
				while ($cont_r>0) {
						for ($i=0; $i < count($permiso1)/2; $i++){
							$codestring='$perFin[$i]=$permiso'.$x.'[$i] | $perFin[$i];';
							eval($codestring);
						}
						$cont_r--;
						$x++;
				}
				echo "<p>";
				if ($perFin[0]==1) {
					echo "Tiene permiso de: Acceso Total<br>";
				}
				if ($perFin[1]==1) {
					echo "Tiene permiso de: Creación<br>";
				}
				if ($perFin[2]==1) {
					echo "Tiene permiso de: Edición<br>";
				}
				if ($perFin[3]==1) {
					echo "Tiene permiso de: Lectura<br>";
				}
				if ($perFin[4]==1) {
					echo "Tiene permiso de: Anexar<br>";
				}
				if ($perFin[5]==1) {
					echo "Tiene permiso de: Imprimir</p>";
				}else{
					echo "</p>";
				}
<<<<<<< HEAD
			?>
=======
		?>
>>>>>>> b26d03eec46ecac49df9f1fdef99594a7ce18d8e
				</div>
			</article>
			<div id='down_content'></div>
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