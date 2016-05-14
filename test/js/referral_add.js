$(document).ready(function() {
	$("#referral-info-submit").click(function(){
		if ($("#company").val() == "") {
			confirm("Company is required!");
		} else if ($("#position").val() == "") {
			confirm("Position is required!");
		} else {
			var company = $("#company").val();
			var position = $("#position").val();
			var location = $("#location").val();
			var create_date = $("#create_time").val();
			var expire_date = $("#expire_date").val();
			var submission_date = $("#submission_date").val();
			var type = $("#type").val();
			var link = $("#link").val();
			var requirement = $("#requirement").val();
			var job_description = $("#job_description").val();			

			$.post("php/referral_info_add.php",
			{				
				company: company,
				position: position,
				location: location,
				create_date: create_date,
				expire_date: expire_date,
				submission_date: submission_date,
				type: type,
				link: link,
				requirement: requirement,
				job_description: job_description
			},
			function(data, status) {
				alert(data);
				if ("Information inserted successfully!" === data) {
					$("input#company").val('');
					$("input#position").val('');
					$("input#location").val('');
					$("input#create_date").val('');
					$("input#expire_date").val('');
					$("input#submission_date").val('');
					$("input#type").val('');
					$("input#link").val('');
					$("input#requirement").val('');
					$("input#job_description").val('');
				}
			});
		}
	});
});