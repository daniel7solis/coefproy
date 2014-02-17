<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Agenda</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.10.4.custom/css/redmond/jquery-ui-1.10.4.custom.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-touch.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/aplication.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
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
		<input id="search" class="search_field" type="text" placeHolder="Buscar...">
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
			<div id="up_content">
				<h2 id="content_title">Agenda</h2>
				<p id="content_subtitle"><span id="actual_day_name"></span>,&nbsp;<span id="actual_day_numb"></span>&nbsp;de&nbsp;<span id="actual_month"></span>&nbsp;-&nbsp;<span id="actual_year"></span></p>
			</div>	
			<article id="date_changer">
				<input id="dc_day" type="text" placeHolder="Ir a otro día..."/>
			</article>
			<article id="hour_container">
				<table id="day_table">
					<?php
						date_default_timezone_set('America/Mexico_City');
						# Arreglos necesarios para pasar los registros y manejarlos mejor.
						$horas;$idpac;$iddoc;$fecha;
						$aux=0;
						# Conexión a la base de datos.
						//$conexion=mysql_connect("127.0.0.1","root","") or die("Problemas con la conexion de base de datos ".mysql_error());
						$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
						mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
						mysql_set_charset("utf8", $conexion);

						# Query para seleccionar todo los registros de la cita. AQUÍ FALTA QUE VERIFIQUE LA FECHA
						# PARA QUE SOLO MUESTRE LAS CITAS DEL DÍA QUE SE SELECCIONE.
						$datos=mysql_query("select * from citas",$conexion);
						# Éste ciclo manda todos los datos a los arreglos definidos al inicio, para una mejor
						# manipulación.
						while($arreglo=mysql_fetch_array($datos))
						{
							$horas[$aux] = $arreglo['hora'];
							$idpac[$aux] = $arreglo['idPaciente'];
							$iddoc[$aux] = $arreglo['idDoctor'];
							$fecha[$aux] = $arreglo['fecha'];
							$aux++;
						}
						# Valores iniciales con que se generará la agenda.
						$h=6;$min="00";$mer="am";$count = 0;
						# Ciclo que genera las 12 horas.
						for ($i=0; $i < 12; $i++) 
						{ 
							# Ciclo que genera los renglones de 15 min. por cada hora -> 4
							for ($j=0; $j < 4; $j++) 
							{ 
								echo "<tr class='hour_row' value='".$h.":".$min.$mer."'>";
								# Aquí determina la primera posición de cada elemento para
								# destacarla y colocarle el estilo de la cabeza de hora.
								if($j==0)
								{
									echo "<td class='left_hour' rowspan='4'><p class='day_number'>".$h."</p> <p class='meridiane'>".$mer."</p></td>";
								}
								# Aquí genera los contenedores droppables.
								echo "<td id='c".$count."' class='droppable_hour'>";
								# Se muestran las citas de la base de datos.
								# $horas contiene la hora, $idpac contiene el id del paciente y $iddoc
								# el id del doctor, osea el color que le corresponde.
								for ($m=0; $m < count($horas); $m++) 
								{ 
									if(strcmp($horas[$m],$h.":".$min.$mer)==0)
									{
										if(!isset($_GET['ano']))
										{
											if(date("20y-m-d")==$fecha[$m])
											{
												echo "<div class='draggable_hour_".$iddoc[$m]."'>Id.".$idpac[$m]."<br><span class='here_hour'>".$horas[$m]."</span></div>";
											}
										}
										else
										{
											$got_year = $_GET['ano'];
											$got_month = $_GET['mes'];
											$got_day = $_GET['dia'];
											
											if(($got_year."-".$got_month."-".$got_day)==$fecha[$m])
											{
												echo "<div class='draggable_hour_".$iddoc[$m]."'>Id.".$idpac[$m]."<br><span class='here_hour'>".$horas[$m]."</span></div>";
											}
										}
									}
								}
								# Se cierra cada columna.
								echo "</td>";
								# Se cierra cada renglón.
								echo "</tr>";
								$count++;
								# Aquí se aumenta 15 min a cada renglón y se reinicia cuando llega a 60.
								$min+=15;
								if($min==60)
								{$min="00";}
							}
							# Aquí se aumenta 1 hora y se cambia el meridiano de AM a PM cuando llega a las 12.
							$h++;
							if($h==12)
							{$mer="pm";}
							if($h==13)
							{$h=1;}
						}
					?>
				</table>
			</article>
			<div id="quick_access">
				<ul>
					<li><a id="new"></a></li>
					<li><a id="look" href="#"></a></li>
					<li><a id="manage" href="#"></a></li>
					<li><a id="print" href="#"></a></li>
				</ul>
			</div>
		<div id='down_content'>
			<p class="down_text"><a id="down_text_cal" href="calendario.php">¿Consultar otro día?&nbsp;&nbsp;<a></p>
		</div>
		</section>

		<ul id="menu">
			<li><a class="menu_profile" href="perfil.php">&nbsp;&nbsp;Perfil</a></li>
			<li><a class="menu_conf" href="">&nbsp;&nbsp;Configuración de cuenta</a></li>
			<li id="rconfig"></li>
			<li><a class="menu_help" href="">&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href="">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>
</body>
</html>