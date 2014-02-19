<?php
	// Recibo datos de pagina perfil con AJAX, y pregunto si existe valor en el metodo $_POST, para continuar
	if($_POST){
		$id=$_POST['id'];
		$nom=$_POST['user'];
		/*Hacer de nuevo la conexion (aun no se si es la manera mas apropiada) ----verificar-----*/
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		// Defino que la conexion con la base de datos sera con la codificacion UTF-8
		mysql_set_charset("utf8", $conexion); 
		/*fin para verificar*/

		/*Consulto los permisos que tiene el usuario, dentro de los permisos un usuario puede
		tener mas de un perfil, lo que corresponde por cada perfil de permisos se tiene una posicion ("puesto")
		y un modulo ("departamento") dentro de la DB*/
		$datos=mysql_query("select * from permisosusuarios where idUsuarios='$id'",$conexion);
		//Se evalua 
		$cont=0;//respaldar la cantidad de iteraciones que ocurrieron durante la consulta de los perfiles de un usuario
		$x=1;/*variable que controla el numero de perfiles de un usuario, se concatena a $perfil, para crear una funcion
		que recupere de manera dinamica los "n" perfiles que se puede tener.. perfil1,perfil2,pefil3,....,perfil"n"*/

		/*En el arreglo "datos" se tiene almacenado la cantidad de permisos con su respectiva información,
		cada iteración del ciclo while significan uno mas a la cantidad de perfiles que tiene el usuario;
		y en el areglo "perfil" se concatena la "x" para almacenar la informacion de cada perfil en su arreglo
		correspondiente, por ejemplo, en el arrglo "perfil0" se tiene la informacion de un perfil del usuario,
		en el "perfil1" la información del segundo perfil y así sucesivamente hasta "n" perfiles */
		while ($arreglo=mysql_fetch_array($datos, MYSQLI_BOTH)){
			$codestring='$perfil'.$x.';';
			eval($codestring);
			for ($i=0; $i <count($arreglo)/2; $i++) { 
				$codestring='$perfil'.$x.'[$i]=$arreglo[$i];';
				eval($codestring);
			}
			$x++;
			$cont++;
		}
		$numPerfiles=$cont_r=$cont;/*respaldo la cantidad de iteraciones, para posteriormente hacer el match de los permisos
		de cada perfil, y asi calcular los permisos superiores que tiene el usuario*/
		$x=1;//regreso variable a 1 de los subindices de los perfiles
		$perfiles="";//cadena para concatenar los valores de cada perfil del usuario

		/*Durante el ciclo while se accedera a los datos de cada perfil que pueda tener el usuario
		de esta manera consultando en la DB la informacion como el id de permiso, modulo, posicion y sucursal
		del perfil en curso*/
		while ($cont>0) {
			$codestring='$p=$perfil'.$x.'[0];';//guardo en "p" el id del permiso
			eval($codestring);//evaluo como codigo la cadena que se pasa como argumento
			$codestring='$z=$perfil'.$x.'[3];';/*guando en z el identificador de modulo para 
			posteriormente consultar el nombre del modulo en la DB*/
			eval($codestring);
			/*Con la variable "mod" al concatener el subindice "x" se captura el modulo correspondiente
			al perfil en curso, y asi para capturar los modulos de cada perfil para posteriormente
			obtener los permisos superiormes del usuario*/
			$codestring='$mod'.$x.'='.$z.';';
			eval($codestring);
			/*Consulto en la base de datos el nombre del modulo para pasarlo en el objeto json*/
			$modulo=mysql_query("select modName from modulos where idModulo='$z'",$conexion);
			$reg=mysql_fetch_array($modulo);
			$moduloJ=$reg[0];//almaceno en la variable, para concatenarlo al objeto json
			$codestring='$z=$perfil'.$x.'[4];';//almaceno en z el id de la posicion del perfil en curso para consltarlo en la DB
			eval($codestring);
			/*Con la variable "pos" al concatener el subindice "x" se captura la posicion correspondiente
			al perfil en curso, y asi para capturar las posiciones de cada perfil para posteriormente
			obtener los permisos superiormes del usuario*/
			$codestring='$pos'.$x.'='.$z.';';
			eval($codestring);
			/*Consulto en la base de datos el nombre de la posicion para pasarlo en el objeto json*/
			$posicion=mysql_query("select posicionName from posicion where idPosicion='$z'",$conexion);
			$reg2=mysql_fetch_array($posicion);
			$posicionJ=$reg2[0];
			/*guardo en s el id de la sucursal del perfil de usuario*/
			$codestring='$s=$perfil'.$x.'[1];';
			eval($codestring);
			/*creo la cadena con formato json en la que paso un json anidado con los datos antes capturados */
			$perfiles=$perfiles.',"perfil'.$x.'":{"permiso":"'.$p.'","modulo":"'.$moduloJ.'","posicion":"'.$posicionJ.'","sucursal":"'.$s.'"}';
			$cont--;
			$x++;
		}
		$x=1;
		/*consulto los permisos de cada perfil y los almaceno en el arreglo "perfil" subindice "i"; posteriomente
		se hara el match de todos los permisos de cada perfil para obtener los permisos superiores del usuario*/
		for ($i=1; $i <= $cont_r; $i++) { 
			$codestring='$m=$mod'.$i.';';
			eval($codestring);
			$codestring='$p=$pos'.$i.';';
			eval($codestring);
			$permiso=mysql_query("select accesoTotal,creacion,edicion,lectura,anexar,impresion from permisos where idModulo='$m' and idPosicion='$p'",$conexion);
			$codestring='$permiso'.$i.'=mysql_fetch_array($permiso,MYSQLI_BOTH);';
			eval($codestring);
		}
		$x=1;
		
		$perFin[0]=0;
		$perFin[1]=0;
		$perFin[2]=0;
		$perFin[3]=0;
		$perFin[4]=0;
		$perFin[5]=0;
		/*almaceno en perFin los permisos del perfil anterios y con una operacion OR con el perfil
		siguiente obtengo los permisos superiores; asi continua sucesivamente hasta los n perfiles
		obteniendo como resultado los permisos superiores de cada usuario con respecto a todos sus perfiles*/
		while ($cont_r>0) {
			for ($i=0; $i < count($permiso1)/2; $i++){
				$codestring='$perFin[$i]=$permiso'.$x.'[$i] | $perFin[$i];';
				eval($codestring);
			}
			$cont_r--;
			$x++;
		}
		/*Cadena con formato json*/
		$cadenaJson='{"id":'.$id.',"user":"'.$nom.'","numPerfiles":"'.$numPerfiles.'"'.$perfiles.',"at":'.$perFin[0].',"c":'.$perFin[1].',"e":'.$perFin[2].',"l":'.$perFin[3].',"a":'.$perFin[4].',"i":'.$perFin[5].'}';
		echo $cadenaJson;
	}else{
		/*En caso de no recibir datos de la llamada ajax se pasa un json de error*/
		$arr = array('fallo' => "fallo");
		$json = json_encode($arr);
		echo $json;
	}
?>
