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
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {actual()});
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
				<a href="#"><figcaption></figcaption></a>
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
			<h2 id="content_title">Agenda</h2>
				<a class="prev_month" href="javascript:anterior();" ></a> <a class="next_month" href="javascript:siguiente();"></a>
			<h3 class="month_title"></h3>
			<table class="january">
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
					<tr class="day_height">
						<td><span id="esp0"></span><p></p></td>
						<td><span id="esp1"></span><p></p></td>
						<td><span id="esp2"></span><p></p></td>
						<td><span id="esp3"></span><p></p></td>
						<td><span id="esp4"></span><p></p></td>
						<td><span id="esp5"></span><p></p></td>
						<td><span id="esp6"></span><p></p></td>
					</tr>
					<tr class="day_height_gray">
						<td><span id="esp7"></span></td>
						<td><span id="esp8"></span></td>
						<td><span id="esp9"></span></td>
						<td><span id="esp10"></span></td>
						<td><span id="esp11"></span></td>
						<td><span id="esp12"></span></td>
						<td><span id="esp13"></span></td>
					</tr>
					<tr class="day_height">
						<td><span id="esp14"></span></td>
						<td><span id="esp15"></span></td>
						<td><span id="esp16"></span></td>
						<td><span id="esp17"></span></td>
						<td><span id="esp18"></span></td>
						<td><span id="esp19"></span></td>
						<td><span id="esp20"></span></td>
					</tr>
					<tr class="day_height_gray">
						<td><span id="esp21"></span></td>
						<td><span id="esp22"></span></td>
						<td><span id="esp23"></span></td>
						<td><span id="esp24"></span></td>
						<td><span id="esp25"></span></td>
						<td><span id="esp26"></span></td>
						<td><span id="esp27"></span></td>
					</tr>
					<tr class="day_height">
						<td><span id="esp28"></span></td>
						<td><span id="esp29"></span></td>
						<td><span id="esp30"></span></td>
						<td><span id="esp31"></span></td>
						<td><span id="esp32"></span></td>
						<td><span id="esp33"></span></td>
						<td><span id="esp34"></span></td>
					</tr>
					<tr class="day_height_gray">
						<td><span id="esp35"></span></td>
						<td><span id="esp36"></span></td>
						<td id="info_calendar" colspan="5">
							<p><div id="indicator_unaviable">1</div>Día no disponible</p>
							<p><div id="indicator_actual">2</div>Día actual</p>
							<p><div id="indicator_aviable">3</div>Día disponible</p>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
		<div id="quick_access">
			<ul>
				<li><a id="new" href="#"></a></li>
				<li><a id="look" href="#"></a></li>
				<li><a id="manage" href="#"></a></li>
				<li><a id="print" href="#"></a></li>
			</ul>
		</div>
	</div>
	<footer>
		<p>Coeficient &copy; 2014</p>
	</footer>

</body>
</html>