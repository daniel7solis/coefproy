$( document ).ready(function()
			{
				actualdate();var hora, url = 'nuevacita.php';
				$('#new').on('click', function(){
					$('tr').on('click', function(){
						hora = $(this).attr('value');
						document.location.href = "nuevacita.php?hora=" + hora;
					});
				});
				$( '#menu' ).hide();
				$( 'html' ).click(function() 
				{
					$('#menu').hide('swing');
				});

				$('#tores1').resizable();

				$( '.draggable_hour_1, .draggable_hour_2, .draggable_hour_3, .draggable_hour_4, .draggable_hour_5, .draggable_hour_6' ).draggable({
        		appendTo: "body",
        		snap: true,
        		cursor: 'move',
    			helper: 'clone',
    			revert:'invalid'
    			});

    			var c=true;

				$( '.droppable_hour' ).droppable({
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