$(document).ready(function(){
	$("#result-table").on("click", ".info-edit", function(){
		var index = $(".info-edit").index(this);
		if (!$("#result-table .collapse").eq(index).hasClass("in")) {
			$(".more-button").eq(index).trigger("click");
		}
	});
});