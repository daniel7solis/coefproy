    var year = new Date().getFullYear();
    var month = new Date().getMonth();
    var day = new Date().getDate();

    var eventData = {
        events : [
           {"id":1, "start": new Date(year, month, day, 12), "end": new Date(year, month, day, 13, 35),"title":"Lunch with Mike"},
           {"id":2, "start": new Date(year, month, day, 14), "end": new Date(year, month, day, 14, 45),"title":"Dev Meeting"},
           {"id":3, "start": new Date(year, month, day + 1, 18), "end": new Date(year, month, day + 1, 18, 45),"title":"Hair cut"},
           {"id":4, "start": new Date(year, month, day - 1, 8), "end": new Date(year, month, day - 1, 9, 30),"title":"Team breakfast"},
           {"id":5, "start": new Date(year, month, day + 1, 14), "end": new Date(year, month, day + 1, 15),"title":"Product showcase"}
        ]
    };


       
    $(document).ready(function() {

        $('#calendar').weekCalendar({
            timeslotsPerHour: 4,
            height: function($calendar){
                return $(window).height() - $("h1").outerHeight();
            },
            eventRender : function(calEvent, $event) {
                if(calEvent.end.getTime() < new Date().getTime()) {
                    $event.css("backgroundColor", "#aaa");
                    $event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
                }
            },
            eventNew : function(calEvent, $event) {
                displayMessage("<strong>Added event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
                alert("You've added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.");
            },
            eventDrop : function(calEvent, $event) {
                displayMessage("<strong>Moved Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
            },
            eventResize : function(calEvent, $event) {
                displayMessage("<strong>Resized Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
            },
            eventClick : function(calEvent, $event) {
                displayMessage("<strong>Clicked Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
            },
            eventMouseover : function(calEvent, $event) {
                displayMessage("<strong>Mouseover Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
            },
            eventMouseout : function(calEvent, $event) {
                displayMessage("<strong>Mouseout Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
            },
            noEvents : function() {
                displayMessage("There are no events for this week");
            },
            data:eventData
        });

        function displayMessage(message) {
            $("#message").html(message).fadeIn();
        }

        $("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($("body"));
        
    });