
$(document).ready(function(){
	$(".result-table").on("click", ".info-delete", function(){
		var mentorId = $(this).attr("id").substring(7);
		//console.log(mentorId+"delete");
		var confirmDelete = confirm("Are you sure to delete this record?");
		if (confirmDelete == true) {
			$.post("php/mentor_info_delete.php",
	        {
	          	mentor_id: mentorId
	        },
	        function(data, status){
	        	if (data == "Record deleted successfully!") {
	        		$("#search-button").trigger("click");
	        	}
	        	alert(data);
	        });
		}
	});
});