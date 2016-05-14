
$(document).ready(function(){

//Basic Info add------------------------------------------------
	$("#basic-info-submit").click(function(){

		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var othername = $("#othername").val();
		var location = $("#location").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var wechat = $("#wechat").val();
		var school = $("#school").val();
		var degree = $("#degree").children(":selected").html();
		var graduationDate = $("#graduation-date").val();
		var firstConcentration = $("#first-concentration").val();
		var secondConcentration = $("#second-concentration").val();
		var isUnimember = $("input[name='is-unimember']:checked").val();

		$.post("php/mentee_basic_info_add.php", {

			firstname: firstname,
			lastname: lastname,
			othername: othername,
			location: location,
			email: email,
			phone: phone,
			wechat: wechat,
			school: school,
			degree: degree,
			graduationDate: graduationDate,
			firstConcentration: firstConcentration,
			secondConcentration: secondConcentration,
			isUnimember: isUnimember

		}, function(data, status){

			alert(data);
			if (data === "Information inserted successfully!") {
				$("#basic-info input[type='text']").val('');
				$("#basic-info input[type='radio']").prop('checked', false);
				$("#basic-info select").val("default");
			}

		});

	});

//Pre-talk Info add----------------------------------------------
	$("#pre-talk-submit").click(function(){
		var menteeIndex = $("#pre-talk-mentee").val().indexOf(":");
		var preTalkMenteeId = $("#pre-talk-mentee").val().substring(0, menteeIndex);

		var preTalkSource = $("#pre-talk-source").val();
		var preTalkDate = $("#pre-talk-date").val();
		var preTalkTime = $("#pre-talk-time").val();

		var mentorIndex = $("#pre-talk-mentor").val().indexOf(":");
		var preTalkMentorId = $("#pre-talk-mentor").val().substring(0, mentorIndex);
		
		var preTalkCloseStatus = $("input[name='pre-talk-close-status']:checked").val();
		var preTalkCloseNotes = $("#pre-talk-close-notes").val();
		
		var preTalkRecommendService = $("#pre-talk-recommend-service").children(":selected").html();
		var preTalk3DaysFollow = $("#pre-talk-3-days-follow").val();
		var preTalkFinalCloseStatus = $("input[name='pre-talk-final-close-status']:checked").val();

		$.post("php/mentee_pre_talk_info_add.php", {
			preTalkMenteeId: preTalkMenteeId,
			preTalkSource: preTalkSource,
			preTalkDate: preTalkDate,
			preTalkTime: preTalkTime,
			preTalkMentorId: preTalkMentorId,
			preTalkCloseStatus: preTalkCloseStatus,
			preTalkCloseNotes: preTalkCloseNotes,
			preTalkRecommendService: preTalkRecommendService,
			preTalk3DaysFollow: preTalk3DaysFollow,
			preTalkFinalCloseStatus: preTalkFinalCloseStatus
		}, function(data, status){
			alert(data);
			if (data === "Information inserted successfully!") {
				$("#pre-talk input[type='text']").val('');
				$("#pre-talk textarea").val('');
				$("#pre-talk select").val("default");
				$("#pre-talk input[type='radio']").prop('checked', false);
			}
		});

	});

//record information box show/hide/submit-----------------------------
	$(".record-box").hide();
	$("#purchased-service").change(function(){
		$("#purchase-record-detail>.record-box").hide();
	    var option = $(this).children(":selected").html();
	    if (option === "Profile Builder") {
			$(".profile-builder-record").show();
		}else if (option === "Mock Interview") {
			$(".mock-interview-record").show();
		}else if (option === "VIP Service") {
			$(".vip-service-record").show();
		}else if (option === "Refer Me") {
			$(".refer-me-record").show();
		}else if (option === "Event") {
			$(".event-record").show();
		}
	});

	$(".internal-referral-record").show();
	$("#other-record-type").change(function(){
		$("#other-record-detail>.record-box").hide();
	    var option = $(this).children(":selected").html();
		if (option === "Internal Referral Tracking") {
			$(".internal-referral-record").show();
		}else if (option === "UniCareer Credit") {
			$(".unicareer-credit-record").show();
		}else if (option === "Other Offer Tracking") {
			$(".offer-tracking-record").show();
		}else if (option === "Session Tracking") {
			$(".session-tracking-record").show();
		}
	});

//purchase record add-------------------------------------------------
	$("#add-purchase-record").click(function(){
		var menteeIndex = $("#purchase-records-mentee").val().indexOf(":");
		var menteeId = $("#purchase-records-mentee").val().substring(0, menteeIndex);
		var serviceType = $("#purchased-service").children(":selected").html();
		var paymentDate = $("#payment-date").val();
		var paymentAmount = $("#payment-amount").val();

		var dataPost = {
			menteeId:menteeId,
			serviceType:serviceType,
			paymentDate:paymentDate,
			paymentAmount:paymentAmount
		}

		if (serviceType === "Profile Builder") {
			var profileBuilderStartDate = $("#profile-builder-start-date").val();
			var profileBuilderFirstRevisionDate = $("#profile-builder-first-revision-date").val();
			var profileBuilderSecondRevisionDate = $("#profile-builder-Second-revision-date").val();
			var profileBuilderThirdRevisionDate = $("#profile-builder-Third-revision-date").val();
			var mentorIndex = $("#profile-builder-mentor").val().indexOf(":");
			var profileBuilderMentorId = $("#profile-builder-mentor").val().substring(0, mentorIndex);
			var profileBuilderOffer = $("input[name='profile-builder-offer']:checked").val();
			var profileBuilderNote = $("#profile-builder-note").val();

			dataPost.profileBuilderStartDate = profileBuilderStartDate;
			dataPost.profileBuilderFirstRevisionDate = profileBuilderFirstRevisionDate;
			dataPost.profileBuilderSecondRevisionDate = profileBuilderSecondRevisionDate;
			dataPost.profileBuilderThirdRevisionDate = profileBuilderThirdRevisionDate;
			dataPost.profileBuilderMentorId = profileBuilderMentorId;
			dataPost.profileBuilderOffer = profileBuilderOffer;
			dataPost.profileBuilderNote = profileBuilderNote;

		}else if (serviceType === "Mock Interview") {
			var interviewCompany = $("#interview-company").val();
			var interviewPosition = $("#interview-position").val();
			var interviewDate = $("#interview-date").val();
			var mentorIndex = $("#mock-mentor").val().indexOf(":");
			var mockMentorId = $("#mock-mentor").val().substring(0, mentorIndex);
			var mockDate = $("#mock-date").val();
			var mockResult = $("input[name='mock-result']:checked").val();

			dataPost.interviewCompany = interviewCompany;
			dataPost.interviewPosition = interviewPosition;
			dataPost.interviewDate = interviewDate;
			dataPost.mockMentorId = mockMentorId;
			dataPost.mockDate = mockDate;
			dataPost.mockResult = mockResult;

		}else if (serviceType === "VIP Service") {
			var sessionQuantity = $("#session-quantity").val();
			var firstJobLocation = $("#vip-job-location-1").val();
			var secondJobLocation = $("#vip-job-location-2").val();
			var mpfTrack1 = $("#vip-mpf-track-1").children(":selected").html();
			var mpfTrack2 = $("#vip-mpf-track-2").children(":selected").html();
			var mpfBuiltDate = $("#vip-mpf-built-date").val();
			var vipFirstMentorIndex = $("#vip-first-mentor").val().indexOf(":");
			var vipFirstMentorId = $("#vip-first-mentor").val().substring(0, vipFirstMentorIndex);
			var vipSecondMentorIndex = $("#vip-first-mentor").val().indexOf(":");
			var vipSecondMentorId = $("#vip-second-mentor").val().substring(0, vipSecondMentorIndex);
			var vipThirdMentorIndex = $("#vip-first-mentor").val().indexOf(":");
			var vipThirdMentorId = $("#vip-third-mentor").val().substring(0, vipThirdMentorIndex);
			var vipMentorListSentDate = $("#vip-mentor-list-sent-date").val();
			var vipLeadMentorPickDate = $("#vip-lead-mentor-picked-date").val();
			var vipLeadMentorIndex = $("#vip-lead-mentor").val().indexOf(":");
			var vipLeadMentorId = $("#vip-lead-mentor").val().substring(0, vipLeadMentorIndex);
			var vipMentorChangedDate = $("#vip-mentor-changed-date").val();
			var vipMentorChangedToIndex = $("#vip-mentor-changed-to").val().indexOf(":");
			var vipMentorChangedToId = $("#vip-mentor-changed-to").val().substring(0, vipMentorChangedToIndex);
			var vipAssistMentor1Index = $("#vip-assist-mentor-1").val().indexOf(":");
			var vipAssistMentor1Id = $("#vip-assist-mentor-1").val().substring(0, vipAssistMentor1Index);
			var vipAssistMentor2Index = $("#vip-assist-mentor-2").val().indexOf(":");
			var vipAssistMentor2Id = $("#vip-assist-mentor-2").val().substring(0, vipAssistMentor2Index);
			var vipAssistMentor3Index = $("#vip-assist-mentor-3").val().indexOf(":");
			var vipAssistMentor3Id = $("#vip-assist-mentor-3").val().substring(0, vipAssistMentor3Index);
			var vipFreeBootCampIndex = $("#vip-free-boot-camp").val().indexOf(":");
			var vipFreeBootCampId = $("#vip-free-boot-camp").val().substring(0, vipFreeBootCampIndex);
			var vipComplete = $("input[name='vip-complete']:checked").val();

			dataPost.sessionQuantity = sessionQuantity;
			dataPost.firstJobLocation = firstJobLocation;
			dataPost.secondJobLocation = secondJobLocation;
			dataPost.mpfTrack1 = mpfTrack1;
			dataPost.mpfTrack2 = mpfTrack2;
			dataPost.mpfBuiltDate = mpfBuiltDate;
			dataPost.vipFirstMentorId = vipFirstMentorId;
			dataPost.vipSecondMentorId = vipSecondMentorId;
			dataPost.vipThirdMentorId = vipThirdMentorId;
			dataPost.vipMentorListSentDate = vipMentorListSentDate;
			dataPost.vipLeadMentorPickDate = vipLeadMentorPickDate;
			dataPost.vipLeadMentorId = vipLeadMentorId;
			dataPost.vipMentorChangedDate = vipMentorChangedDate;
			dataPost.vipMentorChangedToId = vipMentorChangedToId;
			dataPost.vipAssistMentor1Id = vipAssistMentor1Id;
			dataPost.vipAssistMentor2Id = vipAssistMentor2Id;
			dataPost.vipAssistMentor3Id = vipAssistMentor3Id;
			dataPost.vipFreeBootCampId = vipFreeBootCampId;
			dataPost.vipComplete = vipComplete;

		}else if (serviceType === "Refer Me") {
			var referJobType = $("input[name='refer-job-type']:checked").val();
			var referField = $("#refer-field").children(":selected").html();
			var referPosition = $("#refer-position").val();
			var referLeadMentor = $("#refer-lead-mentor").val();
			var referMockMentor = $("#refer-mock-mentor").val();
			var referFirstInterviewDate = $("#refer-first-interview-date").val();
			var referFirstInterviewCompany = $("#refer-first-interview-company").val();
			var referFirstInterviewPosition = $("#refer-first-interview-position").val();
			var referFirstInterviewResult = $("input[name='refer-first-result']:checked").val();
			var referFirstInterviewNote = $("#refer-first-notes").val();
			var referSecondInterviewDate = $("#refer-second-interview-date").val();
			var referSecondInterviewCompany = $("#refer-second-interview-company").val();
			var referSecondInterviewPosition = $("#refer-second-interview-position").val();
			var referSecondInterviewResult = $("input[name='refer-second-result']:checked").val();
			var referSecondInterviewNote = $("#refer-second-notes").val();

			dataPost.referJobType = referJobType;
			dataPost.referField = referField;
			dataPost.referPosition = referPosition;
			dataPost.referLeadMentor = referLeadMentor;
			dataPost.referMockMentor = referMockMentor;
			dataPost.referFirstInterviewDate = referFirstInterviewDate;
			dataPost.referFirstInterviewCompany = referFirstInterviewCompany;
			dataPost.referFirstInterviewPosition = referFirstInterviewPosition;
			dataPost.referFirstInterviewResult = referFirstInterviewResult;
			dataPost.referFirstInterviewNote = referFirstInterviewNote;
			dataPost.referSecondInterviewDate = referSecondInterviewDate;
			dataPost.referSecondInterviewCompany = referSecondInterviewCompany;
			dataPost.referSecondInterviewPosition = referSecondInterviewPosition;
			dataPost.referSecondInterviewResult = referSecondInterviewResult;
			dataPost.referSecondInterviewNote = referSecondInterviewNote;

		}else if (serviceType === "Event")	{
			var eventEntryIndex = $("#event-entry").val().indexOf(":");
			var eventEntryId = $("#event-entry").val().substring(0, eventEntryIndex);

			dataPost.eventEntryId = eventEntryId;
			
		}

		$.post("php/mentee_purchase_records_add.php", dataPost, function(data, status){
			alert(data);
			if (data === "Information inserted successfully!") {
				$("#purchase-records input[type='date']").val('');
				$("#purchase-records input[type='text']").val('');
				$("#purchase-record-detail .record-box select").val("default");
				$("#purchase-record-detail .record-box textarea").val('');
				$("#purchase-record-detail .record-box input[type='radio']").prop('checked', false);
			}
		});

	});


//Other record add----------------------------------------------------
	$("#add-other-record").click(function(){
		var menteeIndex = $("#other-records-mentee").val().indexOf(":");
		var menteeId = $("#other-records-mentee").val().substring(0, menteeIndex);
		var recordType = $("#other-record-type").children(":selected").html();

		var dataPost = {
			menteeId:menteeId,
			recordType:recordType
		};

		if (recordType === "Internal Referral Tracking") {
			var internalReferralIndex = $("#internal-referral").val().indexOf(":");
			var internalReferralId = $("#internal-referral").val().substring(0, internalReferralIndex);
			var internalReferralReferDate = $("#internal-referral-refer-date").val();
			var internalReferralInterviewDate = $("#internal-referral-refer-date").val();
			var internalReferralHiredDate = $("#internal-referral-hired-date").val();
			var internalReferralResult = $("input[name='internal-referral-result']:checked").val();

			dataPost.internalReferralId = internalReferralId;
			dataPost.internalReferralReferDate = internalReferralReferDate;
			dataPost.internalReferralInterviewDate = internalReferralInterviewDate;
			dataPost.internalReferralHiredDate = internalReferralHiredDate;
			dataPost.internalReferralResult = internalReferralResult;

		}else if (recordType === "UniCareer Credit") {
			var creditIssueDate = $("#unicareer-credit-issue-date").val();
			var creditReason = $("#unicareer-credit-reason").val();
			var creditAmount = $("#unicareer-credit-amount").val();
			var creditUseDate = $("#unicareer-credit-use-date").val();
			var creditNote = $("#unicareer-credit-note").val();

			dataPost.creditIssueDate = creditIssueDate;
			dataPost.creditReason = creditReason;
			dataPost.creditAmount = creditAmount;
			dataPost.creditUseDate = creditUseDate;
			dataPost.creditNote = creditNote;

		}else if (recordType === "Other Offer Tracking") {
			var offerTrackingType = $("input[name='offer-tracking-type']:checked").val();
			var offerTrackingDate = $("#offer-tracking-date").val();
			var offerTrackingCompany = $("#offer-tracking-company").val();
			var offerTrackingPosition = $("#offer-tracking-position").val();
			var offerTrackingLocation = $("#offer-tracking-location").val();

			dataPost.offerTrackingType = offerTrackingType;
			dataPost.offerTrackingDate = offerTrackingDate;
			dataPost.offerTrackingCompany = offerTrackingCompany;
			dataPost.offerTrackingPosition = offerTrackingPosition;
			dataPost.offerTrackingLocation = offerTrackingLocation;

		}else if (recordType === "Session Tracking") {
			var sessionMentorIndex = $("#session-mentor").val().indexOf(":");
			var sessionMentorId = $("#session-mentor").val().substring(0, sessionMentorIndex);
			var sessionNumber = $("#session-number").val();
			var sessionDate = $("#session-date").val();
			var sessionTopic = $("#session-topic").val();
			var sessionAssignment = $("#session-note").val();

			dataPost.sessionMentorId = sessionMentorId;
			dataPost.sessionNumber = sessionNumber;
			dataPost.sessionDate = sessionDate;
			dataPost.sessionTopic = sessionTopic;
			dataPost.sessionAssignment = sessionAssignment;

		}

		$.post("php/mentee_other_records_add.php", dataPost, function(data, status){
			alert(data);
			if (data === "Information inserted successfully!") {
				$("#other-records input[type='date']").val('');
				$("#other-records input[type='text']").val('');
				$("#other-record-detail .record-box select").val("default");
				$("#other-record-detail .record-box textarea").val('');
				$("#other-record-detail .record-box input[type='radio']").prop('checked', false);
			}
		});
	});
});