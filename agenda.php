<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Agenda</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/aplication.js"></script>
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
			<article id="hour_container">
				<table id="day_table">
					<?php
						$horas;$idpac;$iddoc;
						$aux=0;
						$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
						mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
						mysql_set_charset("utf8", $conexion);

						$datos=mysql_query("select * from citas",$conexion);
						while($arreglo=mysql_fetch_array($datos))
						{
							$horas[$aux] = $arreglo['hora'];
							$idpac[$aux] = $arreglo['idPaciente'];
							$iddoc[$aux] = $arreglo['idDoctor'];
							$aux++;
						}
							$h=6;$min="00";$mer="am";
							for ($i=0; $i < 12; $i++) 
							{ 
								for ($j=0; $j < 4; $j++) 
								{ 
									echo "<tr class='hour_row' value='".$h.":".$min.$mer."'>";
									if($j==0)
									{
										echo "<td class='left_hour' rowspan='4'><p class='day_number'>".$h."</p> <p class='meridiane'>".$mer."</p></td>";
									}
									for ($k=0; $k < 5; $k++) 
									{ 
										echo "<td class='droppable_hour'>";
										for ($m=0; $m < 3; $m++) 
										{ 
											if(strcmp($horas[$m],$h.":".$min.$mer)==0)
											{
												echo "<div id='tores1' class='draggable_hour_".$iddoc[$m]."'>".$idpac[$m]."</div>";
											}
										}
										echo "</td>";
									}
									echo "</tr>";
									$min+=15;
									if($min==60)
									{$min="00";}
								}
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
			<li><a class="menu_help" href="">&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href="">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>