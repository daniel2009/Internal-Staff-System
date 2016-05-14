$(document).ready(function() {

	$(".mentor-autocomplete").autocomplete({
		source: "php/mentor_autocomplete.php", 
		minLength: 2
	});

	$(".event-autocomplete").autocomplete({
		source: "php/event_autocomplete.php", 
		minLength: 2
	});

});