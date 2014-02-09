<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
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
		function sesion(){
			var id=sessionStorage.getItem("id");
			var idd=JSON.parse(id);
			var parametros = {
                "id" : idd.id,
                "user": idd.nombre
        	};
			$.ajax({
				data:parametros,
				url: 'procesa.php',
				type:'post',
				dataType:'json',
				success: function(data){
					$("#id").html(data['id']);
					$(".user").html(data['user']);
					var cantidadPer=data['numPerfiles'];
					var cadena="";
					for(var i=1; i<=cantidadPer; i++){
						cadena=cadena+"<p>Numero de Permiso: "+data['perfil'+i].permiso+"<br>"+
						"Modulo: "+data['perfil'+i].modulo+"<br>"+
						"Posición: "+data['perfil'+i].posicion+"<br>"+
						"Sucursal: "+data['perfil'+i].sucursal+"</p>";
					}
					$("#perf").html(cadena);
					var cadenaP="<p>";
					if(data['at']==1)
						cadenaP=cadenaP+"Tiene permiso de: Acceso Total<br>";
					if(data['c']==1)
						cadenaP=cadenaP+"Tiene permiso de: Creación<br>";
					if(data['e']==1)
						cadenaP=cadenaP+"Tiene permiso de: Edición<br>";
					if(data['l']==1)
						cadenaP=cadenaP+"Tiene permiso de: Lectura<br>";
					if(data['a']==1)
						cadenaP=cadenaP+"Tiene permiso de: Añexar<br>";
					if(data['i']==1)
						cadenaP=cadenaP+"Tiene permiso de: Imprimir<br>";
					cadenaP=cadenaP+"</p>";	
					$("#perm").html(cadenaP);
				}
			});
		}
		window.onload=sesion();
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
	<script language="javascript">
		
	</script>
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
		<section id='content'>
			<div id='up_content'><h2 id='content_title'>Perfil</h2><p id='content_subtitle'><span class="user"></span></p></div>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Datos Generales:</p></div>
				<div class='contenido_item_perfil'>
					<p>ID: <span id='id'></span><br>
					Nombre: <span class='user'></span></p>
				</div>
			</article>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Aspecto Laboral -</p></div>
				<div class='contenido_item_perfil'>
					 <!-- Aqui van los "n" perfiles que puede tener el usuario -->
					<span id="perf"></span>
				</div>
			</article>
			<article class='item_perfil'>
				<div class='title_item_perfil'><p>Permisos -</p></div>
				<div class='contenido_item_perfil'>
					<!-- Aqui van los "n" permisos que puede tener el usuario -->
					<span id="perm"></span>
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