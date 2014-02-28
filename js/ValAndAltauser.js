// <!-- VAlAndAltauser.js by Daniel Solis -->

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
function sesion() {
	sessionStorage.setItem("id", json);
	var Objjson=JSON.parse(json);
	//si es usuario root se redirecciona al portal de administración total del sistema, si no accede al sistema normalmente
	if(Objjson.nombre==="root"){
		document.location.href="root/usersroot.php";	
	}else
		document.location.href="agenda.php";
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
			$("#id_img").html('<img src="images/users/'+data['id']+'.png"/>');
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
				cadena=cadena+"<p id='other_data'>"+"Modulo: <span>"+data['perfil'+i].modulo+"</span><br>"+
				"Posición: <span>"+data['perfil'+i].posicion+"</span><br>"+
				"Sucursal: <span>"+data['perfil'+i].sucursal+"</span><br><br></p>";
			}
			$("#perf").html(cadena);
			/*condiciones para mostrar los permisos del usuario*/
			var cadenaP="<p id='other_data'>";
			if(data['at']==1)
				cadenaP=cadenaP+"Tiene permiso de: <span>Acceso Total</span><br>";
			if(data['c']==1)
				cadenaP=cadenaP+"Tiene permiso de: <span>Creación</span><br>";
			if(data['e']==1)
				cadenaP=cadenaP+"Tiene permiso de: <span>Edición</span><br>";
			if(data['l']==1)
				cadenaP=cadenaP+"Tiene permiso de: <span>Lectura</span><br>";
			if(data['a']==1)
				cadenaP=cadenaP+"Tiene permiso de: <span>Añexar</span><br>";
			if(data['i']==1)
				cadenaP=cadenaP+"Tiene permiso de: <span>Imprimir</span><br>";
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
var codigo2='</p></div><div class="contenido_item_perfil"><img src="images/users/';
var codigo3='.png"/><p>Nombre Usuario: ';
var codigo31='<p>Modulo: Aqui<br>Posición: Aqui 2<br>Sucursal: aqui 3</p>';
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
				var cadPer="";
				/*Ciclo para concatenar los "n" perfiles de un usuario y los mande en la cadena JSON para
				ser usada en la pagina "users.php" y solo me muestre los usuarios de la suc que pertenece 
				el usuario que hace la consulta*/
				for(var j=1; j<=(data['usuario'+i].totPer); j++){//ciclo para el total de perfiles de un usuario
					/*en el JSON "data['usuario'+i].totPer" tengo almacenada la cantidad de perfiles de este usuario*/
					var c="perfil"+j;//evaluo el perfil en curso durante el ciclo
					eval("var m=data['usuario'+i]."+c+".mod;");/*evaluo una cadena como codigo; que me 
					regresa el modulo de dicho usuario en dicho perfil en el momento del ciclo*/
					eval("var p=data['usuario'+i]."+c+".pos;");/*evaluo una cadena como codigo; que me 
					regresa la posicion de dicho usuario en dicho perfil en el momento del ciclo*/
					cadPer=cadPer+"<p>Modulo: "+m+"<br>Posición: "+p+"<br>Sucursal: "+data['s'];
				}
				/*Genero la cadena que sera añadida al HTML con el codigo necesario para la semantica y 
				presentación de la información, junto con la cadena de los "n" perfiles del usuario*/
				cadenaP=cadenaP+codigo1+data['usuario'+i].id+codigo12+data['usuario'+i].nom+codigo2+
				data['usuario'+i].id+codigo3+data['usuario'+i].nomUser+"</p>"+cadPer+codigo4;
				//Limpio la cadena de los perfiles, dado que el sigiente usuario hace uso de esta misma.
				cadPer="";
			}
			$("#users").html(cadenaP);//Asigno el contenido de la cadenaP como codigo html dentro de la etiqueta span
			escucha_users();//mando llamar la funcion que sirve de escucha para cuando un elemento en este caso
			//un usuario es seleccionado para modificar su información o eliminarlo
		}
	});
}
/*En este arreglo "confUsers" se almacenaran todos los usuarios a modificar el indice se incrementa conforme se 
seleccionan con el evento onclick, para fines practicos se quitara el incremento del indice en la
configuracion de la informacion del usuario en la pagina users.php ya que solo se puede modificar un
usuario a la vez, igualemte se cambiara el efecto que se tome con las lineas de codigo posteriormente
señaladas, dado que en el caso de users.php solo se puede sellecionar un solo usuario, y en posteriores 
configuraciones del sistema se debera dotar la capacidad de seleccionar mas de un usuario o elemento
segun sea el caso */
var confUsers=new Array();/*arreglo donde se almacenan los usuarios o elementos a modificar, en el caso
de users.php solo se permitira un solo usuario a modificar*/ 
var indice=0;//indice que controla la cantidad de elementos que se almacenaran conforme suceda el click
function escucha_users(){
	/*Activo la seleccion de usuarios para modificarlos, se selecciona el usuario de la lista que
	se muestra en la pag users.php*/
	var x=document.getElementsByTagName("article");/*selecciono todos los usuarios ya qye se encuentran
	dentro de article*/
	for(var z=0; z<x.length; z++){/*recorro el total de elemtos que se dara la capacidad de resaltar al
		ser seleccionados mediante un click*/
		x[z].onclick=function(){//activo el evento del click
			/*La funcion siguiente desmarca todo los articles antes de seleccionar nuevamente a un elemento*/
			limpiar("article");
			$(this).css({'border':'3px solid #f39c12'});
			var y=$(this).find("input");
			confUsers[indice]=y.val();
			console.log(confUsers[indice]);
			/* indice++; Comento esta linea dado que solo se puede modificar un usuario, y se deja para 
			un uso posterior, cuando se requiera modificar o seleccionar a mas de un elemento, que se
			almacene en el arreglo de confUser los id que identifican al elemento*/
			sessionStorage.setItem("conf", confUsers[indice]);
		};
	}
}
/*La funcion siguiente devuelve a todos los elementos seleccionados o no a sus caracteristicas normales,
que indican se elimino la seleccion de ese objeto*/
function limpiar(p){
	var arr=$(p);
	for(var z=0; z<arr.length; z++){/*recorro el total de elemtos que se eliminara la seleccion*/		
		$(arr[z]).css({'border':'transparent'});//modifico sus caracteristicas css
	}
}

/**/
function confUser(){
	console.log(sessionStorage.getItem("conf"));
	var conf=sessionStorage.getItem("conf");
	var parametros = {
        "id" : conf
       	};
	$.ajax({
		/*paso los paramentros al php*/
		data:parametros,
		url: 'userConf.php',
		type:'post',
		/*defino el tipo de dato de retorno*/
		dataType:'json',
		/*funcion de retorno*/
		success: function(data){
			/*inserto los datos en las etiquetas html*/
			$("#id_img").html('<img src="images/users/'+data['id']+'.png"/>');
			$("#user").html(data['user']);
			$(".nom").html(data['nombre']);
			$("#nombre").val(data['nombre']);
			$("#dir").val(data['dir']);
			$("#tel").val(data['tel']);
			$("#email").val(data['email']);
			$("#curp").val(data['curp']);
			$("#rfc").val(data['rfc']);
			$("#id").val(data['id']);			
			var cantidadPer=data['numPerfiles'];
			var cadena="";
			/*ciclo para mostrar los "n" perfiles del usuario (todo se concatena a una cadena definida
			vacia para insertar el total de perfiles dentro del html)*/
			for(var i=1; i<=cantidadPer; i++){
				cadena=cadena+"<p class='work_data'>"+"Modulo: "+data['perfil'+i].modulo+"<br>"+
				"Posición: "+data['perfil'+i].posicion+"<br>"+
				"Sucursal: "+data['perfil'+i].sucursal+"<input id='idp' type='hidden' value='"+data['perfil'+i].idp+"'/></p>";
			}
			$("#perf").html(cadena);
			// if(data['perfil1'].modulo==="Super" || data['perfil1'].modulo==="root"){
			// 	if(data['perfil1'].posicion==="Super Usuario" || data['perfil1'].posicion==="root"){
			// 		$("#modulo").prop('disabled', true);//la siguiente linea comentada es lo mismo pero con javascript
			// 		// document.getElementById('modulo').disabled = true;
			// 		$("#posicion").prop('disabled', true);
			// 	}
			// }

			/*condiciones para mostrar los permisos del usuario*/
			var cadenaP="<p id='privileges_data'>";
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
			escucha_Permisos();
		}
	});
}
var confPerf=new Array();/*arreglo donde se almacenan los perfiles o elementos a modificar, en el caso
de "setting_user.php" solo se permitira un solo permiso a modificar*/ 
var indiceP=0;//indice que controla la cantidad de elementos que se almacenaran conforme suceda el click
function escucha_Permisos(){
	/*Activo la seleccion de usuarios para modificarlos, se selecciona el usuario de la lista que
	se muestra en la pag users.php*/
	var x=document.getElementsByClassName("work_data");/*selecciono todos los usuarios ya qye se encuentran
	dentro de article*/
	for(var z=0; z<x.length; z++){/*recorro el total de elemtos que se dara la capacidad de resaltar al
		ser seleccionados mediante un click*/
		x[z].onclick=function(){//activo el evento del click
			if($(this).find("input").val()!=0){/*Encuentro el input con el valor de id de permiso*/
				/*La funcion siguiente desmarca todo los articles antes de seleccionar nuevamente a un elemento*/
				limpiar(".work_data");
				$(this).css({'border':'3px solid #f39c12'});
				var y=$(this).find("input");/*Encuentro el input con el valor de id de permiso*/
				confUsers[indice]=y.val();/*Obtengo el valor del input "idPermiso" y lo almaceno*/
				console.log(confUsers[indice]);
				/* indice++; Comento esta linea dado que solo se puede modificar un usuario, y se deja para 
				un uso posterior, cuando se requiera modificar o seleccionar a mas de un elemento, que se
				almacene en el arreglo de confUser los id que identifican al elemento*/
				sessionStorage.setItem("confp", confUsers[indice]);
			}
		};
	}
}

/*Función que direcciona para dar de alta un nuevo perfil laboral de un usuario en la pagina de configuración
de usuarios "setting_user.php"*/
function perfil_mas(){
	var ss=sessionStorage.getItem('conf');
	var link="altaPermiso.php?id="+ss;
	document.location.href=link;
}

function cerrarSesion(){
	sessionStorage.removeItem("id");
	sessionStorage.removeItem("conf");
	sessionStorage.removeItem("confp");
	document.location.href="index.php";
}
/*Funcion para modificar un permiso de un usuario llamada desde la pagina "modPerfil.php" para agregar
los datos faltantes para hacer el update*/
function modPerfil(){
	var ss=sessionStorage.getItem('confp');
	var parametros = {
        "idp" : ss
       	};
    $.ajax({
		/*paso los paramentros al php*/
		data:parametros,
		url: 'dataPerm.php',
		type:'post',
		/*defino el tipo de dato de retorno*/
		dataType:'json',
		/*funcion de retorno*/
		success: function(data){
			$("#nom").html(data['nom']);
			var cadenaP=data['noms']+" "+data['dirs'];
			$("#label_suc").html(cadenaP);
			// $("#suc").val(data['suc']);
			$("#idu").val(data['idu']);
			$("#pos").html(data['pos']);
			$("#mod").html(data['mod']);
			$("#idp").val(ss);		
		}
	});
}

/*FUNCIÓN PARA ELIMINAR USUARIOS*/
function deleteUser(){
	var ss=sessionStorage.getItem('conf');
	var ids=sessionStorage.getItem("id");
	var id=JSON.parse(ids);//Conviero la cadena a un JSON para acceder a los datos
	if (ss===id.id){
		alert("No te puedes eliminar");
	}else{
		var parametros = {
        "idu" : ss
       	};
    	$.ajax({
			/*paso los paramentros al php*/
			data:parametros,
			url: 'deleteuser.php',
			type:'post',
			// defino el tipo de dato de retorno
			dataType:'json',
			/*funcion de retorno*/
			success: function(data){
				if(data['ok']==1){
					document.location.href="usersroot.php";
				}else{
					document.location.href="users.php";
				}
			}
		});
	}
}
/*FUNCIÓN PARA ELIMINAR PERMISOS*/
function deletePer(){
	var ss=sessionStorage.getItem('confp');
	var parametros = {
        "idp" : ss
   	};
   	$.ajax({
		/*paso los paramentros al php*/
		data:parametros,
		url: 'deleteper.php',
		type:'post',
		// defino el tipo de dato de retorno
		dataType:'json',
		/*funcion de retorno*/
		success: function(data){
			document.location.href="setting_user.php";
		}
	});
}
/*Función para consultar y registrar una cita a una persona y saber si es ya un paciente o si no,
registrarlo como nuevo paciente que posteriormente en su consulta se capaturaran todos sus dato*/
function busq_paciente(){
	var name=document.getElementById("chk_name").value;
	var lastname=document.getElementById("chk_lastname").value;
	var dateBirt=document.getElementById("chk_date").value;
	if(name==="" || dateBirt==="" || lastname===""){
		alert("Por favor ingresa datos para buscar");
	}else{
		var parametros = {
	        "nom" : name,
	        "ap" : lastname,	        
	        "dateB": dateBirt
	   	};
	   	$.ajax({
			/*paso los paramentros al php*/
			data:parametros,
			url: 'busquedaPaciente.php',
			type:'post',
			// defino el tipo de dato de retorno
			dataType:'json',
			/*funcion de retorno*/
			success: function(data){
				alert("funciono");
			}
		});	
	}
}