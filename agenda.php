<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Agenda</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript">
		$( document ).ready(function()
			{
				actual();
				actualdate();
				$('#menu').hide();
				$('html').click(function() 
				{
					$('#menu').hide('swing');
				});
				$( '.draggable_hour' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});
				$( '.droppable_hour' ).droppable({
				    accept:'div',
				    activeClass: "ui-state-default",
				    hoverClass: "ui-state-hover",
				 
				    drop: function( event, ui ) {
				        ui.draggable.appendTo(this).fadeIn();
				    }
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
				<li id="agenda" class="current"><a href="agenda.php"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<section id="content">
			<div id='up_content'>
				<h2 id="content_title">Agenda</h2>
				<p id='content_subtitle'><span id="actual_day_name"></span>,&nbsp;<span id="actual_day_numb"></span>&nbsp;de&nbsp;<span id="actual_month"></span>&nbsp;del&nbsp;<span id="actual_year"></span></p>
				</ul>
			</div>	
			<article id="hour_container">
				<table id="day_table">
					<tbody>
						<tr class="hour_row">
							<td class="left_hour">6 AM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">7 AM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">8 AM</td>
							<td class="droppable_hour"><div class="draggable_hour">Paciente: 132<br>Nombre: Eloí Daniel<br>Dr: Eduardo Villaseñor</div></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">9 AM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">10 AM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">11 AM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">12 AM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">1 PM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">2 PM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">3 PM</td>
							<td class="droppable_hour"><div class="draggable_hour">Paciente: 132<br>Nombre: Eloí Daniel<br>Dr: Eduardo Villaseñor</div></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">4 PM</td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row">
							<td class="left_hour">5 PM</td>
							<td class="droppable_hour"></td>
						</tr>
					</tbody>
				</table>
			</article>
		<div id='down_content'>
			
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