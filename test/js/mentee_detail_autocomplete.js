
$(document).ready(function(){
	$(".result-section").on("focus", ".mentor-autocomplete", function(){
		if (!$(this).data("autocomplete")) {
			$(this).autocomplete({
				source: "php/mentor_autocomplete.php",
				//search after two characters
				minLength: 2
			})
		}
	});

	$(".result-section").on("focus", ".event-autocomplete", function(){
		if (!$(this).data("autocomplete")) {
			$(this).autocomplete({
				source: "php/event_autocomplete.php",
				//search after two characters
				minLength: 2
			})
		}
	});

	$(".result-section").on("focus", ".internal-referral-autocomplete", function(){
		if (!$(this).data("autocomplete")) {
			$(this).autocomplete({
				source: "php/internal_referral_autocomplete.php",
				//search after two characters
				minLength: 2
			})
		}
	});
});