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
	// alert(passW);
	// alert("hola");
}
// Daniel Code end
// $.ajax({
// 	data:obtenerDatos();
//   url: 'perfil.php',
//   dataType: 'json',
//   data: data,
//   success: callback
// });

// function obtenerDatos(){
// 	 // Se almacenan todos los datos en un arreglo
//     datos = [{name:"nombre",value:},{name:"paterno", value:$("#paterno").val()},{name:"materno", value:$("#materno").val()},{name: "nombre", value:$("#nombre").val()},{name:"idiomas", value:idiomas}];
//     // Se regresa la variable datos con toda la informacion del alumno
//     return datos;
// }