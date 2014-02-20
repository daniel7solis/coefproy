
function revisarSesion()
{
	if(sessionStorage.length!=0)
	{
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
					alert(data['ok']);
					document.location.href="../perfil.php";
				}
				else
				{
					alert("OMG");
				}
			},
		});	
	}
	else
	{
		document.location.href="/webdev/app1ene14/";
	}
}
