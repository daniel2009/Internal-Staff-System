<?php

require 'configure.php';

$con = connectToDatabase();

$menteeId 	= $_POST['menteeId'];
$recordType = $_POST['recordType'];

if ($recordType === "Internal Referral Tracking") {
	
	$internalReferralId 			= $_POST['internalReferralId'];
	$internalReferralReferDate 		= $_POST['internalReferralReferDate'];
	$internalReferralInterviewDate 	= $_POST['internalReferralInterviewDate'];
	$internalReferralHiredDate 		= $_POST['internalReferralHiredDate'];
	$internalReferralResult 		= $_POST['internalReferralResult'];

	$sql = "INSERT INTO internal_referral_record (internal_referral_id, candidate_type, mentee_id, refer_date, interview_date, hired_date) VALUES ('$internalReferralId', 1, '$menteeId', '$internalReferralReferDate', '$internalReferralInterviewDate', '$internalReferralHiredDate')";

}elseif ($recordType === "UniCareer Credit") {

	$creditIssueDate 	= $_POST['creditIssueDate'];
	$creditReason 		= $_POST['creditReason'];
	$creditAmount 		= $_POST['creditAmount'];
	$creditUseDate 		= $_POST['creditUseDate'];
	$creditNote 		= $_POST['creditNote'];

	$sql = "INSERT INTO unicareer_credit (mentee_id, issue_date, reason, amount, use_date, note) VALUES ('$menteeId', '$creditIssueDate', '$creditReason', '$creditAmount', '$creditUseDate', '$creditNote')";

}elseif ($recordType === "Other Offer Tracking") {

	$offerTrackingType 		= $_POST['offerTrackingType'];
	$offerTrackingDate 		= $_POST['offerTrackingDate'];
	$offerTrackingCompany 	= $_POST['offerTrackingCompany'];
	$offerTrackingPosition 	= $_POST['offerTrackingPosition'];
	$offerTrackingLocation	= $_POST['offerTrackingLocation'];

	$sql = "INSERT INTO other_offer_tracking_record (mentee_id, offer_date, type, company, position, location) VALUES ('$menteeId', '$offerTrackingDate', '$offerTrackingType', '$offerTrackingCompany', '$offerTrackingPosition', '$offerTrackingLocation')";
}elseif ($recordType === "Session Tracking"){

	$sessionMentorId 		= $_POST['sessionMentorId'];
	$sessionNumber 			= $_POST['sessionNumber'];
	$sessionDate 			= $_POST['sessionDate'];
	$sessionTopic 			= $_POST['sessionTopic'];
	$sessionAssignment 		= $_POST['sessionAssignment'];

	$sql = "INSERT INTO session_tracking (mentee_id, mentor_id, session_number, date, topic, assignment, note) VALUES ('$menteeId', '$sessionMentorId', '$sessionNumber', '$sessionDate', '$sessionTopic', '$sessionAssignment')";
}

if (mysqli_query($con, $sql)){
    echo"Information inserted successfully!";
}else{
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

?>