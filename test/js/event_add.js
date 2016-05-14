$(document).ready(function() {
	$("#event-info-submit").click(function(){
		if ($("#location").val() == "") {
			confirm("Location is required!");
		} else if ($("#date").val() == "") {
			confirm("Date is required!");
		} else if ($("#date").val() <= "2013-12-31") {
			confirm("Date is invalid! Date should be greated than 2014-01-01");
		} else if ($("#topic").val() == "") {
			confirm("Topic is required!");
		} else {
			var type = $("#type").val();
			var location = $("#location").val();
			var date = $("#date").val();
			var time = $("#time").val();
			var topic = $("#topic").val();
			var ticket_price = $("#ticket_price").val();
			var number_of_mentors = $("#number_of_mentors").val();
			var number_of_attendees = $("#number_of_attendees").val();
			var employee_leader = $("#employee_leader").val();
			var notes = $("#notes").val();			

			$.post("php/event_info_add.php",
			{				
				type: type,
				location: location,
				date: date,
				time: time,
				topic: topic,
				ticket_price: ticket_price,
				number_of_mentors: number_of_mentors,
				number_of_attendees: number_of_attendees,
				employee_leader: employee_leader,
				notes: notes

			},
			function(data, status) {
				alert(data);
				if ("Information inserted successfully!" === data) {
					$("input#type").val('');
					$("input#location").val('');
					$("input#date").val('');
					$("input#time").val('');
					$("input#topic").val('');
					$("input#ticket_price").val('');
					$("input#number_of_attendees").val('');
					$("input#number_of_mentors").val('');
					$("input#employee_leader").val('');
					$("input#notes").val('');
				}
			});
		}
	});
});