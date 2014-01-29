                $( '.draggable_hour_1' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});
    			$( '.draggable_hour_2' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});
    			$( '.draggable_hour_3' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});
    			$( '.draggable_hour_4' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});
    			$( '.draggable_hour_5' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});
    			$( '.draggable_hour_6' ).draggable({
        		appendTo: "body",
    				helper: 'clone',
    			});

				$( '.droppable_hour' ).droppable({

				    accept:'div',
				    activeClass: "ui-state-default",
				    hoverClass: "ui-state-hover",
				 	greedy: true,
				    drop: function( event, ui ) 
				    {
				    	$(this).droppable('option', 'accept', ui.draggable);
    					$(this).append(ui.draggable);
				    },
					out : function(event, ui) {
						$(this).droppable('option', 'accept', '.draggable_hour_1');
					}
				});