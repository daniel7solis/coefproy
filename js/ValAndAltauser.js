// <!-- Daniel Code -->
// Funcion para validar el texto que entra al formulario, se crea un objeto RegExp (espresion regular) que 
// contiene los caracteres invalidos, para posteriormente hacer el match con la cadena de entrada al 
// formulario, se llama a cada evento onkeyup, para asegurar que no se pueda poner alguna cadena invalida
function validar(str){
	var regE = new RegExp("[$<>]");
	if (regE.test(str)){
		// alert("Caracter invalido, ingresa datos nuevamente");
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
			//inicia con un numero la contraseña 0-9
			caracter=Math.round((Math.random()*9));
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
			// par debe concatenarse un digito 0-9
			passW=passW.concat(Math.round((Math.random()*9)));
		}
	};
	//inserto la contraseña resultante en el campo para verla temporalmente
	document.getElementById('to_pass').value=passW;
}
/*La funcion sesion guarda en sesionStorage el item "id" que contiene un objeto json creado en el archivo sesion2.php,
despues que se ha identificado el usuario y se a validado con sus datos de la DB;
tambien despues de almacenar el json en la computadora cliente redirecciona la aplicación
al archivo oerfil.php*/
function sesion () {
	sessionStorage.setItem("id", json);
	var Objjson=JSON.parse(json);
	//si es usuario root se redirecciona al portal de administración total del sistema, si no accede al sistema normalmente
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
			$("#id_img").html('<img width="60px" src="images/users/'+data['id']+'.png"/>');
			$("#user").html(data['user']);
			$(".nom").html(data['nombre']);
			$("#dir").html(data['dir']);
			$("#tel").html(data['tel']);
			$("#email").html(data['email']);
			$("#curp").html(data['curp']);
			$("#rfc").html(data['rfc']);
			var cantidadPer=data['numPerfiles'];
			var cadena="";
			/*ciclo para mostrar los "n" perfiles del usuario (todo se concatena a una cadena definida
			vacia para insertar el total de perfiles dentro del html)*/
			for(var i=1; i<=cantidadPer; i++){
				cadena=cadena+"<p>"+"Modulo: "+data['perfil'+i].modulo+"<br>"+
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
/*Con la función isRoot verifico si a sido logueado un SUPER USUARIO y si lo es agrego la pestaña de configuración
de usuarios*/
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
			$("#rconfig").html(cadenaP);/*agrego el codigo retornado por el php, en caso de ser super usuarios
			se presenta la configuracion de usuarios*/
		}
	});
}
/*Llamo a esta función cuando se carga todas las paginas para verificar si es un super usuario*/
$( document ).ready(function(){
	isRoot();
	// $('.item_perfil').on('click',function(){console.log("dio clic");});
});
/*Funciona para consultar los datos de una sucursal apartir de la sucursal a la que pertenece el usuario
logueado*/
function get_sucursal(){
	var ids=sessionStorage.getItem("id");
	var idd=JSON.parse(ids);
	var parametros = {
                "id" : idd.id,
                "user": idd.nombre,
                "suc": idd.s
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
			/*Agrego el numero de sucursal y los datos respectivos en la etiqueta para mostrar al usuario 
			la sucursal en la que se esta registrando el nuevo usuario*/
			var cadenaP=data['name']+" "+data['dir'];
			$("#suc").val(data['id']);
			$("#label_suc").html(cadenaP);
		}
	});
}
/*Codigo necesario para concatener a los datos devueltos por la consulta y se muestren con formato a la 
vista del usuario*/
var codigo1="<article class='item_perfil'><div class='title_item_perfil'><input type='hidden' value='";//aqui va el id
var codigo12="'><p>";//aqui va el usuario
var codigo2='</p></div><div class="contenido_item_perfil"><img width="60px" src="images/users/';
var codigo3='.png"/><p>Nombre Usuario: ';
var codigo4='</div></article>';

// Función para consultar los usuarios de "X" sucursal y mostrarlos en la pagina de users.php
function usuarios(){
	/*Tomo la sucursal del usuario logueado para enviarla como paramentro de la consulta y solo retorne los usuarios
	de la misma sucursal, impediendo que veo la lista completa de todos los usuarios registrados*/
	var ids=sessionStorage.getItem("id");
	var idd=JSON.parse(ids);//Conviero la cadena a un JSON para acceder a los datos
	var parametros = {"suc" : idd.s};//tomo la sucursal en curso para mandarla como parametro
	$.ajax({
		/*paso los paramentros al php*/
		data:parametros,
		url: 'listusers.php',//nombre del archivo php que procesa la consulta de los usuarios
		type:'post',//especifico el tipo de metodo para enviar los datos
		/*defino el tipo de dato de retorno*/
		dataType:'json',////especifico el tipo de dato de retorno de la pagina php
		/*funcion de retorno*/
		success: function(data){//esta funcion se ejecuta cuando la consulta fue satisfactoria y se obtiene la respuesta
			var cadenaP="";
			for(var i=1; i<=(data['num']); i++){//ciclo para la cantidad de usuarios que se mostraran "data['num']"
				/*concateno en la cadenaP los datos mas el codigo que será insertado en la etiqueta span, destinada a mostrar
				el resultado de la consulta de los usuarios*/
				// cadenaP=cadenaP+codigo1+data['usuario'+i].nom+codigo2+data['usuario'+i].nomUser+"</p><p>Modulo: "+
				// data['usuario'+i].mod+"<br>Posición: "+data['usuario'+i].pos+"<br>Sucursal: "+data['s']+"</p>"+codigo3+
				// data['usuario'+i].ph+codigo4;
				cadenaP=cadenaP+codigo1+data['usuario'+i].id+codigo12+data['usuario'+i].nom+codigo2+data['usuario'+i].ph+codigo3+data['usuario'+i].nomUser+"</p><p>Modulo: "+
				data['usuario'+i].mod+"<br>Posición: "+data['usuario'+i].pos+"<br>Sucursal: "+data['s']+"</p>"+codigo4;
			}
			$("#users").html(cadenaP);//Asigno el contenido de la cadenaP como codigo html dentro de la etiqueta span
			escucha();
		}
	});
}
/*En este arreglo se almacenaran todos los usuarios a modificar el indice se incrementa conforme se 
seleccionan con el evento onclick, para fines practicos se quitara el incremento del indice en la
configuracion de la informacion del usuario en la pagina users.php ya que solo se puede modificar un
usuario a la vez, igualemte se cambiara el efecto que se tome con las lineas de codigo posteriormente
señaladas, dado que en el caso de users.php solo se puede sellecionar un solo usuario, y en posteriores 
configuraciones del sistema se debera dotar la capacidad de seleccionar mas de un usuario o elemento
segun sea el caso */
var confUsers=new Array();/*arreglo donde se almacenan los usuarios o elementos a modificar, en el caso
de users.php solo se gusrdara un solo usuario a modificar*/ 
var indice=0;//indice que controla la cantidad de elementos que se almacenaran conforme suceda el click
function escucha(){
	/*Activo la seleccion de usuarios para modificarlos, se selecciona el usuario de la lista que
	se muestra en la pag users.php*/
	var x=document.getElementsByTagName("article");/*selecciono todos los usuarios ya qye se encuentran
	dentro de article*/
	for(var z=0; z<x.length; z++){/*recorro el total de elemtos que se dara la capacidad de resaltar al
		ser seleccionados mediante un click*/
		x[z].onclick=function(){//activo el evento del click
			/*La funcion siguiente desmarca todo los articles antes de seleccionar nuevamente a un elemento*/
			limpiar();
			$(this).css({'border':'3px solid #f39c12'});
			var y=$(this).find("input");
			confUsers[indice]=y.val();
			console.log(confUsers[indice]);
			/* indice++; Comento esta linea dado que solo se puede modificar un usuario, y se deja para 
			un uso posterior, cuando se requiera modificar o seleccionar a mas de un elemento, que se
			almacene en el arreglo de confUser los id que identifican al elemento*/
		};
	}
}
/*La funcion siguiente devuelve a todos los elementos seleccionados o no a sus caracteristicas normales,
que indican se elimino la seleccion de ese objeto*/
function limpiar(){
	var arr=$('article');
	for(var z=0; z<arr.length; z++){/*recorro el total de elemtos que se eliminara la seleccion*/		
		$(arr[z]).css({'border':'transparent'});//modifico sus caracteristicas css
	}
}