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
	getDuration();
	// Se asigna al campo para verificar la fecha del paciente.
	$('#chk_date').datepicker(
	{
		dateFormat: "dd-mm-yy",
		changeMonth: true,
    	changeYear: true,
    	yearRange: '1900:+0'
	});
	/*Eloi Daniel Cruz Solis CODE*/
	/*Datepicker de la pagina nuevacita.php en los campos de registro de un nuevo paciente*/
	$('#np_fn').datepicker(
	{
		dateFormat: "dd-mm-yy",
		changeMonth: true,
    	changeYear: true,
    	yearRange: '1900:+0'
	});
	/*END CODE Eloi Daniel Cruz Solis*/
	$('.draggable_hour').hover(function(){$(this).find('.manageapp').css({'display':'block'})},function(){$(this).find('.manageapp').css({'display':'none'})});

	/* Se valida y se envía a la fecha deseada de la agenda.
	Aquí ya no nos preocupamos por las citas, ya que se generan 
	dinámicamente desde la base de datos. Ahora sabemos realmente las
	citas agendadas.*/

	// Se asigna la capacidad al botón de Quick Access de una nueva cita.
	$('#new_h').on('click', function()
	{
		// alert("Ahora, selecciona la hora a agendar...");
		$('.calendar_row').unbind('click');
		$('header, nav, #up_content, #quick_access, #date_changer, footer, #down_content, #content_calendar').css({'-webkit-filter':'blur(6px)'});
		$('.droppable_hour').on('click', function()
		{
			hora = $(this).parent().attr('value');
			/*Eloi Daniel Cruz Solis CODE*/
			if(recieved_day)
			var paraJson='{"ndia":"'+recieved_nday+'","dia":"'+recieved_day+'","mes":"'+recieved_month+'","ano":"'+recieved_year+'","hora":"'+hora+'"}';
			localStorage.setItem("cit", paraJson);
			document.location.href = "nuevacita.php";
			// ?ndia="+recieved_nday+"&dia="+recieved_day+"&mes="+recieved_month+"&ano="+recieved_year+"&hora=" + hora
			/*END CODE Eloi Daniel Cruz Solis*/
		});
	});

	// Se esconde el globo de la cuenta.
	$( '#menu' ).hide();
	$( 'html' ).click(function() 
	{
		$('#menu').hide('swing');
	});
	
	var c=true, original, averglob;
	// Se asigna la capacidad de contenedor a las celdas (generadas dinámicamente) de agenda.php
	$( '.droppable_hour' ).droppable(
	{
	    accept:'div',
	    helper:'',
	    over: function()
	    {
	    	var aver = $(this).find(".draggable_hour").length;
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
	    		$(this).append(ui.draggable);
		    	ui.draggable.find('.here_hour').html($(this).parent().attr('value'));
		    	ui.draggable.attr('value','false');
		    	resetSize();
	    		var newhora = $(this).parent().attr('value')
		    	var ident = ui.draggable.attr('id');
		    	var param = {'h':newhora,'id':ident,'nd':recieved_day,'nm':recieved_month,'na':recieved_year};
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
	$('.manage_options').hide();
});
function getDuration()
{
	for (var i = 0; i < 48; i++) 
	{
		if($('#c'+i).find('.draggable_wrapper').length!=0)
		{
			if($('#c'+i).find('.draggable_wrapper').length==1)
			{
				var x = $('#c'+i).find('.draggable_wrapper').children().attr('title');
				var nx = ((x/15)*30)+10;
				console.log(x+" - "+nx);
				$('#c'+i).find('.draggable_wrapper').children().css({'height':nx});
			}
			else
			{
				var cits = $('#c'+i).find('.draggable_wrapper').children(); // Hasta aquí es un objeto jQuery.
				var qty = $('#c'+i).find('.draggable_wrapper').length;
				for (var j = 0; j < qty; j++) 
				{
					var x = $(cits[j]).attr('title');
					var nx = ((x/15)*30)+10;
					console.log(x+" - "+nx);
					$(cits[j]).css({'height':nx});
				}
			}
		}
	}
}
// Función que detecta cuántos elementos hay dentro de un droppable y los reajusta.
function resetSize()
{
	for (var i = 0; i < 48; i++) 
	{
		if($('#c'+i).find('.draggable_wrapper').length!=0)
		{
			if($('#c'+i).find('.draggable_wrapper').length==1)
			{
				$('#c'+i).children().width(($('#c'+i).width()-5)/$('#c'+i).find('.draggable_wrapper').length);
				$('#c'+i).children().children().width($('#c'+i).children().width()-23);
			}
			else if($('#c'+i).find('.draggable_wrapper').length==2)
			{
				$('#c'+i).children().width(($('#c'+i).width()-5)/$('#c'+i).find('.draggable_wrapper').length);
				$('#c'+i).children().children().width($('#c'+i).children().width()-23);
			}
			else if($('#c'+i).find('.draggable_wrapper').length==3)
			{
				$('#c'+i).children().width(($('#c'+i).width()-5)/$('#c'+i).find('.draggable_wrapper').length);
				$('#c'+i).children().children().width($('#c'+i).children().width()-23);
			}
			else if($('#c'+i).find('.draggable_wrapper').length==4)
			{
				$('#c'+i).children().width(($('#c'+i).width()-5)/$('#c'+i).find('.draggable_wrapper').length);
				$('#c'+i).children().children().width($('#c'+i).children().width()-23);
			}
			else if($('#c'+i).find('.draggable_wrapper').length==5)
			{
				$('#c'+i).children().width(($('#c'+i).width()-8)/$('#c'+i).find('.draggable_wrapper').length);
				$('#c'+i).children().children().width($('#c'+i).children().width()-23);
			}
			else if($('#c'+i).find('.draggable_wrapper').length>=6)
			{
				$('#c'+i).children().width(($('#c'+i).width()-8)/$('#c'+i).find('.draggable_wrapper').length);
				$('#c'+i).children().children().width($('#c'+i).children().width()-23);
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
		var dt = new Date(), hrs = dt.getHours(), mins = dt.getMinutes(), mer = "am";
		if(hrs>12){hrs-=12;mer="pm";}
		if(mins<10){mins="0"+mins;}
		if(mins>=0&&mins<15){mins = "00";}
		if(mins>=15&&mins<30){mins = 15;}
		if(mins>=30&&mins<45){mins = 30;}
		if(mins>=45){mins = 45;}
		var time = hrs+":"+mins+mer;
		for (var i = 0; i < 48; i++) 
		{
			var str = "#c"+i;
			var t = $(str).parent().attr('value');
			if(t == time)
				{
					$(str).css({'border-bottom':'4px solid #DD4F24'});
				}
		};
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
		recieved_month+=1;
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
function ListarTemps()
{
   	var miusuario = JSON.parse(sessionStorage.getItem('id'));
   	var param = {'us':miusuario.id,'pass':miusuario.idd};
    	$.ajax({
	   		data: param,
	        url: 'getTemps.php',
            type: 'post',
            dataType: 'json',
            success: function(data)
            {
            	var index = data['nc'], citas;
            	for (var i = 0; i < index; i++) 
            	{
            		citas+="<tr><td class='temporal_droppable'><span id='ppp'>Guarda aquí...</span>"+
            		"<div class='draggable_wrapper'><div id='"+data['cita'+i].id+"' class='draggable_hour' title="+data['cita'+i].minuts+" style='width:100px;' value='true'><div class='app_identifier'>Id."+data['cita'+i].idpac+"&nbsp;-&nbsp;<span class='here_hour'>...</span></div><a class='manageapp' href='javascript:showManageOptions();'></a><div class='draggable_tag_"+data['cita'+i].iddoc+"'></div><div class='manage_options'><a class='manage_option_man'>Modificar</a><a class='manage_option_del'>Eliminar</a></div></div></div>"+
            		"</td></tr>";
            	};
            	citas+="<tr><td class='temporal_droppable'><span>Guarda aquí...</span></td></tr>";
            	$('#temporal_date_catcher').html(citas);
            	reAsignarDrags();
            }
    	});
}
function reAsignarDrags()
{
	$('.manage_options').hide();
	$('.manageapp').on('click', function(){
		$(this).parent().find('.manage_options').toggle('swing');
	});

	$('.draggable_hour').hover(function(){$(this).find('.manageapp').css({'display':'block'})},function(){$(this).find('.manageapp').css({'display':'none'})});
	$('#ppp').css({'display':'none'});

	$( '.draggable_wrapper' ).draggable(
	{
		
   		appendTo: "body",
   		cursor: 'move',
		revert:'invalid',
		cursorAt: {left:50, top:0},
		drag: function()
		{
			$('.temporal_droppable').css({'border':'2px dashed gray','color':'gray'});
			$(this).height(40);
			$(this).children().height(40);
		},
		helper: function() 
		{
	        var helper = $(this).children().clone();
	        helper.animate({width:100,height:40});
	        helper.css({'width': '100px'});
	        return helper;
   		}
	});

	// Se asigna la capacidad de contenedor a las celdas (generadas dinámicamente) de agenda.php
	$( '.droppable_hour' ).droppable(
	{
	    accept:'div',
	    helper:'',
	    over: function()
	    {
	    	$(this).addClass('visual_help');
	    	var aver = $(this).find(".draggable_wrapper").length;
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
	    	if(ui.draggable.children().attr('value')=='true'||ui.draggable.attr('value')=='true')
	    	{
	    		ui.draggable.css({'display':'inline-block'});
	    		$(this).append(ui.draggable);
		    	ui.draggable.find('.here_hour').html($(this).parent().attr('value'));
		    	ui.draggable.attr('value','false');
		    	resetSize();
	    		var newhora = $(this).parent().attr('value');
	    		var ident = ui.draggable.find('.draggable_hour').attr('id');
		    	var param = {'h':newhora,'id':ident,'nd':recieved_day,'nm':recieved_month,'na':recieved_year};
		    	$.ajax({
		    		data: param,
		            url: 'reagendar.php',
		            type: 'post',
		            dataType: 'json'
		    	});
		    	$('#pop_notification_title').html('¡Listo! Re-agendado');
		    	$('#pop_notification_content').html('La cita se ha cambiado exitosamente a las '+newhora+' del '+recieved_day+'/'+recieved_month+'/'+recieved_year+'.');
		    	showPopUp();
		    	getDuration();
	    	}
	    	else
	    	{
	    		if(ui.draggable.children().children().text()!=$(this).parent().attr('value'))
		    	{
			    	if(!c)
			    	{
			    		var nuevo = (parseInt($(this).width()/(tam+1)));
			    		$(this).children().css('width',nuevo+'px');
			    	}
			    	ui.draggable.css('width',nuevo+'px');
		    		ui.draggable.children().css('width',nuevo+'px');
		    		$(this).append(ui.draggable);
		    	}
		    	$(this).append(ui.draggable);
		    	ui.draggable.find('.here_hour').html($(this).parent().attr('value'));
		    	resetSize();

		    	$('.temporal_droppable').css({'border':'transparent','color':'transparent'});

		    	var newhora = $(this).parent().attr('value');
		    	var ident = ui.draggable.find('.draggable_hour').attr('id');
		    	var param = {'h':newhora,'id':ident};
		    	$.ajax({
		    		data: param,
		            url: 'updatehour.php',
		            type: 'post',
		            dataType: 'json'
		    	});
		    	$('#pop_notification_title').html('¡Listo! Re-agendado');
		    	$('#pop_notification_content').html('La cita se ha cambiado exitosamente a las '+newhora);
		    	showPopUp();
	    	}
	    	getDuration();
	    	$(this).removeClass('visual_help');
	    },
	    out: function()
	    {
	    	$(this).removeClass('visual_help');
	    }
	});

	$('.temporal_droppable').droppable({
		accept:'div',
	    helper:'',
	    over: function()
	    {
	    	var aver = $(this).find(".draggable_wrapper").length;
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
			ui.draggable.css({'display':'inline-block'});
			if(c==true)
			{
				$(this).find('span').css({'display':'none'});
				ui.draggable.width($(this).width()-25);
				ui.draggable.children().width($(this).width()-25);
				$(this).append(ui.draggable);
				c=false;
				resetSize();
				ui.draggable.find('.here_hour').html('...');
		    	$('.temporal_droppable').css({'border':'transparent','color':'transparent'});

		    	var ident = ui.draggable.children().attr('id');
		    	var miusuario = JSON.parse(sessionStorage.getItem('id'));
		    	var param = {'id':ident,'us':miusuario.id,'pass':miusuario.idd};
		    	$.ajax({
		    		data: param,
		            url: 'putOntemp.php',
		            type: 'post',
		            dataType: 'json'
		    	});
		    	if(ui.draggable.attr('value')!='true')
		    	{
		    		$(this).parent().parent().append("<tr><td class='temporal_droppable'><span>Guarda aquí...</span></td></tr>");
		    		reAsignarDrags();
		    	}
		    	ui.draggable.attr('value','true');
			}
			$('#pop_notification_title').html('¡Listo! Ahora es temporal');
		    $('#pop_notification_content').html('La cita se ha movido a temporales. No olvide Re-agendar.');
		    showPopUp();
		    getDuration();
	    },
	    out: function( event, ui )
	    {
	    	$(this).find('span').css({'display':'inline-block'});
	    }
	});
	$('.draggable_hour').css({'position':'absolute'});
}
function showPopUp()
{
	$('#pop_notification').fadeIn( "fast" ).delay( 7000 ).fadeOut( "slow" );
}