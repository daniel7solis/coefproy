<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Calendario</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/sesiones.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/ValAndAltauser.js"></script>
	<script type="text/javascript">
	revisarSesion();
		$( document ).ready(function()
			{
				var ses = sessionStorage.getItem("id");
				var idim = JSON.parse(ses);
				$('#deploy_menu').prepend("<img src='images/users/"+idim.id+".png' />");
				
				actual();
				$('#menu').hide();
				$('html').click(function() 
				{
					$('#menu').hide('swing');
				});
				$('td').on('click', function(){
					console.log($(this).text());
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
				<li id="agenda" class="current"><a href="agenda.php"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<section id="content">
			<div id='up_content'>
				<h2 id="content_title">Calendario</h2>
				<ul>
					<li><a href="javascript:asignar(0);" class="current_month">Ene</a></li>
					<li><a href="javascript:asignar(1);">Feb</a></li>
					<li><a href="javascript:asignar(2);">Mar</a></li>
					<li><a href="javascript:asignar(3);">Abr</a></li>
					<li><a href="javascript:asignar(4);">May</a></li>
					<li><a href="javascript:asignar(5);">Jun</a></li>
					<li><a href="javascript:asignar(6);">Jul</a></li>
					<li><a href="javascript:asignar(7);">Ago</a></li>
					<li><a href="javascript:asignar(8);">Sep</a></li>
					<li><a href="javascript:asignar(9);">Oct</a></li>
					<li><a href="javascript:asignar(10);">Nov</a></li>
					<li><a href="javascript:asignar(11);">Dic</a></li>
				</ul>
			</div>
			<a class="prev_month" href="javascript:anterior();" ></a> <a class="next_month" href="javascript:siguiente();"></a>
			<h3 class="month_title"></h3>
			<table id="calendar_style" class="month">
				<tbody>
					<tr class="day_title">
						<th>D</th>
						<th>L</th>
						<th>M</th>
						<th>M</th>
						<th>J</th>
						<th>V</th>
						<th>S</th>
					</tr>
					<?php
					
					?>
					<tr class="day_height">
						<td class="calendar_row" value="Domingo"><span id="esp0"></span><p></p></td>
						<td class="calendar_row" value="Lunes"><span id="esp1"></span><p></p></td>
						<td class="calendar_row" value="Martes"><span id="esp2"></span><p></p></td>
						<td class="calendar_row" value="Miércoles"><span id="esp3"></span><p></p></td>
						<td class="calendar_row" value="Jueves"><span id="esp4"></span><p></p></td>
						<td class="calendar_row" value="Viernes"><span id="esp5"></span><p></p></td>
						<td class="calendar_row" value="Sábado"><span id="esp6"></span><p></p></td>
					</tr>
					<tr class="day_height_gray">
						<td class="calendar_row" value="Domingo"><span id="esp7"></span></td>
						<td class="calendar_row" value="Lunes"><span id="esp8"></span></td>
						<td class="calendar_row" value="Martes"><span id="esp9"></span></td>
						<td class="calendar_row" value="Miércoles"><span id="esp10"></span></td>
						<td class="calendar_row" value="Jueves"><span id="esp11"></span></td>
						<td class="calendar_row" value="Viernes"><span id="esp12"></span></td>
						<td class="calendar_row" value="Sábado"><span id="esp13"></span></td>
					</tr>
					<tr class="day_height">
						<td class="calendar_row" value="Domingo"><span id="esp14"></span></td>
						<td class="calendar_row" value="Lunes"><span id="esp15"></span></td>
						<td class="calendar_row" value="Martes"><span id="esp16"></span></td>
						<td class="calendar_row" value="Miércoles"><span id="esp17"></span></td>
						<td class="calendar_row" value="Jueves"><span id="esp18"></span></td>
						<td class="calendar_row" value="Viernes"><span id="esp19"></span></td>
						<td class="calendar_row" value="Sábado"><span id="esp20"></span></td>
					</tr>
					<tr class="day_height_gray">
						<td class="calendar_row" value="Domingo"><span id="esp21"></span></td>
						<td class="calendar_row" value="Lunes"><span id="esp22"></span></td>
						<td class="calendar_row" value="Martes"><span id="esp23"></span></td>
						<td class="calendar_row" value="Miércoles"><span id="esp24"></span></td>
						<td class="calendar_row" value="Jueves"><span id="esp25"></span></td>
						<td class="calendar_row" value="Viernes"><span id="esp26"></span></td>
						<td class="calendar_row" value="Sábado"><span id="esp27"></span></td>
					</tr>
					<tr class="day_height">
						<td class="calendar_row" value="Domingo"><span id="esp28"></span></td>
						<td class="calendar_row" value="Lunes"><span id="esp29"></span></td>
						<td class="calendar_row" value="Martes"><span id="esp30"></span></td>
						<td class="calendar_row" value="Miércoles"><span id="esp31"></span></td>
						<td class="calendar_row" value="Jueves"><span id="esp32"></span></td>
						<td class="calendar_row" value="Viernes"><span id="esp33"></span></td>
						<td class="calendar_row" value="Sábado"><span id="esp34"></span></td>
					</tr>
					<tr class="day_height_gray">
						<td class="calendar_row" value="Domingo"><span id="esp35"></span></td>
						<td class="calendar_row" value="Lunes"><span id="esp36"></span></td>
						<td id="info_calendar" colspan="5">
							<p><div id="indicator_unaviable">1</div>Día no disponible</p>
							<p><div id="indicator_actual">2</div>Día actual</p>
							<p><div id="indicator_aviable">3</div>Día disponible</p>
						</td>
					</tr>
				</tbody>
			</table>
			<div id="quick_access">
				<ul>
					<li><a id="new" href="#"></a></li>
					<li><a id="look" href="#"></a></li>
					<li><a id="manage" href="#"></a></li>
					<li><a id="print" href="#"></a></li>
				</ul>
			</div>
		<div id='down_content'></div>
		</section>
		<ul id="menu">
			<li><a class="menu_profile" href="perfil.php">&nbsp;&nbsp;Perfil</a></li>
			<li><a class="menu_conf" href="">&nbsp;&nbsp;Configuración de cuenta</a></li>
			<li id="rconfig"></li>
			<li><a class="menu_help" href="">&nbsp;&nbsp;Ayuda</a></li>
			<li><a class='close_session' href="index.php" onclick="cerrarSesion()">Cerrar sesión</a></li>
		</ul>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>