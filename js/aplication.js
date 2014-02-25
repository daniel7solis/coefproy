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
    	tam,
	fromTempToAgenda = 0;
// Si ocurre un re-dimensionamiento de la ventana.
$( window ).resize(function() {
  resetSize();
});
// Cuando la página ya cargó...
$( document ).ready(function()
{
	var ses = sessionStorage.getItem("id");
		var idim = JSON.parse(ses);
		$('#deploy_menu').prepend("<img src='images/users/"+idim.id+".png' />");
	// Se obtiene la fecha actual (agenda.php)
	actual();
	revisarSesion();
	actualdate();
	resetSize();
	// Se asigna al campo para verificar la fecha del paciente.
	$('#chk_date').datepicker(
	{
		changeMonth: true,
    	changeYear: true,
    	yearRange: '1900:+0'
	});

	/* Se valida y se envía a la fecha deseada de la agenda.
	Aquí ya no nos preocupamos por las citas, ya que se generan 
	dinámicamente desde la base de datos. Ahora sabemos realmente las
	citas agendadas.*/

	// Se asigna la capacidad al botón de Quick Access de una nueva cita.
	$('#new_h').on('click', function()
	{
		alert("Ahora, selecciona la hora a agendar...");
		$('.calendar_row').unbind('click');
		$('header, nav, #up_content, #quick_access, #date_changer, footer, #down_content, #content_calendar').css({'-webkit-filter':'blur(6px)'});
		$('.droppable_hour').on('click', function()
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
		revert:'invalid',
		drag: function()
		{
			$('.temporal_droppable').css({'border':'2px dashed gray','color':'gray'});
		}
	}).resizable();

	$('.temporal_droppable').droppable({
		accept:'div',
	    helper:'',
	    over: function()
	    {
	    	var aver = $(this).find(".draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6").length;
	    	averglob = aver;
	    	if ( aver == 0 )
	    	{
	    		// No hay nada y si puede ponerlo.
	    		c=true;
	    		tam=0;
	    	}
	    	else
	    	{
	    		// Hay algo y no puede ponerlo.
	    		tam = aver;
	    		c=false;
	    	}
	    },
	    drop: function( event, ui ) 
	    {
			if(c==true)
			{
				$(this).html('');
				ui.draggable.width($(this).width()-25);
				$(this).append(ui.draggable);
				c=false;
				resetSize();
				ui.draggable.children().html('A cambiar...');
		    	$('.temporal_droppable').css({'border':'transparent','color':'transparent'});

		    	ui.draggable.attr('value','true');
		    	var ident = ui.draggable.attr('id');
		    	var param = {'id':ident};
		    	$.ajax({
		    		data: param,
		            url: 'putOntemp.php',
		            type: 'post',
		            dataType: 'json'
		    	});
			}
	    }
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
	    	}
	    	else
	    	{
	    		tam = aver;
	    		c=false;
	    	}
	    },
	    drop: function( event, ui ) 
	    {
	    	if(ui.draggable.attr('value')=='true')
	    	{
	    		var recieved_mes;
	    		
	    		if((recieved_month+1)<10)
	    		{
	    			recieved_mes = "0"+(recieved_month+1);
	    			alert(recieved_day+" "+recieved_mes+" "+recieved_year);
	    		}
	    		else
	    		{
	    			alert(recieved_day+" "+(recieved_month+1)+" "+recieved_year);
	    		}

	    		$(this).append(ui.draggable);
		    	ui.draggable.children().html($(this).parent().attr('value'));
		    	ui.draggable.attr('value','false');
		    	resetSize();
	    		var newhora = $(this).parent().attr('value')
		    	var ident = ui.draggable.attr('id');
		    	var param = {'h':newhora,'id':ident,'nd':recieved_day};
		    	$.ajax({
		    		data: param,
		            url: 'reagendar.php',
		            type: 'post',
		            dataType: 'json'
		    	});
	    	}
	    	else
	    	{
	    		if(ui.draggable.children().text()!=$(this).parent().attr('value'))
		    	{
			    	if(!c)
			    	{
			    		var nuevo = (parseInt($(this).width()/(tam+1)));
			    		$(this).children().css('width',nuevo+'px');
			    	}
		    		ui.draggable.css('width',nuevo+'px');
		    		$(this).append(ui.draggable);
		    	}
		    	$(this).append(ui.draggable);
		    	ui.draggable.children().html($(this).parent().attr('value'));
		    	resetSize();

		    	$('.temporal_droppable').css({'border':'transparent','color':'transparent'});

		    	var newhora = $(this).parent().attr('value')
		    	var ident = ui.draggable.attr('id');
		    	var param = {'h':newhora,'id':ident};
		    	$.ajax({
		    		data: param,
		            url: 'updatehour.php',
		            type: 'post',
		            dataType: 'json',
		            success: function(o)
		            {
		            	alert("Se modificó a las "+newhora);
		            }
		    	});
	    	}
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
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-80)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
			else if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length==4)
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-105)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
			}
			else if($('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length>=5)
			{
				$('#c'+i).children().width(parseInt(($('#c'+i).width()-130)/$('#c'+i).find('.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6').length));
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
		recieved_month = now.getMonth();
		recieved_year = now.getFullYear();
		$aux = $('#actual_day_name');
		$aux.html(recieved_nday);
		$aux = $('#actual_day_numb');
		$aux.html(recieved_day);
		$aux = $('#actual_month');
		$aux.html(mesesagenda[recieved_month]);
		$aux = $('#actual_year');
		$aux.html(recieved_year);
	}
	else
	{
		recieved_nday = getParameterByName("ndia");
		recieved_day = getParameterByName("dia");
		recieved_month = getParameterByName("mes");
		console.log(recieved_month);
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