
$(document).ready(function(){
	$(".result-section").on("click", ".delete-button", function(){
		var contentType = $(this).attr('id').substring(0,2);
		var menteeId 	= $(".mentee-id").html();
		var dataPost 	= {
			menteeId:menteeId,
			contentType:contentType,
			confirm:null
		};

		if (contentType === "bi"){
			var biConfirm = confirm("All records of this mentee will be deleted! Are you sure?");
			if (biConfirm == true) {
				var biConfirmCode = prompt("Please Enter the Administrator Password!");
				if(biConfirmCode != null && biConfirmCode != "") {
					dataPost.confirm = biConfirmCode;
				}
			}
		}else{
			if (contentType !== "pt") {
				var serviceRecordId = $(this).attr('id').substring(10);
			}
			var Confirm = confirm("This record will be deleted, are you sure?");
			if(Confirm == true) {
				dataPost.confirm = serviceRecordId;
			}
		}

		console.log(dataPost);
		if (dataPost.confirm !== "" && dataPost.confirm !== null){
			$.post('php/mentee_info_delete.php', dataPost, function(data, status) {
				alert(data);
				if (data === "Delete Successfully!") {
					if (contentType === "bi") {
						window.close();
					}else if(contentType === "pt"){
						$("#pre-talk").hide();
					}else{
						$("#"+contentType+"-section-"+serviceRecordId).hide();
						$("#"+contentType+"-title-"+serviceRecordId).hide();
					}
				}
			});
		}
	});
});