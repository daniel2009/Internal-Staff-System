$(document).ready(function(){

	$(".mentor-autocomplete").autocomplete({
		source: "php/mentor_autocomplete.php",
		//search after two characters
		minLength: 2
	});

	$(".mentee-autocomplete").autocomplete({
		source: "php/mentee_autocomplete.php",
		//search after two characters
		minLength: 2
	});

	$(".event-autocomplete").autocomplete({
		source: "php/event_autocomplete.php",
		//search after two characters
		minLength: 2
	});

	$(".internal-referral-autocomplete").autocomplete({
		source: "php/internal_referral_autocomplete.php",
		//search after two characters
		minLength: 2
	});
});