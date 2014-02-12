// <!-- Daniel Code -->
// Funcion para validar el texto que entra al formulario, se crea un objeto RegExp (espresion regular) que 
// contiene los caracteres invalidos, para posteriormente hacer el match con la cadena de entrada al 
// formulario, se llama a cada evento onkeyup, para asegurar que no se pueda poner alguna cadena invalida
function validar(str){
	var regE = new RegExp("[$<>]");
	if (regE.test(str)){
		alert("Caracter invalido, ingresa datos nuevamente");
		document.getElementById('user').value="";
		document.getElementById('password').value="";
	};
}
// <!-- Daniel Code end-->
// Daniel COde
/*Esta función toma la primer letra del nombre para agregarla al nombre de usuario, que se asigna por default
al dar de alta un nuevo usuario*/
var letra1;
function sentName(str){
	letra1=str.charAt(0);
}
/* Funcion que recibe la cadena del campo de apellidos "ap", para usarse como nombre de usuario,
* de esta forma se crea en nombre de usuario por default, que posteriormente el usuario podra
* cambiarlo.*/
function showHind(str){
	/*La funcion repalce, cambia todos los caracteres de espacio/tab/etc... por cadena vacia
	* (/\s/->es una expresion regular, y se verifican todos los caracteres de la cadena-->"gi")*/
	str=str.replace(/\s/gi,'');
	document.getElementById('to_user').value=str+letra1;
	// alert(str+letra1);
	pass();
}
/*funcion que genera una contraseña aleatoria que se asigna a un usuario cuando es registrado que 
posteriormente podra ser cambiada, que contiene numeros, letras*/
function pass(){
	var passW="";
	var caracter;
	for (var i=0; i<8; i++){
		if(i===0){
			caracter=Math.round((Math.random()*9));
			// alert(caracter);
			passW=passW.concat(caracter);
		}else if(i%2!=0){
			// impar--> debe de estar entre el 65-90(A-Z) o 97-122(a-z)
			var x=1+Math.round(Math.random());
			var y;
			switch(x){
				case 1:
					y=65+Math.round(Math.random()*25);
					caracter=String.fromCharCode(y);
					passW=passW.concat(caracter);
				break;
				case 2:
					y=97+Math.round(Math.random()*25);
					caracter=String.fromCharCode(y);
					passW=passW.concat(caracter);
				break;
			}
		}else{
			// par
			passW=passW.concat(Math.round((Math.random()*9)));
		}
	};
	// document.getElementById('to_pass').innerHTML=passW;
	document.getElementById('to_pass').value=passW;
}
/*La funcion sesion guarda en sesionStorage el item "id" que contiene un objeto json creado en el archivo sesion2.php,
despues que se ha identificado el usuario y se a validado con sus datos de la DB;
tambien despues de almacenar el json en la computadora cliente redirecciona la aplicación
al archivo oerfil.php*/
function sesion () {
	sessionStorage.setItem("id", json);
	var Objjson=JSON.parse(json);
	if(Objjson.nombre==="root"){
		document.location.href="root/perfil.php";	
	}else
		document.location.href="perfil.php";
}
/*Funcion sesionPerfil obtine los datos del usuario logueado del json almacenada en sesionStorage;
y con ajax hago la petición a la DB del resto de información del usuario para presentarlo
en la vista de su perfil*/
function sesionPerfil(){
			var ids=sessionStorage.getItem("id");
			var idd=JSON.parse(ids);
			var parametros = {
                "id" : idd.id,
                "user": idd.nombre
        	};
			$.ajax({
				/*paso los paramentros al php*/
				data:parametros,
				url: 'procesa.php',
				type:'post',
				/*defino el tipo de dato de retorno*/
				dataType:'json',
				/*funcion de retorno*/
				success: function(data){
					/*inserto los datos en las etiquetas html*/
					$("#id").html(data['id']);
					$(".user").html(data['user']);
					var cantidadPer=data['numPerfiles'];
					var cadena="";
					/*ciclo para mostrar los "n" perfiles del usuario (todo se concatena a una cadena definida
					vacia para insertar el total de perfiles dentro del html)*/
					for(var i=1; i<=cantidadPer; i++){
						cadena=cadena+"<p>Numero de Permiso: "+data['perfil'+i].permiso+"<br>"+
						"Modulo: "+data['perfil'+i].modulo+"<br>"+
						"Posición: "+data['perfil'+i].posicion+"<br>"+
						"Sucursal: "+data['perfil'+i].sucursal+"</p>";
					}
					$("#perf").html(cadena);
					/*condiciones para mostrar los permisos del usuario*/
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

function isRoot(){
	var ids=sessionStorage.getItem("id");
	var idd=JSON.parse(ids);
	var parametros = {
                "id" : idd.id,
                "user": idd.nombre,
                "ids": idd.idd,
                "suc": idd.s
        	};
	$.ajax({
		/*paso los paramentros al php*/
		data:parametros,
		url: 'isroot.php',
		type:'post',
		/*defino el tipo de dato de retorno*/
		dataType:'json',
		/*funcion de retorno*/
		success: function(data){
			var cadenaP=data['rc'];
			$("#rconfig").html(cadenaP);
		}
	});
}

$( document ).ready(function(){
	isRoot();
});

function get_sucursal(){
	var ids=sessionStorage.getItem("id");
	var idd=JSON.parse(ids);
	var parametros = {
                "id" : idd.id,
                "user": idd.nombre
        	};
	$.ajax({
		/*paso los paramentros al php*/
		data:parametros,
		url: 'getsucursal.php',
		type:'post',
		/*defino el tipo de dato de retorno*/
		dataType:'json',
		/*funcion de retorno*/
		success: function(data){
			var cadenaP=data['name']+" "+data['dir'];
			$("#suc").val(data['id']);
			$("#label_suc").html(cadenaP);
		}
	});
}