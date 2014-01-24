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
				<li id="agenda" class="current"><a href="#"></a></li>
				<li id="patients"><a href="#"></a></li>
				<li id="donator"><a href="#"></a></li>
				<li id="departments"><a href="#"></a></li>
				<li id="lab_survey"><a href="#"></a></li>
			</ul>
		</nav>
		<?php
			$nombre=$_GET['datos']; 
			echo
			"<section id='content'>
				<h2 id='content_title'>Información de Perfil</h2>
				<p id='nombre_user'>$nombre</p>
				<article class='item_perfil'>
					<div class='title_item_perfil'><p>Datos Generales</p></div>
					<div class='contenido_item_perfil'>
						<p>ID: 1<br>
						Nombre: Juan<br>
						Contraseña: Juan</p>
					</div>
				</article>
				<article class='item_perfil'>
				<div class='title_item_perfil'><p>Aspecto Laboral</p></div>
				<div class='contenido_item_perfil'>
					<p>Numero de Permiso: 1<br>
						Modulo: Produccón<br>
						Posición: Gerente de departamento<br>
						Sucursal: 1</p>
						<p>Numero de Permiso: 1<br>
						Modulo: Produccón<br>
						Posición: Gerente de departamento<br>
						Sucursal: 1</p>
						<p>Numero de Permiso: 1<br>
						Modulo: Produccón<br>
						Posición: Gerente de departamento<br>
						Sucursal: 1</p>
						<p>Numero de Permiso: 1<br>
						Modulo: Produccón<br>
						Posición: Gerente de departamento<br>
						Sucursal: 1</p>
					</div>
				</article>
				<article class='item_perfil'>
					<div class='title_item_perfil'><p>Permisos</p></div>
					<div class='contenido_item_perfil'>
						<p>Creacion<br>
						Edición<br>
						Lectura<br>
						Anexar<br>
						Impresión</p>
					</div>
				</article>
			</section>
			";
		?>
		<!--section id="content">
			<h2 id="content_title">Información de Perfil</h2>
			<p id="nombre_user"> Juan Antonio Ramirez Chavez </p>
			<article class="item_perfil">
				<div class="title_item_perfil"><p>Datos Generales</p></div>
				<div class="contenido_item_perfil">
					<p>ID: 1<br>
					Nombre: Juan<br>
					Contraseña: Juan</p>
				</div>
			</article>
			<article class="item_perfil">
				<div class="title_item_perfil"><p>Aspecto Laboral</p></div>
				<div class="contenido_item_perfil">
					<p>Numero de Permiso: 1<br>
					Modulo: Produccón<br>
					Posición: Gerente de departamento<br>
					Sucursal: 1</p>
					<p>Numero de Permiso: 1<br>
					Modulo: Produccón<br>
					Posición: Gerente de departamento<br>
					Sucursal: 1</p>
					<p>Numero de Permiso: 1<br>
					Modulo: Produccón<br>
					Posición: Gerente de departamento<br>
					Sucursal: 1</p>
					<p>Numero de Permiso: 1<br>
					Modulo: Produccón<br>
					Posición: Gerente de departamento<br>
					Sucursal: 1</p>
				</div>
			</article>
			<article class="item_perfil">
				<div class="title_item_perfil"><p>Permisos</p></div>
				<div class="contenido_item_perfil">
					<p>Creacion<br>
					Edición<br>
					Lectura<br>
					Anexar<br>
					Impresión</p>
				</div>
			</article>
		</section-->
	</div>
	<footer>
		<p>Footer y créditos</p>
	</footer>

</body>
</html>