


$(document).ready(function(){
		$("#add-button").click(function(){
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

			$.post("php/add_event_info.php",
			{
				type: type,
				location: location,
				date: date,
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
		});
	});