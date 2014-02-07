var hora, url = 'nuevacita.php', $aux,
    	recieved_nday,recieved_day,recieved_month,recieved_year;

$( document ).ready(function()
{
	actualdate();
	$('#new').on('click', function()
	{
		$('tr').on('click', function()
		{
			hora = $(this).attr('value');
			document.location.href = "nuevacita.php?ndia="+recieved_nday+"&dia="+recieved_day+"&mes="+recieved_month+"&ano="+recieved_year+"&hora=" + hora;
		});
	});
	$( '#menu' ).hide();
	$( 'html' ).click(function() 
	{
		$('#menu').hide('swing');
	});

	$('#tores1').resizable();

	$( '.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6' ).draggable(
	{
   		appendTo: "body",
   		snap: true,
   		cursor: 'move',
		helper: 'clone',
		revert:'invalid'
	});

	var c=true;

	$( '.droppable_hour' ).droppable(
	{
	    accept:'div',
	    helper:'',
	    over: function()
	    {
	    	if ( $(this).find(".draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6").length == 0 )
	    	{
	    		c=true;
	    	}
	    	else
	    	{
	    		c=false;
	    	}
	    },
	    drop: function( event, ui ) 
	    {
	    	if(c==true)
	    	{
	    		$(this).append(ui.draggable);
	    		c=false;
	    	}
	    }
	});
});

function mostrar()
{
	$('#menu').slideToggle('swing');
}

function getParameterByName(name) 
{
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
   	results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

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