$(document).ready(function(){
//search field UI reaction----------------------------------------------
	$("#service-filter").hide();
	$(".result-section").hide();
	$("#basic-search .basic-search-input").hide();
	$("#basic-search .basic-key-word").show();

	$("#basic-search .basic-info-type").change(function(){

		$("#menu1 input[type='text']").val('');
		$("#menu1 input[type='radio']").prop('checked', false);
		$(".basic-search-input select").val("default");
		$("#service-filter select").val("default");
		$("#advanced-search select").val("default");

		$("#service-filter").hide();
		$("#basic-search .basic-search-input").hide();
		$("#advanced-search .advanced-search-box").hide();

		var option = $(this).children(":selected").html();
		if (option === "Concentration" || option === "School") {
			$("#basic-search .basic-key-word").show();
			$("#service-filter").show();
		}else if (option === "Payment Date") {
			$("#basic-search .basic-date-from").show();
			$("#basic-search .basic-date-to").show();
			$("#service-filter").show();
		}else if (option === "Service") {
			$("#basic-search .basic-service").show();
		}else{
			$("#basic-search .basic-key-word").show();
		}
	});

	$("#advanced-search .advanced-search-box").hide();

	$(".service-select").change(function(){

		$("#advanced-search .advanced-search-box").hide();
		$("#advanced-search input[type='text']").val('');
		$("#advanced-search input[type='radio']").prop('checked', false);
		$("#advanced-search select").val("default");

		var option = $(this).children(":selected").html();
		if (option === "Profile Builder") {
			$("#search-profile-builder").show();
		}else if (option === "Mock Interview") {
			$("#search-mock-interview").show();
		}else if (option === "VIP Service") {
			$("#search-vip-service").show();
		}else if (option === "Refer Me") {
			$("#search-refer-me").show();
		}else if (option === "Event") {
			$("#search-event").show();
		}else if (option === "Pre-Talk") {
			$("#search-pre-talk").show();
		}else if (option === "Offer Tracking") {
			$("#search-offer-tracking").show();
			$("#advanced-search input[name='search-offer-tracking-source']").prop('checked', true);
		}
	});

//Search Button Tapped---------------------------------------------------
	$("#search-button").click(function(){
		var basicInfoType = $("#basic-search .basic-info-type").children(":selected").html();
		var dataPost = { basicInfoType:basicInfoType };

		if (basicInfoType === "School" || basicInfoType === "Concentration") {
			var keyWord = $("#key-word").val();
			var serviceFilter = $("#service-filter .service-select").children(":selected").html();

			dataPost.keyWord = keyWord;
			dataPost.serviceFilter = serviceFilter;
			
		}else if (basicInfoType === "Payment Date") {
			var basicDateFrom = $(".basic-date-from>input").val();
			var basicDateTo = $(".basic-date-to>input").val();
			var serviceFilter = $("#service-filter .service-select").children(":selected").html();

			dataPost.basicDateFrom = basicDateFrom;
			dataPost.basicDateTo = basicDateTo;
			dataPost.serviceFilter = serviceFilter;

			
		}else if (basicInfoType === "Service") {
			var serviceSelect = $("#basic-search .service-select").children(":selected").html();

			dataPost.serviceSelect = serviceSelect;
			
		}else {
			var keyWord = $("#key-word").val();

			dataPost.keyWord = keyWord;
			
		}

		if (basicInfoType === "School" || basicInfoType === "Concentration" || basicInfoType === "Payment Date" || basicInfoType === "Service") {
			//var serviceType = $(".service-select:visible").children(":selected").html();
			if (dataPost.serviceFilter === "Profile Builder" || dataPost.serviceSelect === "Profile Builder") {

				idIndex = $("#search-profile-builder input").val().indexOf(":");
				dataPost.profileBuilderMentorId = $("#search-profile-builder input").val().substring(0, idIndex);

			}else if (dataPost.serviceFilter === "Mock Interview" || dataPost.serviceSelect === "Mock Interview") {

				idIndex = $("#search-mock-interview input").val().indexOf(":");
				dataPost.mockInterviewMentorId = $("#search-mock-interview input").val().substring(0, idIndex);

			}else if (dataPost.serviceFilter === "VIP Service" || dataPost.serviceSelect === "VIP Service") {

				idIndex = $("#search-vip-mentor").val().indexOf(":");
				dataPost.vipServiceMentorId = $("#search-vip-mentor").val().substring(0, idIndex);
				dataPost.vipServiceJobLocation = $("#search-vip-location").val();
				dataPost.vipServiceMpfTrack = $("#search-vip-mpf-track").children(":selected").html();

			}else if (dataPost.serviceFilter === "Refer Me" || dataPost.serviceSelect === "Refer Me") {

				dataPost.referMeJobType = $("input[name='search-refer-job-type']:checked").val();
				dataPost.referMeField = $("#search-refer-field").children(":selected").html();
				leadMentorIdIndex = $("#search-refer-lead-mentor").val().indexOf(":");
				dataPost.referMeLeadMentorId = $("#search-refer-lead-mentor").val().substring(0, leadMentorIdIndex);
				mockMentorIdIndex = $("#search-refer-mock-mentor").val().indexOf(":");
				dataPost.referMeMockMentorId = $("#search-refer-mock-mentor").val().substring(0, mockMentorIdIndex);

			}else if (dataPost.serviceFilter === "Event" || dataPost.serviceSelect === "Event") {

				idIndex = $("#search-event").val().indexOf(":");
				dataPost.eventId = $("#search-event").val().substring(0, idIndex);

			}else if (dataPost.serviceFilter === "Pre-Talk" || dataPost.serviceSelect === "Pre-Talk") {

				dataPost.preTalkSource = $("#search-pre-talk-source").val();
				dataPost.preTalkDate = $("#search-pre-talk-date").val();
				idIndex = $("#search-pre-talk-mentor").val().indexOf(":");
				dataPost.preTalkMentorId = $("#search-pre-talk-mentor").val().substring(0, idIndex);
				dataPost.preTalkcloseStatus = $("input[name='search-pre-talk-close-status']:checked").val();

			}else if (dataPost.serviceFilter === "Offer Tracking" || dataPost.serviceSelect === "Offer Tracking") {
				dataPost.offerTrackingSource = $("input[name='search-offer-tracking-source']:checked").val();
				dataPost.offerTrackingJobType = $("input[name='search-offer-tracking-type']:checked").val();
				dataPost.offerTrackingPosition = $("#search-offer-tracking-position").val();
				dataPost.offerTrackingCompany = $("#search-offer-tracking-company").val();
				dataPost.offerTrackingStatus = $("input[name='search-offer-tracking-status']:checked").val();
			}
		}

		$.post("php/mentee_basic_info_search.php", dataPost, function(data, status){
				console.log(data);
				/*
				data = JSON && JSON.parse(data) || $.parseJSON(data);
				$(".result-table").empty();
				var header = "<tr><th>Mentee ID</th><th>First Name</th><th>Last Name</th><th>School</th><th colspan='2 '>Concentration</th><th>Detail</th></tr>";
				$(".result-table").append(header);

				for (var i =0; i < data.length; i++) {
					var menteeId 			= "<td>" + data[i].mentee_id + "</td>";
					var firstName 			= "<td id='info-firstname-"+ data[i].mentee_id +"'>" + data[i].firstname + "</td>";
					var lastName 			= "<td id='info-lastname-"+ data[i].mentee_id +"'>" + data[i].lastname + "</td>";
					var firstConcentration 	= "<td id='info-first-concentration-"+ data[i].mentee_id +"'>" + data[i].first_concentration + "</td>";
					var secondConcentration = "<td id='info-second-concentration-"+ data[i].mentee_id +"'>" + data[i].second_concentration + "</td>";
					var school  			= "<td id='info-school-"+ data[i].mentee_id +"'>" + data[i].school + "</td>";

					var moreButton = "<td><button class='more-button btn btn-primary' id='info-detail-"+ data[i].mentee_id +"'>More</button></td>";

					$(".result-table").append("<tr>"+menteeId+firstName+lastName+school+firstConcentration+secondConcentration+moreButton+"</tr>");
					$(".result-section").show();
				}
				*/
		});
	});

//more button Tapped-----------------------------------------------------
	$(".result-table").on("click", ".more-button", function(){
		var menteeId = $(this).attr('id').substring(12);
		window.open("mentee-detail.php?mentee_id=" + menteeId);
	});

});