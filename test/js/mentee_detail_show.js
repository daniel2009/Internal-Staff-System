var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).ready(function(){

	var menteeId = getUrlParameter('mentee_id');
	$.post("php/mentee_info_detail.php",{
		menteeId: menteeId
	},function(data, status){
		//console.log(data);

//Parse Json----------------------------------------------------------------------------------------------------------------
		data = JSON && JSON.parse(data) || $.parseJSON(data);

//Basic Infomation----------------------------------------------------------------------------------------------------------
		var menteeId 			= data.basicInfo.mentee_id;
		var firstName 			= data.basicInfo.firstname;
		var lastName 			= data.basicInfo.lastname;
		var otherName 			= data.basicInfo.othername;
		var location 			= data.basicInfo.location;
		var email 				= data.basicInfo.email;
		var phone 				= data.basicInfo.phone;
		var wechat 				= data.basicInfo.wechat;
		var school 				= data.basicInfo.school;
		var degree 				= data.basicInfo.degree;
		var graduationDate 		= data.basicInfo.graduation_date;
		var firstConcentration 	= data.basicInfo.first_concentration;
		var secondConcentration = data.basicInfo.second_concentration;
		var isUnimember			= data.basicInfo.is_unimember;
		if (isUnimember === "1") {
			isUnimember = "<input type='radio' name='is-unimember' value='1' disabled checked> Yes</input>"+
			      			"<input type='radio' name='is-unimember' disabled value='0'> No</input>";
		}else{
			isUnimember = "<input type='radio' name='is-unimember' value='1' disabled> Yes</input>"+
			      			"<input type='radio' name='is-unimember' value='0' disabled checked> No</input>";
		}

		var menteeProfileName 	= firstName + " " + lastName;

		$(".mentee-profile-name").append(menteeProfileName);

		var basicInfoMenu = 
			"<div class = 'row service-title-wrapper' align='right'>"+
				"<label class='info-classification'>Basic Information</label>"+
				"<button type='button' class='btn btn-primary operation-button' id='bi-edit'>Edit Info</button>"+
			"</div>";

		var basicInfoSection = 
			"<div class = 'row basic-info-section'>"+
				"<table class='result-table'>"+
					"<tr><th>Mentee ID</th><th>First Name</th><th>Last Name</th><th>Other Name</th><th>Location</th></tr>"+
					"<tr><td class='mentee-id non-text-input'>"+menteeId+"</td><td class='bi-firstname'>"+firstName+"</td><td class='bi-lastname'>"+lastName+"</td><td class='bi-othername'>"+otherName+"</td><td class='bi-location'>"+location+"</td></tr>"+
					"<tr><th colspan='4'>Concentration</th><th>UniMember</th></tr>"+
					"<tr><td colspan='2' class='bi-first-concen'>"+firstConcentration+"</td><td colspan='2' class='bi-second-concen'>"+secondConcentration+"</td><td class='bi-is-unimember non-text-input'>"+isUnimember+"</td></tr>"+
					"<tr><th colspan='2'>School</th><th colspan='2'>Degree</th><th>Graduation Date</th></tr>"+
					"<tr><td colspan='2' class='bi-school'>"+school+"</td><td colspan='2' class='bi-degree non-text-input'>"+degree+"</td><td class='bi-graduation-date'>"+graduationDate+"</td></tr>"+
					"<tr><th>Phone Number</th><th>Wechat ID</th><th colspan='3'>Email</th></tr>"+
					"<tr><td class='bi-phone'>"+phone+"</td><td class='bi-wechat'>"+wechat+"</td><td colspan='3' class='bi-email'>"+email+"</td></tr>"+
				"</table>"+
			"</div>";

		$("#basic-info").append(basicInfoMenu + basicInfoSection);

//Pre-Talk Tracking---------------------------------------------------------------------------------------------------------
		if (data.preTalkInfo) {
			var preTalkSource		= data.preTalkInfo.source;
			var preTalkDate			= data.preTalkInfo.date;
			var preTalkTime			= data.preTalkInfo.time;
			var preTalkCloseStatus	= data.preTalkInfo.close_status;
			var preTalkCloseNote	= data.preTalkInfo.close_note;
			var recommendService	= data.preTalkInfo.recommend_service;
			var threeDaysFollow		= data.preTalkInfo.three_days_follow;
			var finalCloseStatus	= data.preTalkInfo.final_close_status;			
			if (data.preTalkInfo.mentor_id !== null && data.preTalkInfo.mentor_id !== "") {
				var preTalkMentor = data.preTalkInfo.mentor_id +": "+ data.preTalkInfo.mentor_firstname +" "+ data.preTalkInfo.mentor_lastname;
			}else{
				var preTalkMentor = "";
			}

			if (preTalkCloseStatus === "1") {
				preTalkCloseStatus = "<input type='radio' name='pt-close-status' value='1' disabled checked> Yes</input>"+
				      			"<input type='radio' name='pt-close-status' value='0' disabled> No</input>";
			}else{
				preTalkCloseStatus = "<input type='radio' name='pt-close-status' value='1' disabled> Yes</input>"+
				      			"<input type='radio' name='pt-close-status' value='0' disabled checked> No</input>";
			}

			if (finalCloseStatus === "1") {
				finalCloseStatus = "<input type='radio' name='pt-final-close' value='1' disabled checked> Yes</input>"+
				      			"<input type='radio' name='pt-final-close' value='0' disabled> No</input>";
			}else{
				finalCloseStatus = "<input type='radio' name='pt-final-close' value='1' disabled> Yes</input>"+
				      			"<input type='radio' name='pt-final-close' value='0' disabled checked> No</input>";
			}

			var preTalkMenu = 
				"<div class = 'row service-title-wrapper' align='right'>"+
					"<label class='info-classification'>Pre-Talk Tracking</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='pt-edit'>Edit Info</button>"+
				"</div>";

			var preTalkSection = 
				"<div class = 'row pre-talk-section'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Source</th><th>Date</th><th>Time</th><th>Mentor</th><th>Close Status</th></tr>"+
						"<tr><td class='pt-source'>"+preTalkSource+"</td><td class='pt-date'>"+preTalkDate+"</td><td class='pt-time'>"+preTalkTime+"</td><td class='pt-mentor ui-widget mentor'>"+preTalkMentor+"</td><td class='pt-close-status non-text-input'>"+preTalkCloseStatus+"</td></tr>"+
						"<tr><th colspan='5'>Close Notes</th></tr>"+
						"<tr><td colspan='5' class='pt-close-note non-text-input'>"+preTalkCloseNote+"</td></tr>"+
						"<tr><th colspan='5'>Three Days Follow</th></tr>"+
						"<tr><td colspan='5' class='pt-three-days non-text-input'>"+threeDaysFollow+"</td></tr>"+
						"<tr><th colspan='3'>Recommend Service</th><th colspan='2'>Final Close Status</th></tr>"+
						"<tr><td colspan='3' class='pt-recommend non-text-input'>"+recommendService+"</td><td colspan='2' class='pt-final-close non-text-input'>"+finalCloseStatus+"</td></tr>"+
					"</table>"+
				"</div>";

			$("#pre-talk").append(preTalkMenu + preTalkSection);
		}
//Purchase Records----------------------------------------------------------------------------------------------------------
		var profileBuilderList	= data.serviceRecordList.profileBuilderList;
		var mockInterviewList	= data.serviceRecordList.mockInterviewList;
		var vipServiceList		= data.serviceRecordList.vipServiceList;
		var referMeList			= data.serviceRecordList.referMeList;
		var eventList			= data.serviceRecordList.eventList;
		var uniMembership		= data.serviceRecordList.uniMembership;
		var uniAcademyList		= data.serviceRecordList.uniAcademyList;
		var personalMentorList	= data.serviceRecordList.personalMentorList;

	//Profile builder Record----------------------------------------------------
		for (var i = profileBuilderList.length - 1; i >= 0; i--) {
			var pbRecordId 				= profileBuilderList[i].record_id;
			var pbServiceRecordId 		= profileBuilderList[i].service_record_id;
			var pbStartDate 			= profileBuilderList[i].start_date;
			var pbFirstRevisionDate		= profileBuilderList[i].first_revision_date;
			var pbSecondRevisionDate	= profileBuilderList[i].second_revision_date;
			var pbThirdRevisionDate		= profileBuilderList[i].third_revision_date;
			var pbOffer					= profileBuilderList[i].offer;
			var pbNote 					= profileBuilderList[i].note;
			var pbServiceType			= profileBuilderList[i].service_type;
			var pbPaymentDate			= profileBuilderList[i].payment_date;
			var pbPaymentAmount			= profileBuilderList[i].payment_amount;
			if (profileBuilderList[i].mentor_id !== null && profileBuilderList[i].mentor_id !== "") {
				var pbMentor = profileBuilderList[i].mentor_id +": "+ profileBuilderList[i].mentor_firstname +" "+profileBuilderList[i].mentor_lastname;
			}else{
				var pbMentor = "";
			}

			if (pbOffer === "1") {
				pbOffer = "<input type='radio' name='pb-offer-"+pbServiceRecordId+"' value='1' disabled checked> Yes</input>"+
				      			"<input type='radio' name='pb-offer-"+pbServiceRecordId+"' value='0' disabled> No</input>";
			}else{
				pbOffer = "<input type='radio' name='pb-offer-"+pbServiceRecordId+"' value='1' disabled> Yes</input>"+
				      			"<input type='radio' name='pb-offer-"+pbServiceRecordId+"' value='0' disabled checked> No</input>";
			}
		
			var profileBuilderMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='pb-title-"+pbServiceRecordId+"'>"+
					"<label class='info-classification'>Profile Builder</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='pb-edit-"+pbServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var profileBuilderSection = 
				"<div class = 'row profile-builder-section' id='pb-section-"+pbServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Service Record ID</th><th>Payment Date</th><th colspan='2'>Payment Amount</th></tr>"+
						"<tr><td class='pb-sr-id non-text-input'>"+pbServiceRecordId+"</td><td class='pb-pay-date'>"+pbPaymentDate+"</td><td colspan='2' class='pb-pay-amount'>"+pbPaymentAmount+"</td></tr>"+
						"<tr><th>Start Date</th><th>First Revision Date</th><th>Second Revision Date</th><th>Third Revision Date</th></tr>"+
						"<tr><td class='pb-start-date'>"+pbStartDate+"</td><td class='pb-first-rev-date'>"+pbFirstRevisionDate+"</td><td class='pb-second-rev-date'>"+pbSecondRevisionDate+"</td><td class='pb-third-rev-date'>"+pbThirdRevisionDate+"</td></tr>"+
						"<tr><th colspan='2'>Mentor</th><th colspan='2'>Offer</th></tr>"+
						"<tr><td colspan='2' class='pb-mentor ui-widget mentor'>"+pbMentor+"</td><td colspan='2' class='pb-offer non-text-input'>"+pbOffer+"</td></tr>"+
						"<tr><th colspan='4'>Notes</th></tr>"+
						"<tr><td colspan='4' class='pb-note non-text-input note'>"+pbNote+"</td></tr>"+
					"</table>"+
				"</div>";

			$("#purchase-records").append(profileBuilderMenu + profileBuilderSection);

		}

	//Mock Interview------------------------------------------------------------
		for (var i = mockInterviewList.length - 1; i >= 0; i--) {
			var miRecordId 			= mockInterviewList[i].record_id;
			var miServiceRecordId	= mockInterviewList[i].service_record_id;
			var miInterviewCompany	= mockInterviewList[i].interview_company;
			var miInterviewPosition = mockInterviewList[i].interview_position;
			var miInterviewDate		= mockInterviewList[i].interview_date;
			var miMockDate 			= mockInterviewList[i].mock_date;
			var miResult			= mockInterviewList[i].result;
			var miserviceType		= mockInterviewList[i].service_type;
			var miPaymentDate		= mockInterviewList[i].payment_date;
			var miPaymentAmount		= mockInterviewList[i].payment_amount;
			if (mockInterviewList[i].mentor_id !== null && mockInterviewList[i].mentor_id !== "") {
				var miMentor = mockInterviewList[i].mentor_id +": "+ mockInterviewList[i].mentor_firstname +" "+mockInterviewList[i].mentor_lastname;
			}else{
				var miMentor = "";
			}

			if (miResult === "1") {
				miResult = "<input type='radio' name='mi-result-"+miServiceRecordId+"' value='1' disabled checked> Pass</input>"+
				      			"<input type='radio' name='mi-result-"+miServiceRecordId+"' value='0' disabled> Fail</input>";
			}else{
				miResult = "<input type='radio' name='mi-result-"+miServiceRecordId+"' value='1' disabled> Pass</input>"+
				      			"<input type='radio' name='mi-result-"+miServiceRecordId+"' value='0' disabled checked> Fail</input>";
			}

			var mockInterviewMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='mi-title-"+miServiceRecordId+"'>"+
					"<label class='info-classification'>Mock Interview</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='mi-edit-"+miServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var mockInterviewSection = 
				"<div class = 'row mock-interview-section' id='mi-section-"+miServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th colspan='2'>Service Record ID</th><th colspan='2'>Payment Date</th><th colspan='2'>Payment Amount</th></tr>"+
						"<tr><td colspan='2' class='mi-sr-id non-text-input'>"+miServiceRecordId+"</td><td colspan='2' class='mi-pay-date'>"+miPaymentDate+"</td><td colspan='2' class='mi-pay-amount'>"+miPaymentAmount+"</td></tr>"+
						"<tr><th colspan='3'>Interview Company</th><th colspan='2'>Interview Position</th><th colspan='1'>Interview Date</th></tr>"+
						"<tr><td colspan='3' class='mi-iv-com'>"+miInterviewCompany+"</td><td colspan='2' class='mi-iv-pos'>"+miInterviewPosition+"</td><td colspan='1' class='mi-iv-date'>"+miInterviewDate+"</td></tr>"+
						"<tr><th colspan='2'>Mentor</th><th colspan='2'>Mock Date</th><th colspan='2'>Result</th></tr>"+
						"<tr><td colspan='2' class='mi-mentor ui-widget mentor'>"+miMentor+"</td><td colspan='2' class='mi-mock-date'>"+miMockDate+"</td><td colspan='2' class='mi-result non-text-input'>"+miResult+"</td></tr>"+
					"</table>"+
				"</div>";

			$("#purchase-records").append(mockInterviewMenu + mockInterviewSection);

		}

	//VIP Service---------------------------------------------------------------
		for (var i = vipServiceList.length - 1; i >= 0; i--) {
			var vsRecordId		 		= vipServiceList[i].record_id;
			var vsServiceRecordId 		= vipServiceList[i].service_record_id;
			var vsSessionQuantity		= vipServiceList[i].session_quantity;
			var vsJobLocation1			= vipServiceList[i].job_location_1;
			var vsJobLocation2			= vipServiceList[i].job_location_2;
			var vsMpfTrack1				= vipServiceList[i].mpf_track_1;
			var vsMpfTrack2				= vipServiceList[i].mpf_track_2;
			var vsMpfBuiltDate			= vipServiceList[i].mpf_built_date;
			var vsMentorListSentDate	= vipServiceList[i].mentor_list_sent_date;
			var vsLeadMentorPickedDate	= vipServiceList[i].lead_mentor_picked_date;
			if (vipServiceList[i].lead_mentor_id !== null && vipServiceList[i].lead_mentor_id !== "") {
				var vsLeadMentor = vipServiceList[i].lead_mentor_id +": "+vipServiceList[i].lm_firstname +" "+vipServiceList[i].lm_lastname;
			}else{
				var vsLeadMentor = "";
			}
			var vsMentorChangeDate		= vipServiceList[i].mentor_change_date;
			if (vipServiceList[i].changed_to_mentor_id !== null && vipServiceList[i].changed_to_mentor_id !== "") {
				var vsChangedToMentor = vipServiceList[i].changed_to_mentor_id + ": "+ vipServiceList[i].cm_firstname +" "+ vipServiceList[i].cm_lastname;
			}else{
				var vsChangedToMentor = "";
			}
			if (vipServiceList[i].first_mentor_id !== null && vipServiceList[i].first_mentor_id !== "") {
				var vsFirstMentor = vipServiceList[i].first_mentor_id +": "+vipServiceList[i].fm_firstname +" "+vipServiceList[i].fm_lastname;
			}else{
				var vsFirstMentor = "";
			}
			if (vipServiceList[i].second_mentor_id !== null && vipServiceList[i].second_mentor_id !== "") {
				var vsSecondMentor = vipServiceList[i].second_mentor_id +": "+vipServiceList[i].sm_firstname +" "+vipServiceList[i].sm_lastname;
			}else{
				var vsSecondMentor = "";
			}
			if (vipServiceList[i].third_mentor_id !== null && vipServiceList[i].third_mentor_id !== "") {
				var vsThirdMentor = vipServiceList[i].third_mentor_id +": "+vipServiceList[i].tm_firstname +" "+vipServiceList[i].tm_lastname;
			}else{
				var vsThirdMentor = "";
			}
			if (vipServiceList[i].assist_mentor_1 !== null && vipServiceList[i].assist_mentor_1 !== "") {
				var vsAssistMentor1 = vipServiceList[i].assist_mentor_1 +": "+vipServiceList[i].af_firstname +" "+vipServiceList[i].af_lastname;
			}else{
				var vsAssistMentor1 = "";
			}
			if (vipServiceList[i].assist_mentor_2 !== null && vipServiceList[i].assist_mentor_2 !== "") {
				var vsAssistMentor2	= vipServiceList[i].assist_mentor_2 +": "+vipServiceList[i].as_firstname +" "+vipServiceList[i].as_lastname;
			}else{
				var vsAssistMentor2 = "";
			}
			if (vipServiceList[i].assist_mentor_3 !== null && vipServiceList[i].assist_mentor_3 !== "") {
				var vsAssistMentor3	= vipServiceList[i].assist_mentor_3 +": "+vipServiceList[i].at_firstname +" "+vipServiceList[i].at_lastname;
			}else{
				var vsAssistMentor3 = "";
			}
			if (vipServiceList[i].free_boot_camp_id !== null && vipServiceList[i].free_boot_camp_id !== "") {
				var vsFreeBootCamp = vipServiceList[i].free_boot_camp_id + ": "+vipServiceList[i].ev_type +" "+ vipServiceList[i].ev_location+" "+vipServiceList[i].ev_date;
			}else{
				var vsFreeBootCamp = "";
			}
			
			var vsComplete				= vipServiceList[i].complete;
			var vsServiceType			= vipServiceList[i].service_type;
			var vsPaymentDate			= vipServiceList[i].payment_date;
			var vsPaymentAmount			= vipServiceList[i].payment_amount;

			if (vsComplete === "1") {
				vsComplete = "<input type='radio' name='vs-complete-"+vsServiceRecordId+"' value='1' disabled checked> Yes</input>"+
				      			"<input type='radio' name='vs-complete-"+vsServiceRecordId+"' value='0' disabled> No</input>";
			}else{
				vsComplete = "<input type='radio' name='vs-complete-"+vsServiceRecordId+"' value='1' disabled> Yes</input>"+
				      			"<input type='radio' name='vs-complete-"+vsServiceRecordId+"' value='0' disabled checked> No</input>";
			}

			var vipServiceMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='vs-title-"+vsServiceRecordId+"'>"+
					"<label class='info-classification'>VIP Service</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='vs-edit-"+vsServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var vipServiceSection = 
				"<div class = 'row mock-interview-section' id='vs-section-"+vsServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th colspan='2'>Service Record ID</th><th colspan='2'>Payment Date</th><th colspan='2'>Payment Amount</th></tr>"+
						"<tr><td colspan='2' class='vs-sr-id non-text-input'>"+vsServiceRecordId+"</td><td colspan='2' class='vs-pay-date'>"+vsPaymentDate+"</td><td colspan='2' class='vs-pay-amount'>"+vsPaymentAmount+"</td></tr>"+
						"<tr><th colspan='2'>Session Quantity</th><th colspan='2'>Job Location 1</th><th colspan='2'>Job Location 2</th></tr>"+
						"<tr><td colspan='2' class='vs-ses-quant'>"+vsSessionQuantity+"</td><td colspan='2' class='vs-job-loc-1'>"+vsJobLocation1+"</td><td colspan='2' class='vs-job-loc-2'>"+vsJobLocation2+"</td></tr>"+
						"<tr><th colspan='2'>MPF Track 1</th><th colspan='2'>MPF Track 2</th><th colspan='2'>MPF Built Date</th></tr>"+
						"<tr><td colspan='2' class='vs-mpf-1 non-text-input'>"+vsMpfTrack1+"</td><td colspan='2' class='vs-mpf-2 non-text-input'>"+vsMpfTrack2+"</td><td colspan='2' class='vs-mpf-date'>"+vsMpfBuiltDate+"</td></tr>"+
						"<tr><th colspan='2'>Mentor List Sent Date</th><th colspan='2'>Lead Mentor Picked Date</th><th colspan='2'>Lead Mentor</th></tr>"+
						"<tr><td colspan='2' class='vs-mentorlist-date'>"+vsMentorListSentDate+"</td><td colspan='2' class='vs-lead-pick-date'>"+vsLeadMentorPickedDate+"</td><td colspan='2' class='vs-lead-mentor ui-widget mentor'>"+vsLeadMentor+"</td></tr>"+
						"<tr><th colspan='3'>Mentor Changed Date</th><th colspan='3'>Changed To Mentor</th></tr>"+
						"<tr><td colspan='3' class='vs-mentor-change-date'>"+vsMentorChangeDate+"</td><td colspan='3' class='vs-mentor-changed-to ui-widget mentor'>"+vsChangedToMentor+"</td></tr>"+
						"<tr><th colspan='2'>First Mentor</th><th colspan='2'>Second Mentor</th><th colspan='2'>Third Mentor</th></tr>"+
						"<tr><td colspan='2' class='vs-first-mentor ui-widget mentor'>"+vsFirstMentor+"</td><td colspan='2' class='vs-second-mentor ui-widget mentor'>"+vsSecondMentor+"</td><td colspan='2' class='vs-third-mentor ui-widget mentor'>"+vsThirdMentor+"</td></tr>"+
						"<tr><th colspan='2'>Assist Mentor 1</th><th colspan='2'>Assist Mentor 2</th><th colspan='2'>Assist Mentor 3</th></tr>"+
						"<tr><td colspan='2' class='vs-assist-mentor-1 ui-widget mentor'>"+vsAssistMentor1+"</td><td colspan='2' class='vs-assist-mentor-2 ui-widget mentor'>"+vsAssistMentor2+"</td><td colspan='2' class='vs-assist-mentor-3 ui-widget mentor'>"+vsAssistMentor3+"</td></tr>"+
						"<tr><th colspan='4'>Free Boot Camp</th><th colspan='2'>Complete</th></tr>"+
						"<tr><td colspan='4' class='vs-free-boot-camp ui-widget event'>"+vsFreeBootCamp+"</td><td colspan='2' class='vs-complete non-text-input'>"+vsComplete+"</td></tr>"+
					"</table>"+
				"</div>";

			$("#purchase-records").append(vipServiceMenu + vipServiceSection);

		}

	//Refer Me------------------------------------------------------------------
		for (var i = referMeList.length - 1; i >= 0; i--) {
			var rmRecordId 					= referMeList[i].record_id;
			var rmServiceRecordId			= referMeList[i].service_record_id;
			var rmJobType					= referMeList[i].job_type;
			var rmField						= referMeList[i].field;
			var rmPosition					= referMeList[i].position;
			if (referMeList[i].lead_mentor_id !== null && referMeList[i].lead_mentor_id !== "") {
				var rmLeadMentor = referMeList[i].lead_mentor_id +": "+referMeList[i].lm_firstname +" "+referMeList[i].lm_lastname;
			}else{
				var rmLeadMentor = "";
			}
			if (referMeList[i].mock_mentor_id !== null && referMeList[i].mock_mentor_id !== "") {
				var rmMockMentor = referMeList[i].mock_mentor_id +": "+referMeList[i].mm_firstname +" "+referMeList[i].mm_lastname;
			}else{
				var rmMockMentor = "";
			}
			
			var rmFirstInterviewDate		= referMeList[i].first_interview_date;
			var rmFirstInterviewCompany		= referMeList[i].first_interview_company;
			var rmFirstInterviewPosition	= referMeList[i].first_interview_position;
			var rmFirstInterviewResult		= referMeList[i].first_interview_result;
			var rmFirstInterviewNote		= referMeList[i].first_interview_note;
			var rmSecondInterviewDate		= referMeList[i].second_interview_date;
			var rmSecondInterviewCompany	= referMeList[i].second_interview_company;
			var rmSecondInterviewPosition	= referMeList[i].second_interview_position;
			var rmSecondInterviewResult		= referMeList[i].second_interview_result;
			var rmSecondInterviewNote		= referMeList[i].second_interview_note;
			var rmServiceType				= referMeList[i].service_type;
			var rmPaymentDate				= referMeList[i].payment_date;
			var rmPaymentAmount				= referMeList[i].payment_amount;

			if (rmJobType === "1") {
				rmJobType = 
						"<input type='radio' name='rm-job-type-"+rmServiceRecordId+"' value='1' disabled checked> Full Time</input>"+
				      	"<input type='radio' name='rm-job-type-"+rmServiceRecordId+"' value='0' disabled> Intern</input>";
			}else{
				rmJobType = 
						"<input type='radio' name='rm-job-type-"+rmServiceRecordId+"' value='1' disabled> Full Time</input>"+
				      	"<input type='radio' name='rm-job-type-"+rmServiceRecordId+"' value='0' disabled checked> Intern</input>";
			}

			if (rmFirstInterviewResult === "1") {
				rmFirstInterviewResult = 
						"<input type='radio' name='rm-first-iv-res-"+rmServiceRecordId+"' value='1' disabled checked> Pass</input>"+
				      	"<input type='radio' name='rm-first-iv-res-"+rmServiceRecordId+"' value='0' disabled> Fail</input>";
			}else{
				rmFirstInterviewResult = 
						"<input type='radio' name='rm-first-iv-res-"+rmServiceRecordId+"' value='1' disabled> Pass</input>"+
				      	"<input type='radio' name='rm-first-iv-res-"+rmServiceRecordId+"' value='0' disabled checked> Fail</input>";
			}

			if (rmSecondInterviewResult === "1") {
				rmSecondInterviewResult = 
						"<input type='radio' name='rm-Second-iv-res-"+rmServiceRecordId+"' value='1' disabled checked> Pass</input>"+
				      	"<input type='radio' name='rm-Second-iv-res-"+rmServiceRecordId+"' value='0' disabled> Fail</input>";
			}else{
				rmSecondInterviewResult = 
						"<input type='radio' name='rm-Second-iv-res-"+rmServiceRecordId+"' value='1' disabled> Pass</input>"+
				      	"<input type='radio' name='rm-Second-iv-res-"+rmServiceRecordId+"' value='0' disabled checked> Fail</input>";
			}


			var referMeMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='rm-title-"+rmServiceRecordId+"'>"+
					"<label class='info-classification'>Refer Me</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='rm-edit-"+rmServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var referMeSection = 
				"<div class = 'row mock-interview-section' id='rm-section-"+rmServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th colspan='2'>Service Record ID</th><th colspan='2'>Payment Date</th><th colspan='2'>Payment Amount</th></tr>"+
						"<tr><td colspan='2' class='rm-sr-id non-text-input'>"+rmServiceRecordId+"</td><td colspan='2' class='rm-pay-date'>"+rmPaymentDate+"</td><td colspan='2' class='rm-pay-amount'>"+rmPaymentAmount+"</td></tr>"+
						"<tr><th colspan='2'>Job Type</th><th colspan='2'>Field</th><th colspan='2'>Postion</th></tr>"+
						"<tr><td colspan='2' class='rm-job-type non-text-input'>"+rmJobType+"</td><td colspan='2' class='rm-field non-text-input'>"+rmField+"</td><td colspan='2' class='rm-pos'>"+rmPosition+"</td></tr>"+
						"<tr><th colspan='3'>Lead Mentor</th><th colspan='3'>Mock Mentor</th></tr>"+
						"<tr><td colspan='3' class='rm-lead-mentor ui-widget mentor'>"+rmLeadMentor+"</td><td colspan='3' class='rm-mock-mentor ui-widget mentor'>"+rmMockMentor+"</td></tr>"+
						"<tr><th colspan='6'>First Interview</th></tr>"+
						"<tr><th colspan='1'>Date</th><th colspan='2'>Company</th><th colspan='2'>Position</th><th colspan='1'>Result</th></tr>"+
						"<tr><td colspan='1' class='rm-first-iv-date'>"+rmFirstInterviewDate+"</td><td colspan='2' class='rm-first-iv-com'>"+rmFirstInterviewCompany+"</td><td colspan='2' class='rm-first-iv-pos'>"+rmFirstInterviewPosition+"</td><td colspan='1' class='rm-first-iv-res non-text-input'>"+rmFirstInterviewResult+"</td></tr>"+
						"<tr><th colspan='6'>Note</th></tr>"+
						"<tr><td colspan='6' class='rm-first-iv-note non-text-input note'>"+rmFirstInterviewNote+"</td></tr>"+
						"<tr><th colspan='6'>Second Interview</th></tr>"+
						"<tr><th colspan='1'>Date</th><th colspan='2'>Company</th><th colspan='2'>Position</th><th colspan='1'>Result</th></tr>"+
						"<tr><td colspan='1' class='rm-sec-iv-date'>"+rmSecondInterviewDate+"</td><td colspan='2' class='rm-sec-iv-com'>"+rmSecondInterviewCompany+"</td><td colspan='2' class='rm-sec-iv-pos'>"+rmSecondInterviewPosition+"</td><td colspan='1' class='rm-sec-iv-res non-text-input'>"+rmSecondInterviewResult+"</td></tr>"+
						"<tr><th colspan='6'>Note</th></tr>"+
						"<tr><td colspan='6' class='rm-sec-iv-note non-text-input note'>"+rmSecondInterviewNote+"</td></tr>"+
					"</table>"+
				"</div>";

			$("#purchase-records").append(referMeMenu + referMeSection);

		}

	//Event---------------------------------------------------------------------
		for (var i = eventList.length - 1; i >= 0; i--) {
			var event 					= eventList[i].event_id + ": " + eventList[i].type + " " + eventList[i].location + " " + eventList[i].date;
			var eventServiceRecordId	= eventList[i].service_record_id;
			var eventServiceType		= eventList[i].service_type;
			var eventPaymentDate		= eventList[i].payment_date;
			var eventPaymentAmount		= eventList[i].payment_amount;

			var eventMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='ev-title-"+eventServiceRecordId+"'>"+
					"<label class='info-classification'>Event</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='ev-edit-"+eventServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var eventSection = 
				"<div class = 'row event-section' id='ev-section-"+eventServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Service Record ID</th><th>Payment Date</th><th>Payment Amount</th></tr>"+
						"<tr><td class='ev-sr-id non-text-input'>"+eventServiceRecordId+"</td><td class='ev-pay-date'>"+eventPaymentDate+"</td><td class='ev-pay-amount'>"+eventPaymentAmount+"</td></tr>"+
						"<tr><th colspan='3'>Event</th></tr>"+
						"<tr><td colspan='3' class='ev-event ui-widget event'>"+event+"</td></tr>"+
				"</div>";

			$("#purchase-records").append(eventMenu + eventSection);

		}

	//UniMembership-------------------------------------------------------------
		for (var i = uniMembership.length - 1; i >= 0; i--) {
			var umServiceRecordId 	= uniMembership[i].service_record_id;
			var umServiceType		= uniMembership[i].service_type;
			var umPaymentDate		= uniMembership[i].payment_date;
			var umPaymentAmount		= uniMembership[i].payment_amount;

			var uniMembershipMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='um-title-"+umServiceRecordId+"'>"+
					"<label class='info-classification'>UniMembership</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='um-edit-"+umServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var uniMembershipSection = 
				"<div class = 'row unimembership-section' id='um-section-"+umServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Service Record ID</th><th>Payment Date</th><th>Payment Amount</th></tr>"+
						"<tr><td class='um-sr-id non-text-input'>"+umServiceRecordId+"</td><td class='um-pay-date'>"+umPaymentDate+"</td><td class='um-pay-amount'>"+umPaymentAmount+"</td></tr>"+
				"</div>";

			$("#purchase-records").append(uniMembershipMenu + uniMembershipSection);
		}

	//UniAcademy----------------------------------------------------------------
		for (var i = uniAcademyList.length - 1; i >= 0; i--) {
			var uaServiceRecordId 	= uniAcademyList[i].service_record_id;
			var uaServiceType		= uniAcademyList[i].service_type;
			var uaPaymentDate		= uniAcademyList[i].payment_date;
			var uaPaymentAmount		= uniAcademyList[i].payment_amount;

			var uniAcademyMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='ua-title-"+uaServiceRecordId+"'>"+
					"<label class='info-classification'>UniAcademy</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='ua-edit-"+uaServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var uniAcademySection = 
				"<div class = 'row uniacademy-section' id='ua-section-"+uaServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Service Record ID</th><th>Payment Date</th><th>Payment Amount</th></tr>"+
						"<tr><td class='ua-sr-id non-text-input'>"+uaServiceRecordId+"</td><td class='ua-pay-date'>"+uaPaymentDate+"</td><td class='ua-pay-amount'>"+uaPaymentAmount+"</td></tr>"+
				"</div>";

			$("#purchase-records").append(uniAcademyMenu + uniAcademySection);
		}

	//Personal Mentor-----------------------------------------------------------
		for (var i = personalMentorList.length - 1; i >= 0; i--) {
			var pmServiceRecordId 	= personalMentorList[i].service_record_id;
			var pmServiceType		= personalMentorList[i].service_type;
			var pmPaymentDate		= personalMentorList[i].payment_date;
			var pmPaymentAmount		= personalMentorList[i].payment_amount;

			var personalMentorMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='pm-title-"+pmServiceRecordId+"'>"+
					"<label class='info-classification'>Personal Mentor</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='pm-edit-"+pmServiceRecordId+"'>Edit Info</button>"+
				"</div>";

			var personalMentorSection = 
				"<div class = 'row personal-mentor-section' id='pm-section-"+pmServiceRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Service Record ID</th><th>Payment Date</th><th>Payment Amount</th></tr>"+
						"<tr><td class='pm-sr-id non-text-input'>"+pmServiceRecordId+"</td><td class='pm-pay-date'>"+pmPaymentDate+"</td><td class='pm-pay-amount'>"+pmPaymentAmount+"</td></tr>"+
				"</div>";

			$("#purchase-records").append(personalMentorMenu + personalMentorSection);
		}

//Other Records-------------------------------------------------------------------------------------------------------------
		var internalReferralList 	= data.internalReferralList;
		var otherOfferList			= data.otherOfferList;
		var sessionTrackingList		= data.sessionTrackingList;
		var creditList				= data.creditList;

	//Internal Referral---------------------------------------------------------
		for (var i = internalReferralList.length - 1; i >= 0; i--) {
			var irRecordId 			= internalReferralList[i].record_id;
			var internalReferral 	= internalReferralList[i].internal_referral_id+": "+internalReferralList[i].company+" "+internalReferralList[i].position+" "+internalReferralList[i].location;
			var irReferDate			= internalReferralList[i].refer_date;
			var irCurrentStatus		= internalReferralList[i].current_status;
			var irInterviewDate		= internalReferralList[i].interview_date;
			var irHiredDate			= internalReferralList[i].hired_date;

			if (internalReferralList[i].type === "1") {
				internalReferral = internalReferral + " Fulltime";
			}else{
				internalReferral = internalReferral + " Intern";
			}

			if (irCurrentStatus === "referred") {
				irCurrentStatus = 	
						"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='referred' disabled checked> Referrd</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='interviewed' disabled> Interviewed</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='hired' disabled> Hired</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='failed' disabled> Failed</input>";
			}else if (irCurrentStatus === "interviewed") {
				irCurrentStatus = 	
						"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='referred' disabled> Referrd</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='interviewed' disabled checked> Interviewed</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='hired' disabled> Hired</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='failed' disabled> Failed</input>";
			}else if (irCurrentStatus === "hired") {
				irCurrentStatus = 	
						"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='referred' disabled> Referrd</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='interviewed' disabled> Interviewed</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='hired' disabled checked> Hired</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='failed' disabled> Failed</input>";
			}else if (irCurrentStatus === "failed") {
				irCurrentStatus = 	
						"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='referred' disabled> Referrd</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='interviewed' disabled> Interviewed</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='hired' disabled> Hired</input>"+
				      	"<input type='radio' name='ir-cur-status-"+irRecordId+"' value='failed' disabled checked> Failed</input>";
			}

			var InternalReferralMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='ir-title-"+irRecordId+"'>"+
					"<label class='info-classification'>Internal Referral</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='ir-edit-"+irRecordId+"'>Edit Info</button>"+
				"</div>";

			var InternalReferralSection = 
				"<div class = 'row event-section' id='ir-section-"+irRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Record ID</th><th colspan='2'>Current Status</th></tr>"+
						"<tr><td class='non-text-input ir-record-id'>"+irRecordId+"</td><td colspan='3' class='ir-cur-status non-text-input'>"+irCurrentStatus+"</td></tr>"+
						"<tr><th colspan='3'>Internal Referral</th></tr>"+
						"<tr><td colspan='3' class='ui-widget internal-referral'>"+internalReferral+"</td></tr>"+
						"<tr><th>Refer Date</th><th>Interview Date</th><th>Hired Date</th></tr>"+
						"<tr><td class='ir-refer-date'>"+irReferDate+"</td><td class='ir-iv-date'>"+irInterviewDate+"</td><td class='ir-hr-date'>"+irHiredDate+"</td></tr>"+
				"</div>";

			$("#other-records").append(InternalReferralMenu + InternalReferralSection);
		}

	//otherOfferTracking--------------------------------------------------------
		for (var i = otherOfferList.length - 1; i >= 0; i--) {
			var offerId  		= otherOfferList[i].offer_id;
			var offerDate		= otherOfferList[i].offer_date;
			var offerType		= otherOfferList[i].type;
			var offerCompany	= otherOfferList[i].company;
			var offerPosition	= otherOfferList[i].position;
			var offerLocation	= otherOfferList[i].location;

			if (offerType === "1") {
				offerType = 
						"<input type='radio' name='of-type-"+offerId+"' value='1' disabled checked> Full Time</input>"+
				      	"<input type='radio' name='of-type-"+offerId+"' value='0' disabled> Intern</input>";
			}else{
				offerType = 
						"<input type='radio' name='of-type-"+offerId+"' value='1' disabled> Full Time</input>"+
				      	"<input type='radio' name='of-type-"+offerId+"' value='0' disabled checked> Intern</input>";
			}

			var otherOfferMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='of-title-"+offerId+"'>"+
					"<label class='info-classification'>Other Offer Tracking</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='of-edit-"+offerId+"'>Edit Info</button>"+
				"</div>";

			var otherOfferSection = 
				"<div class = 'row other-offer-section' id='of-section-"+offerId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Offer ID</th><th>Offer Date</th><th>type</th><th>Location</th></tr>"+
						"<tr><td class='of-id non-text-input'>"+offerId+"</td><td class='of-date'>"+offerDate+"</td><td class='of-type non-text-input'>"+offerType+"</td><td class='of-loc'>"+offerLocation+"</td></tr>"+
						"<tr><th colspan='2'>Company</th><th colspan='2'>Position</th></tr>"+
						"<tr><td colspan='2' class='of-com'>"+offerCompany+"</td><td colspan='2' class='of-pos'>"+offerPosition+"</td></tr>"+
				"</div>";

			$("#other-records").append(otherOfferMenu + otherOfferSection);
		}

	//Session Tracking----------------------------------------------------------
		for (var i = sessionTrackingList.length - 1; i >= 0; i--) {
			var stRecordId  		= sessionTrackingList[i].record_id;
			if (sessionTrackingList[i].mentor_id !== null || sessionTrackingList[i].mentor_id !== "") {
				var stMentor = sessionTrackingList[i].mentor_id +": "+sessionTrackingList[i].mentor_firstname +" "+sessionTrackingList[i].mentor_lastname;
			}else{
				var stMentor = "";
			}
			var stSessionNumber 	= sessionTrackingList[i].session_number;
			var stDate 				= sessionTrackingList[i].date;
			var stTopic				= sessionTrackingList[i].topic;
			var stAssignment		= sessionTrackingList[i].assignment;
			var stNote 				= sessionTrackingList[i].note;

			var sessionTrackingMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='st-title-"+stRecordId+"'>"+
					"<label class='info-classification'>Session Tracking</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='st-edit-"+stRecordId+"'>Edit Info</button>"+
				"</div>";

			var sessionTrackingSection = 
				"<div class = 'row session-tracking-section' id='st-section-"+stRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Tracking ID</th><th>Mentor</th><th>Session Number</th><th>Date</th></tr>"+
						"<tr><td class='st-id non-text-input'>"+stRecordId+"</td><td class='st-mentor ui-widget mentor'>"+stMentor+"</td><td class='st-ses-num'>"+stSessionNumber+"</td><td class='st-date'>"+stDate+"</td></tr>"+
						"<tr><th colspan='4'>Topic</th><tr>"+
						"<tr><td colspan='4' class='st-topic non-text-input note'>"+stTopic+"</td><tr>"+
						"<tr><th colspan='4'>Assignment</th><tr>"+
						"<tr><td colspan='4' class='st-assignment non-text-input note'>"+stAssignment+"</td><tr>"+
						"<tr><th colspan='4'>Note</th><tr>"+
						"<tr><td colspan='4' class='st-note non-text-input note'>"+stNote+"</td><tr>"+
				"</div>";

			$("#other-records").append(sessionTrackingMenu + sessionTrackingSection);
		}

	//Credit--------------------------------------------------------------------
		for (var i = creditList.length - 1; i >= 0; i--) {
			var ucRecordId 		= creditList[i].record_id;
			var ucIssueDate		= creditList[i].issue_date;
			var ucReason		= creditList[i].reason;
			var ucAmount		= creditList[i].amount;
			var ucUseDate 		= creditList[i].use_date;
			var ucNote 			= creditList[i].note;

			var creditMenu = 
				"<div class = 'row service-title-wrapper' align='right' id='uc-title-"+ucRecordId+"'>"+
					"<label class='info-classification'>UniCareer Credit</label>"+
					"<button type='button' class='btn btn-primary operation-button' id='uc-edit-"+ucRecordId+"'>Edit Info</button>"+
				"</div>";

			var creditSection = 
				"<div class = 'row session-tracking-section' id='uc-section-"+ucRecordId+"'>"+
					"<table class = 'result-table'>"+
						"<tr><th>Record ID</th><th>Issue Date</th><th>Amount</th><th>Use Date</th></tr>"+
						"<tr><td class='uc-id non-text-input'>"+ucRecordId+"</td><td class='uc-issue-date'>"+ucIssueDate+"</td><td class='uc-amount'>"+ucAmount+"</td><td class='uc-use-date'>"+ucUseDate+"</td></tr>"+
						"<tr><th colspan='4'>Reason</th><tr>"+
						"<tr><td colspan='4' class='uc-reason non-text-input note'>"+ucReason+"</td><tr>"+
						"<tr><th colspan='4'>Note</th><tr>"+
						"<tr><td colspan='4' class='uc-note non-text-input note'>"+ucNote+"</td><tr>"+
				"</div>";

			$("#other-records").append(creditMenu + creditSection);
		};
	});
});