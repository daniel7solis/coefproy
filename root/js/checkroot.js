$(document).ready(function(){
	var chk = sessionStorage.getItem("id");
	var now = JSON.parse(chk);
	var parametros = {'idd':now.idd,'n':now.nombre,'s':now.s};
	$.ajax({
		data: parametros,
		url: 'checknoroot.php',
		type: 'post',
		dataType: 'json',
		success: function(data){
			if(data['ok']==1)
			{
				document.location.href="../perfil.php";
			}
		},
	});
});
