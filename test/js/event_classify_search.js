$(document).ready(function(){
	    $("#search-button").click(function(){

	    	$(".result-table").empty();
	    	$("#result-text").empty();
	    	$("#result-count").empty();
	    	var option = $("#classification option:selected").text();
	    	//console.log(option);
	    	var key_word = $("#key-word").val();
	    	//console.log(key_word);




	        $.post("php/event_classify_search.php", 
	        {
	          classification: option,
	          key_word: key_word
	        },
	        function(data,status){
	        	var header = "<tr><th>Event ID</th><th>Type</th><th>Location</th><th>Date</th><th>Time</th><th>Topic</th><th>Detail</th><th>Operation</th></tr>";
	        	$(".result-table").append(header);
	        	//console.log(data);

	        	data = JSON && JSON.parse(data) || $.parseJSON(data);
	        	for (var i = 0; i < data.length; i++) {
	        		var event_id = "<td>" + data[i][0].event_id + "</td>";
	        		var type = "<td id='info-type-" + data[i][0].event_id + "'>" + data[i][0].type + "</td>";
	        		var location = "<td id='info-location-" + data[i][0].event_id + "'>" + data[i][0].location + "</td>";
	        		var date = "<td id='info-date-" + data[i][0].event_id + "'>" + data[i][0].date + "</td>";
	        		var time = "<td id='info-time-" + data[i][0].event_id + "'>" + data[i][0].time + "</td>";
	        		var topic = "<td id='info-topic-" + data[i][0].event_id + "'>" + data[i][0].topic + "</td>";
	        		var ticket_price = "<td id='info-ticket_price-" + data[i][0].event_id + "'>" + data[i][0].ticket_price + "</td>";
	        		var number_of_mentors = "<td id='info-number_of_mentors-" + data[i][0].event_id + "'>" + data[i][0].number_of_mentors + "</td>";
	        		var number_of_attendees = "<td id='info-number_of_attendees-" + data[i][0].event_id + "'>" + data[i][0].number_of_attendees + "</td>";
	        		var employee_leader = "<td id='info-employee_leader-"+data[i][0].event_id + "'>" + data[i][0].employee_leader + "</td>";
	        		var notes = "<td class='bio' colspan = '4' id='info-notes-" + data[i][0].event_id + "'>" + data[i][0].notes + "</td>";
	        		//console.log(specialties);
	        		var moreButton = "<td><button class='more-button btn btn-success' data-toggle='collapse' data-target='#detail-"+data[i][0].event_id+"'>More</button></td>";
	        		var editButton = "<td><div id='edit-button-" + data[i][0].event_id + "' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-" + data[i][0].event_id + "' href='#'>Edit</a></li><li><a class='info-delete' id='delete-" + data[i][0].event_id + "' href='#'>Delete</a></li></ul></div></td>";
	        		var detail = "<tr><td colspan='8' id='detail-" + data[i][0].event_id + "' class='collapse'><table id='embed-" + data[i][0].event_id + "' class='embed'><tr><th>Ticket Price</th><th>Number of mentors</th><th>Number of Attendees</th><th>Employee Leader</th></tr><tr>" + ticket_price + number_of_mentors + number_of_attendees + employee_leader + "</tr><tr><th colspan = '4'>Notes</th></tr><tr>" + notes + "</tr></table></td></tr>";

	        		$(".result-table").append("<tr>" + event_id + type + location + date + time + topic + moreButton + editButton + "</tr>" + detail);
	        	}

	        	var lastRow = "<tr><td colspan='8'><h4>This is the last row!</h4></td></tr>"
	        	$(".result-table").append(lastRow);
	        	$("#result-count").append(data.length);
	        	if (data.length > 1) {
	        		var text = " search results";
	        		$("#result-text").append(text);
	        	} else {
	        		var text = " search result";
	        		$("#result-text").append(text);
	        	}
	        });
	    });
	});