$(document).ready(function(){

	$(".search-section .search-key-word").show();
	$(".search-section .date-from").hide();
	$(".search-section .date-to").hide();
	$(".search-section .filterDate").hide();
	$(".search-section #classification").change(function(){

		$("#menu1 input[type='text']").val('');

		var option = $(this).children(":selected").val();
		if (option === "Submission Date") {
			$(".search-section .date-from").show();
			$(".search-section .date-to").show();
			$(".search-section .search-key-word").hide();
			$(".search-section .filterDate").hide();
		} else if (option === "Expire After"){
			$(".search-section .search-key-word").hide();
			$(".search-section .date-from").hide();
			$(".search-section .date-to").hide();
			$(".search-section .filterDate").show();
		} else {
			$(".search-section .date-from").hide();
			$(".search-section .date-to").hide();
			$(".search-section .search-key-word").show();
			$(".search-section .filterDate").hide();
		}
	});


});