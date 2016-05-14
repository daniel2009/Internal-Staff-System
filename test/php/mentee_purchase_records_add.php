<?php

require 'configure.php';

$con = connectToDatabase();

$menteeId 		= "'".$_POST['menteeId']."'";
$serviceType 	= "'".$_POST['serviceType']."'";
$paymentDate 	= "'".$_POST['paymentDate']."'";
$paymentAmount 	= "'".$_POST['paymentAmount']."'";

$sql = "INSERT INTO service_records (mentee_id, service_type, payment_date, payment_amount) VALUES ($menteeId,$serviceType,$paymentDate, $paymentAmount)";

if (mysqli_query($con, $sql)){

    $serviceRecordId = mysqli_insert_id($con);
}else{
    die('Error: ' . mysqli_error($con));
}

if ($serviceType === "'Profile Builder'") {

	$profileBuilderStartDate 			= "'".$_POST['profileBuilderStartDate']."'";
	$profileBuilderFirstRevisionDate 	= "'".$_POST['profileBuilderFirstRevisionDate']."'";
	$profileBuilderSecondRevisionDate 	= "'".$_POST['profileBuilderSecondRevisionDate']."'";
	$profileBuilderThirdRevisionDate 	= "'".$_POST['profileBuilderThirdRevisionDate']."'";
	$profileBuilderMentorId 			= ($_POST['profileBuilderMentorId'] === "") ? 'null' : "'".$_POST['profileBuilderMentorId']."'";
	$profileBuilderOffer 				= "'".$_POST['profileBuilderOffer']."'";
	$profileBuilderNote 				= "'".$_POST['profileBuilderNote']."'";

	$sql = "INSERT INTO profile_builder_record (service_record_id, start_date, first_revision_date, second_revision_date, third_revision_date, mentor_id, offer, note) VALUES ($serviceRecordId,$profileBuilderStartDate, $profileBuilderFirstRevisionDate, $profileBuilderSecondRevisionDate, $profileBuilderThirdRevisionDate, $profileBuilderMentorId, $profileBuilderOffer, $profileBuilderNote)";
	
	if (mysqli_query($con, $sql)){
	    echo"Information inserted successfully!";
	}else{
	    die('Error: ' . mysqli_error($con));
	}

}elseif ($serviceType === "'Mock Interview'") {

	$interviewCompany 		= "'".$_POST['interviewCompany']."'";
	$interviewPosition 		= "'".$_POST['interviewPosition']."'";
	$interviewDate 			= "'".$_POST['interviewDate']."'";
	$mockMentorId 			= ($_POST['mockMentorId'] === "") ? 'null' : "'".$_POST['mockMentorId']."'";
	$mockDate 				= "'".$_POST['mockDate']."'";
	$mockResult 			= "'".$_POST['mockResult']."'";

	$sql = "INSERT INTO mock_interview_record (service_record_id, interview_company, interview_position, interview_date, mentor_id, mock_date, result) VALUES ($serviceRecordId, $interviewCompany, $interviewPosition, $interviewDate, $mockMentorId, $mockDate, $mockResult)";

	if (mysqli_query($con, $sql)){
	    echo"Information inserted successfully!";
	}else{
	    die('Error: ' . mysqli_error($con));
	}

}elseif ($serviceType === "'VIP Service'") {
	
	$sessionQuantity 		= "'".$_POST['sessionQuantity']."'";
	$firstJobLocation 		= "'".$_POST['firstJobLocation']."'";
	$secondJobLocation 		= "'".$_POST['secondJobLocation']."'";
	$mpfTrack1 				= "'".$_POST['mpfTrack1']."'";
	$mpfTrack2 				= "'".$_POST['mpfTrack2']."'";
	$mpfBuiltDate 			= "'".$_POST['mpfBuiltDate']."'";
	$vipFirstMentorId 		= ($_POST['vipFirstMentorId'] === "") ? 'null' : "'".$_POST['vipFirstMentorId']."'";
	$vipSecondMentorId 		= ($_POST['vipSecondMentorId'] === "") ? 'null' : "'".$_POST['vipSecondMentorId']."'";
	$vipThirdMentorId 		= ($_POST['vipThirdMentorId'] === "") ? 'null' : "'".$_POST['vipThirdMentorId']."'";
	$vipMentorListSentDate 	= "'".$_POST['vipMentorListSentDate']."'";
	$vipLeadMentorPickDate 	= "'".$_POST['vipLeadMentorPickDate']."'";
	$vipLeadMentorId 		= ($_POST['vipLeadMentorId'] === "") ? 'null' : "'".$_POST['vipLeadMentorId']."'";
	$vipMentorChangedDate 	= "'".$_POST['vipMentorChangedDate']."'";
	$vipMentorChangedToId 	= ($_POST['vipMentorChangedToId'] === "") ? 'null' : "'".$_POST['vipMentorChangedToId']."'";
	$vipAssistMentor1Id 	= ($_POST['vipAssistMentor1Id'] === "") ? 'null' : "'".$_POST['vipAssistMentor1Id']."'";
	$vipAssistMentor2Id 	= ($_POST['vipAssistMentor2Id'] === "") ? 'null' : "'".$_POST['vipAssistMentor2Id']."'";
	$vipAssistMentor3Id 	= ($_POST['vipAssistMentor3Id'] === "") ? 'null' : "'".$_POST['vipAssistMentor3Id']."'";
	$vipFreeBootCampId 		= ($_POST['vipFreeBootCampId'] === "") ? 'null' : "'".$_POST['vipFreeBootCampId']."'";
	$vipComplete 			= "'".$_POST['vipComplete']."'";

	$sql = "INSERT INTO vip_service_record (service_record_id, session_quantity, job_location_1, job_location_2, mpf_track_1, mpf_track_2, mpf_built_date, first_mentor_id, second_mentor_id, third_mentor_id, mentor_list_sent_date, lead_mentor_picked_date, lead_mentor_id, mentor_change_date, changed_to_mentor_id, assist_mentor_1, assist_mentor_2, assist_mentor_3, free_boot_camp_id, complete) VALUES ($serviceRecordId, $sessionQuantity, $firstJobLocation, $secondJobLocation, $mpfTrack1, $mpfTrack2, $mpfBuiltDate, $vipFirstMentorId, $vipSecondMentorId, $vipThirdMentorId, $vipMentorListSentDate, $vipLeadMentorPickDate, $vipLeadMentorId, $vipMentorChangedDate, $vipMentorChangedToId, $vipAssistMentor1Id, $vipAssistMentor2Id, $vipAssistMentor3Id, $vipFreeBootCampId, $vipComplete)";

	if ($vipFreeBootCampId !== 'null') {
		$sql_boot_camp = "INSERT INTO event_attend_record (service_record_id, event_id, attendee_type, mentee_id, no_charge) VALUES ($serviceRecordId, $vipFreeBootCampId, 1, $menteeId, 1)";

		if (!mysqli_query($con, $sql_boot_camp)){
		    die('Error: ' . mysqli_error($con));
		}
	}
	
	if (mysqli_query($con, $sql)){
	    echo"Information inserted successfully!";
	}else{
	    die('Error: ' . mysqli_error($con));
	}

}elseif ($serviceType === "'Refer Me'") {
	$referJobType 					= "'".$_POST['referJobType']."'";
	$referField 					= "'".$_POST['referField']."'";
	$referPosition 					= "'".$_POST['referPosition']."'";
	$referLeadMentor 				= ($_POST['referLeadMentor'] === "") ? 'null' : "'".$_POST['referLeadMentor']."'";
	$referMockMentor 				= ($_POST['referMockMentor'] === "") ? 'null' : "'".$_POST['referMockMentor']."'";
	$referFirstInterviewDate 		= "'".$_POST['referFirstInterviewDate']."'";
	$referFirstInterviewCompany 	= "'".$_POST['referFirstInterviewCompany']."'";
	$referFirstInterviewPosition 	= "'".$_POST['referFirstInterviewPosition']."'";
	$referFirstInterviewResult 		= "'".$_POST['referFirstInterviewResult']."'";
	$referFirstInterviewNote 		= "'".$_POST['referFirstInterviewNote']."'";
	$referSecondInterviewDate 		= "'".$_POST['referSecondInterviewDate']."'";
	$referSecondInterviewCompany 	= "'".$_POST['referSecondInterviewCompany']."'";
	$referSecondInterviewPosition 	= "'".$_POST['referSecondInterviewPosition']."'";
	$referSecondInterviewResult 	= "'".$_POST['referSecondInterviewResult']."'";
	$referSecondInterviewNote 		= "'".$_POST['referSecondInterviewNote']."'";

	$sql = "INSERT INTO refer_me_record (service_record_id, job_type, field, position, lead_mentor_id, mock_mentor_id, first_interview_date, first_interview_company, first_interview_position, first_interview_result, first_interview_note, second_interview_date, second_interview_company, second_interview_position, second_interview_result, second_interview_note)  VALUES ($serviceRecordId, $referJobType, $referField, $referPosition, $referLeadMentor, $referMockMentor, $referFirstInterviewDate, $referFirstInterviewCompany, $referFirstInterviewPosition, $referFirstInterviewResult, $referFirstInterviewNote, $referSecondInterviewDate, $referSecondInterviewCompany, $referSecondInterviewPosition, $referSecondInterviewResult, $referSecondInterviewNote)";

	if (mysqli_query($con, $sql)){
	    echo"Information inserted successfully!";
	}else{
	    die('Error: ' . mysqli_error($con));
	}

}elseif($serviceType === "'Event'") {
	$eventEntryId = "'".$_POST['eventEntryId']."'";

	$sql = "INSERT INTO event_attend_record (service_record_id, event_id, attendee_type, mentee_id, no_charge) VALUES ($serviceRecordId, $eventEntryId, 1, $menteeId, 0)";

	if (mysqli_query($con, $sql)){
	    echo"Information inserted successfully!";
	}else{
	    die('Error: ' . mysqli_error($con));
	}
}else{
	echo "Information inserted successfully!";
}

mysqli_close($con);

?>