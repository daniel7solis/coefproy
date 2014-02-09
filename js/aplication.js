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

// Cuando la página ya cargó...
$( document ).ready(function()
{
	// Se obtiene la fecha actual (agenda.php)
	actualdate();
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

	var c=true, original;
	// Se asigna la capacidad de contenedor a las celdas (generadas dinámicamente) de agenda.php
	$( '.droppable_hour' ).droppable(
	{
	    accept:'div',
	    helper:'',
	    over: function()
	    {
	    	var aver = $(this).find(".draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6").length;
	    	if ( aver == 0 )
	    	{
	    		c=true;
	    		console.log("Si "+aver+" "+c);
	    	}
	    	else
	    	{
	    		tam = aver+1;
	    		c=false;
	    		console.log("No "+aver+" "+c);
	    	}
	    },
	    drop: function( event, ui ) 
	    {
	    	if(!c)
	    	{
	    		var nuevo = (ui.draggable.width()/tam)-35;
	    	}
	    	console.log((parseInt(nuevo,10)));
	    	ui.draggable.css('width',(parseInt(nuevo,10))+'px');
	    	$(this).append(ui.draggable);
	    }
	});
});
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
	if(parts[parts.length-1]=='agenda.php')
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
		$aux.html(recieved_month);
		$aux = $('#actual_year');
		$aux.html(recieved_year);
	}
}