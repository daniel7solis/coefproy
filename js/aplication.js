/* -------------------- aplication.js by Daniel Vega -------------------------
   Plugin que contiene las funcionalidades de interacción entre las páginas
   calendario.php, agenda.php y nuevacita.php. Se pasan las variables por url.
   La intención es cambiarlo todo por Local Storage y JSON, mientras aquí se
   hace posible la interacción. También se incluye el comportamiento del globo
   de la cuenta, y la capacidad que tiene la agenda para que los espacios sean
   'droppables' y las citas sean 'draggables'.
*/

// Definición de variables necesarias.
var hora, url = 'nuevacita.php', $aux,
    	recieved_nday,recieved_day,recieved_month,recieved_year,
    	tam;
// Si ocurre un re-dimensionamiento de la ventana.
$( window ).resize(function() {
  resetSize();
});
// Cuando la página ya cargó...
$( document ).ready(function()
{
	// Se obtiene la fecha actual (agenda.php)
	actualdate();
	resetSize();
	// Se asigna al campo para verificar la fecha del paciente.
	$('#chk_date').datepicker(
	{
		changeMonth: true,
    	changeYear: true,
    	yearRange: '1900:+0'
	});
	// se asigna al campo para ver la fecha específicada.
	$('#dc_day').datepicker({
		dateFormat: 'yy-mm-dd', 
	    beforeShow: function (input, inst) 
	    {
	    	// Delimita, sólo de hoy en adelante.
	    	var datelimit = new Date();
	    	datelimit.getDate();
	    	console.log(datelimit);
	    	$(this).datepicker( "option","minDate",datelimit);
	    },
	    onClose: function()
	    {
	    	var diasagenda = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
			mesesagenda = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
			if($('#dc_day').val()=='')
			{
				alert('¡Debe seleccionar una fecha!');
			}
			else
			{
				var yei = $('#dc_day').datepicker('getDate');
				var dow = yei.getUTCDay();
				console.log(diasagenda[(dow-1)]);

				var unsplitted = $('#dc_day').val();
				var date = unsplitted.split('-');
				if(date.length!=3)
				{
					alert('¡Fecha no váilda!');
				}
				else
				{
					document.location.href = "agenda.php?ndia="+diasagenda[(dow-1)]+"&dia="+date[2]+"&mes="+date[1]+"&ano=2014";
				}
			}
	    }
	});

	/* Se valida y se envía a la fecha deseada de la agenda.
	Aquí ya no nos preocupamos por las citas, ya que se generan 
	dinámicamente desde la base de datos. Ahora sabemos realmente las
	citas agendadas.*/

	// Se asigna la capacidad al botón de Quick Access de una nueva cita.
	$('#new').on('click', function()
	{
		$('tr').on('click', function()
		{
			hora = $(this).attr('value');
			document.location.href = "nuevacita.php?ndia="+recieved_nday+"&dia="+recieved_day+"&mes="+recieved_month+"&ano="+recieved_year+"&hora=" + hora;
		});
	});

	// Se esconde el globo de la cuenta.
	$( '#menu' ).hide();
	$( 'html' ).click(function() 
	{
		$('#menu').hide('swing');
	});

	// Se asigna la capacidad de ser arrastable a las citas.
	$( '.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6' ).draggable(
	{
   		appendTo: "body",
   		snap: true,
   		cursor: 'move',
		helper: 'clone',
		revert:'invalid'
	});

	var c=true, original, averglob;
	// Se asigna la capacidad de contenedor a las celdas (generadas dinámicamente) de agenda.php
	$( '.droppable_hour' ).droppable(
	{
	    accept:'div',
	    helper:'',
	    over: function()
	    {
	    	var aver = $(this).find(".draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6").length;
	    	averglob = aver;
	    	if ( aver == 0 )
	    	{
	    		c=true;
	    		tam=0;
	    		console.log('Aquí NO hay '+tam);
	    	}
	    	else
	    	{
	    		tam = aver;
	    		console.log('Aquí hay '+tam);
	    		c=false;
	    	}
	    },
	    drop: function( event, ui ) 
	    {
	    	if(ui.draggable.children().text()!=$(this).parent().attr('value'))
	    	{
		    	if(!c)
		    	{
		    		var nuevo = (parseInt($(this).width()/(tam+1)))-45;
		    		$(this).children().css('width',nuevo+'px');
		    	}
	    		ui.draggable.css('width',nuevo+'px');
	    		$(this).append(ui.draggable);
	    	}
	    	$(this).append(ui.draggable);
	    	ui.draggable.children().html($(this).parent().attr('value'));
	    	resetSize();
	    }
	});
});
// Función que detecta cuántos elementos hay dentro de un droppable y los reajusta.
function resetSize()
{
	for (var i = 0; i < 48; i++) 
	{
		if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length!=0)
		{
			if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length==2)
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-55)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
			else if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length==3)
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-77)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
			else if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length==4)
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-105)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
			else if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length>=5)
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-125)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
			else
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-35)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
		}
	}
}
// Muestra el globo de cuenta.
function mostrar()
{
	$('#menu').slideToggle('swing');
}
// Obtiene parámetros de la URL por nombre.
function getParameterByName(name) 
{
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
   	results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
// Se obtiene la fecha actual o la fecha que se pasó por URL.
function actualdate()
{
	var temp = window.location.href,
	temp2 = temp.split('/'),
	parts;
	$.each(temp2, function(key, line) 
	{
    parts = line.split(' ');
	});
	if(parts[parts.length-1]=='agenda.php'||parts[parts.length-1]=='agenda.php#')
	{
		recieved_nday = diasagenda[now.getDay()];
		recieved_day = now.getDate();
		recieved_month = mesesagenda[now.getMonth()];
		recieved_year = now.getFullYear();
		$aux = $('#actual_day_name');
		$aux.html(recieved_nday);
		$aux = $('#actual_day_numb');
		$aux.html(recieved_day);
		$aux = $('#actual_month');
		$aux.html(recieved_month);
		$aux = $('#actual_year');
		$aux.html(recieved_year);
	}
	else
	{
		recieved_nday = getParameterByName("ndia");
		recieved_day = getParameterByName("dia");
		recieved_month = getParameterByName("mes");
		recieved_year = getParameterByName("ano");
		$aux = $('#actual_day_name');
		$aux.html(recieved_nday);
		$aux = $('#actual_day_numb');
		$aux.html(recieved_day);
		$aux = $('#actual_month');
		$aux.html(mesesagenda[parseInt(recieved_month)-1]);
		$aux = $('#actual_year');
		$aux.html(recieved_year);
	}
}