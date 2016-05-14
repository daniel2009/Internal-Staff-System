$(document).ready(function() {
	$("#mentor-attending-submit").click(function(){

		if ($("#event_keyword").val() == "") {
			confirm("Keyword is required!");
		} else if ($("#mentor").val() == "") {
			confirm("Mentor is required!");
		} else {
			var eventIndex = $("#event_keyword").val().indexOf(":");
			var event_id = $("#event_keyword").val().substring(0, eventIndex);
			
			var attendee_type = 0;
			var mentorIndex = $("#mentor").val().indexOf(":");
			var mentor_id = $("#mentor").val().substring(0, mentorIndex);	


			$.post("php/event_mentor_attendence_add.php",
			{				
				event_id: event_id,
				attendee_type: attendee_type,
				mentor_id: mentor_id,
			},
			function(data, status) {
				alert(data);
				if ("Information inserted successfully!" === data) {
					$("input#event_keyword").val('');
					$("input#mentor").val('');
				}
			});
		}
	});
});