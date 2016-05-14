<?php

require 'configure.php';

$con = connectToDatabase();

$menteeBasicInfoList= array();

$basicInfoType = $_POST['basicInfoType'];

echo $basicInfoType;

function ifNoInput($idString){
	if ($idString === "" || !isset($idString)) {
		$queryString = "Like '%%'";
	}else{
		$queryString = "= '$idString'";
	}
	return $queryString;
}


function customQueryClause($basicInfoType){

	$serviceFilter = $_POST['serviceFilter'];

	if ($basicInfoType === "School") {
		$keyWord = $_POST['keyWord'];
		$queryClause = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration
						FROM mentees_basic 
						WHERE school LIKE '%$keyWord%' AND ";

	}elseif ($basicInfoType === "Concentration") {
		$keyWord = $_POST['keyWord'];
		$queryClause = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration
						FROM mentees_basic 
						WHERE (first_concentration LIKE '%$keyWord%' OR second_concentration LIKE '%$keyWord%') AND ";

	}elseif ($basicInfoType === "Payment Date") {
		if ($_POST['basicDateFrom'] === "") {
			$basicDateFrom = "2000-01-01";
		}else{
			$basicDateFrom = $_POST['basicDateFrom'];
		}

		if ($_POST['basicDateTo'] === "") {
			$basicDateTo = "2090-12-31";
		}else{
			$basicDateTo = $_POST['basicDateTo'];
		}
		
		$queryClause = "SELECT mentees_basic.mentee_id, mentees_basic.firstname, mentees_basic.lastname, mentees_basic.school, mentees_basic.first_concentration, mentees_basic.second_concentration
						FROM mentees_basic INNER JOIN service_records 
						ON mentees_basic.mentee_id = service_records.mentee_id
						AND service_records.payment_date >= '$basicDateFrom' AND service_records.payment_date <= '$basicDateTo' AND mentees_basic.";

	}elseif ($basicInfoType === "Service") {
		$serviceFilter = $_POST['serviceSelect'];
		$queryClause = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration
						FROM mentees_basic WHERE ";
	}


	if ($serviceFilter === "Default") {
		$sql = $queryClause."1=1 GROUP BY mentee_id";

	}elseif ($serviceFilter === "UniMembership") {
		$sql = $queryClause."is_unimember = 1 GROUP BY mentee_id";

	}elseif ($serviceFilter === "Profile Builder") {
		$profileBuilderMentorId = ifNoInput($_POST['profileBuilderMentorId']);
		$sql = $queryClause."mentee_id IN (SELECT service_records.mentee_id FROM profile_builder_record INNER JOIN service_records 
									ON profile_builder_record.mentor_id ".$profileBuilderMentorId."
									AND profile_builder_record.service_record_id = service_records.service_record_id) 
									GROUP BY mentee_id";

	}elseif ($serviceFilter === "Mock Interview") {
		$mockInterviewMentorId = ifNoInput($_POST['mockInterviewMentorId']);
		$sql = $queryClause."mentee_id IN (SELECT service_records.mentee_id FROM mock_interview_record INNER JOIN service_records 
									ON mock_interview_record.mentor_id ".$mockInterviewMentorId."
									AND mock_interview_record.service_record_id = service_records.service_record_id) 
									GROUP BY mentee_id";

	}elseif ($serviceFilter === "VIP Service") {
		$vipServiceJobLocation = $_POST['vipServiceJobLocation'];
		$vipServiceMpfTrack = ifNoInput($_POST['vipServiceMpfTrack']);
		$vipServiceMentorId = ifNoInput($_POST['vipServiceMentorId']);
		$sql = $queryClause."mentee_id IN (SELECT service_records.mentee_id FROM vip_service_record INNER JOIN service_records 
									ON vip_service_record.lead_mentor_id ".$vipServiceMentorId." 
									AND (vip_service_record.job_location_1 LIKE '%$vipServiceJobLocation%' OR vip_service_record.job_location_2 LIKE '%$vipServiceJobLocation%') 
									AND (vip_service_record.mpf_track_1 ".$vipServiceMpfTrack." OR vip_service_record.mpf_track_2 ".$vipServiceMpfTrack.") 
									AND vip_service_record.service_record_id = service_records.service_record_id) 
									GROUP BY mentee_id";

	}elseif ($serviceFilter === "Refer Me") {
		$referMeJobType = ifNoInput($_POST['referMeJobType']);
		$referMeField = ifNoInput($_POST['referMeField']);
		$referMeLeadMentorId = ifNoInput($_POST['referMeLeadMentorId']);
		$referMeMockMentorId = ifNoInput($_POST['referMeMockMentorId']);
		$sql = $queryClause."mentee_id IN (SELECT service_records.mentee_id FROM refer_me_record INNER JOIN service_records 
									ON refer_me_record.lead_mentor_id ".$referMeLeadMentorId."
									AND refer_me_record.mock_mentor_id ".$referMeMockMentorId."
									AND refer_me_record.field ".$referMeField."
									AND refer_me_record.job_type ".$referMeJobType."
									AND refer_me_record.service_record_id = service_records.service_record_id) 
									GROUP BY mentee_id";

	}elseif ($serviceFilter === "Event") {
		$eventId = ifNoInput($_POST['eventId']);
		$sql = $queryClause."mentee_id IN (SELECT mentee_id FROM event_attend_record 
									WHERE event_id ".$eventId."
									AND attendee_type = 1) 
									GROUP BY mentee_id";

	}elseif ($serviceFilter === "Pre-Talk") {
		$preTalkSource = $_POST['preTalkSource'];
		$preTalkDate = $_POST['preTalkDate'];
		$preTalkMentorId = ifNoInput($_POST['preTalkMentorId']);
		$preTalkcloseStatus = ifNoInput($_POST['preTalkcloseStatus']);
		$sql = $queryClause."mentee_id IN (SELECT mentee_id FROM pre_talk
									WHERE source LIKE '%$preTalkSource%'
									AND date LIKE '%$preTalkDate%'
									AND mentor_id ".$preTalkMentorId."
									AND close_status ".$preTalkcloseStatus.") 
									GROUP BY mentee_id";

	}elseif ($serviceFilter === "Offer Tracking") {
		$offerTrackingSource = $_POST['offerTrackingSource'];
		$offerTrackingJobType = ifNoInput($_POST['offerTrackingJobType']);
		$offerTrackingPosition = $_POST['offerTrackingPosition'];
		$offerTrackingCompany = $_POST['offerTrackingCompany'];
		$offerTrackingStatus = ifNoInput($_POST['offerTrackingStatus']);
		if ($offerTrackingSource === "referral") {
			$sql = $queryClause."mentee_id IN (SELECT internal_referral_record.mentee_id FROM internal_referral_record INNER JOIN internal_referral_summary
									ON internal_referral_record.internal_referral_id = internal_referral_summary.internal_referral_id
									AND internal_referral_record.candidate_type = 1
									AND internal_referral_summary.position LIKE '%$offerTrackingPosition%'
									AND internal_referral_summary.company LIKE '%$offerTrackingCompany%'
									AND internal_referral_summary.type ".$offerTrackingJobType."
									AND internal_referral_record.current_status ".$offerTrackingStatus.") 
									GROUP BY mentee_id";

		}elseif ($offerTrackingSource === "other") {
			$sql = $queryClause."mentee_id IN (SELECT mentee_id FROM other_offer_tracking_record
									WHERE company LIKE '%$offerTrackingCompany%'
									AND position LIKE '%$offerTrackingPosition%'
									AND type ".$offerTrackingJobType.") 
									GROUP BY mentee_id";
		}
		
	}

	return $sql;

}


if ($basicInfoType === "First Name") {
	$keyWord = $_POST['keyWord'];
	$sql = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration FROM mentees_basic WHERE firstname LIKE '%$keyWord%' GROUP BY mentee_id;";
	echo $sql;
}elseif ($basicInfoType === "Last Name") {
	$keyWord = $_POST['keyWord'];
	$sql = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration FROM mentees_basic WHERE lastname LIKE '%$keyWord%' GROUP BY mentee_id;";
	echo $sql;
}elseif ($basicInfoType === "Wechat ID") {
	$keyWord = $_POST['keyWord'];
	$sql = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration
			FROM mentees_basic 
			WHERE wechat LIKE '%$keyWord%' 
			GROUP BY mentee_id";

}elseif ($basicInfoType === "Email") {
	$keyWord = $_POST['keyWord'];
	$sql = "SELECT mentee_id, firstname, lastname, school, first_concentration, second_concentration
			FROM mentees_basic 
			WHERE email LIKE '%$keyWord%' 
			GROUP BY mentee_id";
}else{
	$sql = customQueryClause($basicInfoType);
}


if ($result = mysqli_query($con, $sql)){

    while($row = $result->fetch_assoc()){
        $menteeBasicInfo = $row;
        array_push($menteeBasicInfoList, $menteeBasicInfo);
    }
    
}else{
    die('Error1: ' . mysqli_error($con));
}


echo json_encode($menteeBasicInfoList);


// Close connections
mysqli_close($con);


?>