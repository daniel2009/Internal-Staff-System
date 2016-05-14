$(document).ready(function(){
		$(".result-table").on("click", ".info-edit", function(){
			var eventId = $(this).attr('id').substring(5);
			var embedId = "embed-" + eventId;

			

			//****************************change to the edit mode**************************
			$("#edit-button-" + eventId).replaceWith(function(){
				return "<button id='edit-button-" + eventId + "' class='edit-button btn btn-success'>Done</button>";
			});
			$("#info-type-" + eventId).replaceWith(function(){
				return "<td id='info-type-" + eventId+"'><select value='"+$(this).html()+"'><option>Campus Talk</option><option>Boot Camp</option><option>Dine With Me</option><option>Workshop</option><option>Other</option></select></td>";
			});
			$("#info-location-" + eventId).replaceWith(function(){
				return "<td id='info-location-" + eventId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-date-" + eventId).replaceWith(function(){
				return "<td id='info-date-"+eventId+"'><input value='"+$(this).html()+"' type='date'></input></td>";
			});
			$("#info-time-" + eventId).replaceWith(function(){
				return "<td id='info-time-" + eventId+"'><input value='"+$(this).html()+"' type='time'></input></td>";
			});
			$("#info-topic-" + eventId).replaceWith(function(){
				return "<td id='info-topic-" + eventId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-ticket_price-" + eventId).replaceWith(function(){
				return "<td id='info-ticket_price-" + eventId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-number_of_mentors-" + eventId).replaceWith(function(){
				return "<td id='info-number_of_mentors-" + eventId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-number_of_attendees-" + eventId).replaceWith(function(){
				return "<td id='info-number_of_attendees-" + eventId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-employee_leader-" + eventId).replaceWith(function(){
				return "<td id='info-employee_leader-"+eventId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			
			$("#info-notes-" + eventId).replaceWith(function(){
				return "<td class='bio' colspan='4' id='info-notes-"+eventId+"'><textarea value='"+$(this).html()+"'></textarea></td>";
			});
			
			//**********Done button tapped*******************************
			$("button#edit-button-" + eventId).on("click", function(){
				var type = $("td#info-type-"+eventId+">select").val();
				var location = $("td#info-location-"+eventId+">input").val();
				var date = $("td#info-date-"+eventId+">input").val();
				var time = $("td#info-time-"+eventId+">input").val();
				var topic = $("td#info-topic-"+eventId+">input").val();
				var ticket_price = $("td#info-ticket_price-"+eventId+">input").val();
				var number_of_mentors = $("td#info-number_of_mentors-"+eventId+">input").val();
				var number_of_attendees = $("td#info-number_of_attendees-"+eventId+">input").val();
				var employee_leader = $("td#info-employee_leader-"+eventId+">input").val();
				var notes = $("td#info-notes-"+eventId+">textarea").val();
				

				$.post("php/event_info_update.php",
				{
					event_id: eventId,
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
				function(data, status){
					alert(data);
				});

				$("#edit-button-"+eventId).replaceWith(function(){
					return "<div id='edit-button-"+eventId+"' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-"+eventId+"' href='#'>Edit</a></li><li><a class='info-delete' id='delete-"+eventId+"' href='#'>Delete</a></li></ul></div>";
				});

				$("td#info-type-"+eventId+">select").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-location-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-date-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-time-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-topic-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-ticket_price-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-number_of_mentors-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-number_of_attendees-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-employee_leader-"+eventId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-notes-"+eventId+">textarea").replaceWith(function(){
					return $(this).val();
				});

			});

		});
	});