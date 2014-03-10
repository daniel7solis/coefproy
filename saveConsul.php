<?php
	if($_POST){
		$idp=2;//$_POST['id'];
		$fConsCon=$_POST['consCons'];
		$peso=$_POST['peso'];
		$ta=$_POST['ta'];
		$fNac=$_POST['fn'];
		$edad=$_POST['edad'];
		$ahf=$_POST['ahf'];
		$varicela=$_POST['varicela'];
		$rubeola=$_POST['rubeola'];
		$sarampion=$_POST['sarampion'];
		$parotiditis=$_POST['parotiditis'];
		$fiebreR=$_POST['fiebre'];
		$otros=$_POST['otros'];
		$qx=$_POST['qx'];
		$fx=$_POST['fx'];
		$alergias=$_POST['alergias'];
		$hospita=$_POST['hospita'];
		$alimen=$_POST['alimen'];
		$tabaquismo=$_POST['tabaquismo'];
		$alcoholismo=$_POST['alcoholismo'];
		$trans=$_POST['trans'];
		$rh=$_POST['rh'];
		$g=$_POST['g'];
		$p=$_POST['p'];
		$c=$_POST['c'];
		$a=$_POST['a'];
		$ivsa=$_POST['ivsa'];
		$par=$_POST['par'];
		$fum=$_POST['fum'];
		$ritmo=$_POST['ritmo'];
		$dism=$_POST['dism'];
		$disp=$_POST['disp'];
		$fupap=$_POST['fupap'];
		$mpf=$_POST['mpf'];
		$emb=$_POST['emb'];
		$tum_mamas=$_POST['tum_mamas'];
		$inf_genitales=$_POST['inf_genitales'];
		$ardor=$_POST['ardor'];
		$prurito=$_POST['prurito'];
		$conexion=mysql_connect("127.0.0.1","root","warcrack2") or die("Problemas con la conexion de base de datos ".mysql_error());
		mysql_select_db("permisoagenda",$conexion) or die("Problemas en seleccionar la base de datos ".mysql_error());
		mysql_set_charset("utf8", $conexion); 
		mysql_query("update Paciente set fConsuCons='$fConsCon',peso='$peso',ta='$ta',ahf='$ahf',
			varicela='$varicela',rubeola='$rubeola',sarampion='$sarampion',parotiditis='$parotiditis',
			fiebre_reum='$fiebreR',otros='$otros',qx='$qx',fx='$fx',alergias='$alergias',
			hospitalizaciones='$hospita',alimentacion='$alimen',tabaquis='$tabaquismo',
			alcoho='$alcoholismo',transf='$trans',grupoRH='$rh',g='$g',p='$p',c='$c',a='$a',
			ivsa='$ivsa',par='$par',fum='$fum',ritmo='$ritmo',dismino='$dism',dispare='$disp',
			fupap='$fupap',mpf='$mpf',embPrev='$emb',tumMama='$tum_mamas',infGeni='$inf_genitales',
			ardor='$ardor',prurito='$prurito' where idPaciente='$idp'",$conexion) or die(mysql_error());
		// echo '{"ok":"1"}';
		$arr = array('ok' => 1);
		$json = json_encode($arr);
		echo $json;
	}else{
		echo "No se pudo guardar";
	}
?>