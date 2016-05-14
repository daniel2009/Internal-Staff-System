$(document).ready(function(){
		$(".result-table").on("click", ".info-delete", function(){
			var eventId = $(this).attr("id").substring(7);
			//console.log(mentorId+"delete");
			var confirmDelete = confirm("Are you sure to delete this record?");
			if (confirmDelete == true) {
				$.post("php/event_info_delete.php",
		        {
		          	event_id: eventId
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