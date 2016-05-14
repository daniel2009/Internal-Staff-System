$(document).ready(function(){
		$(".result-table").on("click", ".info-delete", function(){
			var internalReferralId = $(this).attr("id").substring(7);
			//console.log(mentorId+"delete");
			var confirmDelete = confirm("Are you sure to delete this record?");
			if (confirmDelete == true) {
				$.post("php/referral_info_delete.php",
		        {
		          	internal_referral_id: internalReferralId
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