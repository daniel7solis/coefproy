function revisarSesion()
{
	if(sessionStorage.length!=0)
	{
		var chk = sessionStorage.getItem("id");
		var now = JSON.parse(chk);
		var parametros = {'idd':now.idd,'n':now.nombre};
		$.ajax({
			data: parametros,
			url: 'checknoroot.php',
			type: 'post',
			dataType: 'json',
			success: function(data){
				if(data['ok']==1)
				{
					
					document.location.href="root/perfil.php";
				}
			},
		});	
	}
	else
	{
		document.location.href="/webdev/app1ene14/";
	}
}

function revisarSesionIndex()
{
	if(sessionStorage.length!=0) // Hay algo...
	{
		document.location.href="perfil.php";
	}
}
