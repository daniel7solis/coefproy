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
	<script type="text/javascript">
		$( document ).ready(function()
			{
				actualdate();
				$( '#menu' ).hide();
				$( 'html' ).click(function() 
				{
					$('#menu').hide('swing');
				});

				$('#tores1').resizable();

				$( '.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6' ).draggable({
        		appendTo: "body",
        		snap: true,
        		cursor: 'move',
    			helper: 'clone',
    			revert:'invalid'
    			});

    			var c=true;

				$( '.droppable_hour' ).droppable({
				    accept:'div',
				    helper:'',
				    over: function()
				    {
				    	if ( $(this).find(".draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6").length == 0 )
				    	{
				    		c=true;
				    	}
				    	else
				    	{
				    		c=false;
				    	}
				    },
				    drop: function( event, ui ) 
				    {
				    	if(c==true)
				    	{
				    		$(this).append(ui.draggable);
				    		c=false;
				    	}
				    }
				});
			});
		function mostrar()
		{
		$('#menu').slideToggle('swing');
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
						<tr class="hour_row" value="6:00am">
							<td class="left_hour" rowspan="4"><p class="day_number">6</p> <p class="meridiane">AM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="6:15am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="6:30am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="6:45am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row"  value="7:00am">
							<td class="left_hour" rowspan="4"><p class="day_number">7</p> <p class="meridiane">AM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="7:15am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row"  value="7:30am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row"  value="7:45am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="8:00am">
							<td class="left_hour" rowspan="4"><p class="day_number">8</p> <p class="meridiane">AM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div><div id="tores1" class="draggable_hour_1">167</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="8:15am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="8:30am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="8:45am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="9:00am">
							<td class="left_hour" rowspan="4"><p class="day_number">9</p> <p class="meridiane">AM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"><div class="draggable_hour_2">12</div></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="9:15am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="9:30am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="9:45am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="10:00am">
							<td class="left_hour" rowspan="4"><p class="day_number">10</p> <p class="meridiane">AM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="10:15am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="10:30am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="10:45am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="11:00am">
							<td class="left_hour" rowspan="4"><p class="day_number">11</p> <p class="meridiane">AM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"><div class="draggable_hour_3">79</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="11:15am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"><div class="draggable_hour_1">73</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="11:30am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="11:45am">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="12:00pm">
							<td class="left_hour" rowspan="4"><p class="day_number">12</p> <p class="meridiane">PM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="12:15pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="12:30pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="12:45pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="1:00pm">
							<td class="left_hour" rowspan="4"><p class="day_number">1</p> <p class="meridiane">PM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"><div class="draggable_hour_4">146</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="1:15pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="1:30pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="1:45pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="2:00pm">
							<td class="left_hour" rowspan="4"><p class="day_number">2</p> <p class="meridiane">PM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="2:15pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"><div class="draggable_hour_5">67</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="2:30pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="2:45pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="3:00pm">
							<td class="left_hour" rowspan="4"><p class="day_number">3</p> <p class="meridiane">PM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div><div class="draggable_hour_6">198</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="3:15pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"><div class="draggable_hour_2"><span></span></div></td>
						</tr>
						<tr class="hour_row" value="3:30pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="3:45pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="4:00pm">
							<td class="left_hour" rowspan="4"><p class="day_number">4</p> <p class="meridiane">PM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="4:15pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="4:30pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="4:45pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="5:00pm">
							<td class="left_hour" rowspan="4"><p class="day_number">5</p> <p class="meridiane">PM</p></td>
							<td class="droppable_hour"><div id="fifteen">&nbsp;:15</div><div id="half">&nbsp;:30</div><div id="fourtyfive">&nbsp;:45</div></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="5:15pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="5:30pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
						<tr class="hour_row" value="5:45pm">
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
							<td class="droppable_hour"></td>
						</tr>
				</table>
			</article>
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