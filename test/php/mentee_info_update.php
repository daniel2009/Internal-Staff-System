<?php

require 'configure.php';

$con = connectToDatabase();

$menteeId 		= $_POST['menteeId'];
$contentType 	= $_POST['contentType'];

if ($contentType === "bi") {
	$firstName 		= $_POST['firstName'];
	$lastName 		= $_POST['lastName'];
	$otherName 		= $_POST['otherName'];
	$location 		= $_POST['location'];
	$firstConcen 	= $_POST['firstConcen'];
	$secondConcen 	= $_POST['secondConcen'];
	$isUniMember 	= $_POST['isUniMember'];
	$school 		= $_POST['school'];
	$degree 		= $_POST['degree'];
	$gradDate 		= $_POST['gradDate'];
	$phone 			= $_POST['phone'];
	$wechat 		= $_POST['wechat'];
	$email 			= $_POST['email'];

	$sql_bi = "UPDATE mentees_basic SET lastname = '$lastName', firstname = '$firstName', othername = '$otherName', location = '$location', email = '$email', phone = '$phone', wechat = '$wechat', school = '$school', degree = '$degree', graduation_date = '$gradDate', first_concentration = '$firstConcen', second_concentration = '$secondConcen', is_unimember = '$isUniMember' WHERE mentee_id = '$menteeId'";

	if (mysqli_query($con, $sql_bi)){

	    echo "Update Successfully!";

	}else{
	    die('Error_BI: ' . mysqli_error($con));
	}

}elseif ($contentType === "pt") {
	$ptMentorId			= ($_POST['ptMentorId'] === "") ? 'null' : "'".$_POST['ptMentorId']."'";
	$ptSource			= $_POST['ptSource'];
	$ptDate				= $_POST['ptDate'];
	$ptTime				= $_POST['ptTime'];
	$ptCloseStatus		= $_POST['ptCloseStatus'];
	$ptCloseNote		= $_POST['ptCloseNote'];
	$ptThreeDays		= $_POST['ptThreeDays'];
	$ptRecommend		= $_POST['ptRecommend'];
	$ptFinalClose		= $_POST['ptFinalClose'];

	$sql_pt = "UPDATE pre_talk SET source = '$ptSource', date = '$ptDate', time = '$ptTime', mentor_id = $ptMentorId, close_status = '$ptCloseStatus', close_note = '$ptCloseNote', recommend_service = '$ptRecommend', three_days_follow = '$ptThreeDays', final_close_status = '$ptFinalClose' WHERE mentee_id = '$menteeId'";

	if (mysqli_query($con, $sql_pt)){

	    echo "Update Successfully!";

	}else{
	    die('Error_PT: ' . mysqli_error($con));
	}

}else{
	$serviceRecordId 	= $_POST['serviceRecordId'];
	$payDate 		 	= $_POST['payDate'];
	$payAmount 			= $_POST['payAmount'];

	$sql_sr = "UPDATE service_records SET payment_date = '$payDate', payment_amount = '$payAmount' WHERE service_record_id = '$serviceRecordId'";
	if (mysqli_query($con, $sql_sr)){
		if ($contentType === "pb") {
			$pbMentorId				= ($_POST['pbMentorId'] === "") ? 'null' : "'".$_POST['pbMentorId']."'";
			$pbStartDate			= $_POST['pbStartDate'];
			$pbFirstRevDate			= $_POST['pbFirstRevDate'];
			$pbSecondRevDate		= $_POST['pbSecondRevDate'];
			$pbThirdRevDate			= $_POST['pbThirdRevDate'];
			$pbOffer				= $_POST['pbOffer'];
			$pbNote					= $_POST['pbNote'];

			$sql_pb = "UPDATE profile_builder_record SET start_date = '$pbStartDate', first_revision_date = '$pbFirstRevDate', second_revision_date = '$pbSecondRevDate', third_revision_date = '$pbThirdRevDate', mentor_id = $pbMentorId, offer = '$pbOffer', note = '$pbNote' WHERE service_record_id = '$serviceRecordId'";

			if (mysqli_query($con, $sql_pb)){

			    echo "Update Successfully!";

			}else{
			    die('Error_PB: ' . mysqli_error($con));
			}

		}elseif ($contentType === "mi") {
			$miMentorId		= ($_POST['miMentorId'] === "") ? 'null' : "'".$_POST['miMentorId']."'";
			$miIvCom		= $_POST['miIvCom'];
			$miIvPos		= $_POST['miIvPos'];
			$miIvDate		= $_POST['miIvDate'];
			$miMockDate		= $_POST['miMockDate'];
			$miResult		= $_POST['miResult'];

			$sql_mi = "UPDATE mock_interview_record SET interview_company = '$miIvCom', interview_position = '$miIvPos', interview_date = '$miIvDate', mentor_id = $miMentorId, mock_date = '$miMockDate', result = '$miResult' WHERE service_record_id = '$serviceRecordId'";

			if (mysqli_query($con, $sql_mi)){

			    echo "Update Successfully!";

			}else{
			    die('Error_MI: ' . mysqli_error($con));
			}

		}elseif ($contentType === "vs") {
			$vsSessionQuantity			= $_POST['vsSessionQuantity'];
			$vsJobLoc1					= $_POST['vsJobLoc1'];
			$vsJobLoc2					= $_POST['vsJobLoc2'];
			$vsMpfTrack1				= $_POST['vsMpfTrack1'];
			$vsMpfTrack2				= $_POST['vsMpfTrack2'];
			$vsMpfBuiltDate				= $_POST['vsMpfBuiltDate'];
			$vsMentorListSentDate		= $_POST['vsMentorListSentDate'];
			$vsLeadMentorPickedDate		= $_POST['vsLeadMentorPickedDate'];
			$vsLeadMentorId				= ($_POST['vsLeadMentorId'] === "") ? 'null' : "'".$_POST['vsLeadMentorId']."'";
			$vsMentorChangeDate			= $_POST['vsMentorChangeDate'];
			$vsMentorChangedToId		= ($_POST['vsMentorChangedToId'] === "") ? 'null' : "'".$_POST['vsMentorChangedToId']."'";
			$vsFirstMentorId			= ($_POST['vsFirstMentorId'] === "") ? 'null' : "'".$_POST['vsFirstMentorId']."'";
			$vsSecondMentorId			= ($_POST['vsSecondMentorId'] === "") ? 'null' : "'".$_POST['vsSecondMentorId']."'";
			$vsThirdMentorId			= ($_POST['vsThirdMentorId'] === "") ? 'null' : "'".$_POST['vsThirdMentorId']."'";
			$vsAssistMentor1			= ($_POST['vsAssistMentor1'] === "") ? 'null' : "'".$_POST['vsAssistMentor1']."'";
			$vsAssistMentor2			= ($_POST['vsAssistMentor2'] === "") ? 'null' : "'".$_POST['vsAssistMentor2']."'";
			$vsAssistMentor3			= ($_POST['vsAssistMentor3'] === "") ? 'null' : "'".$_POST['vsAssistMentor3']."'";
			$vsFreeBootCampId			= ($_POST['vsFreeBootCampId'] === "") ? 'null' : "'".$_POST['vsFreeBootCampId']."'";
			$vsComplete					= $_POST['vsComplete'];

			$sql_vs = "UPDATE vip_service_record SET session_quantity = '$vsSessionQuantity', job_location_1 = '$vsJobLoc1', job_location_2 = '$vsJobLoc2', mpf_track_1 = '$vsMpfTrack1', mpf_track_2 = '$vsMpfTrack2', mpf_built_date = '$vsMpfBuiltDate', mentor_list_sent_date = '$vsMentorListSentDate', lead_mentor_picked_date = '$vsLeadMentorPickedDate', lead_mentor_id = $vsLeadMentorId, mentor_change_date = '$vsMentorChangeDate', changed_to_mentor_id = $vsMentorChangedToId, first_mentor_id = $vsFirstMentorId, second_mentor_id = $vsSecondMentorId, third_mentor_id = $vsThirdMentorId, assist_mentor_1 = $vsAssistMentor1, assist_mentor_2 = $vsAssistMentor2, assist_mentor_3 = $vsAssistMentor3, free_boot_camp_id = $vsFreeBootCampId, complete = '$vsComplete' WHERE service_record_id = '$serviceRecordId'";

			if (mysqli_query($con, $sql_vs)){

			    echo "Update Successfully!";

			}else{
			    die('Error_VS: ' . mysqli_error($con));
			}

		}elseif ($contentType === "rm") {
			$rmJobType			= $_POST['rmJobType'];
			$rmField			= $_POST['rmField'];
			$rmPosition			= $_POST['rmPosition'];
			$rmLeadMentorId		= ($_POST['rmLeadMentorId'] === "") ? 'null' : "'".$_POST['rmLeadMentorId']."'";
			$rmMockMentorId		= ($_POST['rmMockMentorId'] === "") ? 'null' : "'".$_POST['rmMockMentorId']."'";
			$rmFirstIvDate		= $_POST['rmFirstIvDate'];
			$rmFirstIvCom		= $_POST['rmFirstIvCom'];
			$rmFirstIvPosition	= $_POST['rmFirstIvPosition'];
			$rmFirstIvResult	= $_POST['rmFirstIvResult'];
			$rmFirstIvNote		= $_POST['rmFirstIvNote'];
			$rmSecIvDate		= $_POST['rmSecIvDate'];
			$rmSecIvCom			= $_POST['rmSecIvCom'];
			$rmSecIvPosition	= $_POST['rmSecIvPosition'];
			$rmSecIvResult		= $_POST['rmSecIvResult'];
			$rmSecIvNote		= $_POST['rmSecIvNote'];

			$sql_rm = "UPDATE refer_me_record SET job_type = '$rmJobType', field = '$rmField', position = '$rmPosition', lead_mentor_id = $rmLeadMentorId, mock_mentor_id = $rmMockMentorId, first_interview_date = '$rmFirstIvDate', first_interview_company = '$rmFirstIvCom', first_interview_position = '$rmFirstIvPosition', first_interview_result = '$rmFirstIvResult', first_interview_note = '$rmFirstIvNote', second_interview_date = '$rmSecIvDate', second_interview_company = '$rmSecIvCom', second_interview_position = '$rmSecIvPosition', second_interview_result = '$rmSecIvResult', second_interview_note = '$rmSecIvNote' WHERE service_record_id = '$serviceRecordId'";

			if (mysqli_query($con, $sql_rm)){

			    echo "Update Successfully!";

			}else{
			    die('Error_RM: ' . mysqli_error($con));
			}
			
		}elseif ($contentType === "ev") {
			$eventId = ($_POST['eventId'] === "") ? 'null' : "'".$_POST['eventId']."'";

			$sql_ev = "UPDATE event_attend_record SET event_id = $eventId WHERE service_record_id = '$serviceRecordId'";

			if (mysqli_query($con, $sql_ev)){

			    echo "Update Successfully!";

			}else{
			    die('Error_EV: ' . mysqli_error($con));
			}

		}elseif ($contentType === "ir") {
			$irId				= ($_POST['irId'] === "") ? 'null' : "'".$_POST['irId']."'";
			$irRecordId 		= $_POST['irRecordId'];
			$irReferDate		= $_POST['irReferDate'];
			$irCurStatus		= $_POST['irCurStatus'];
			$irivDate			= $_POST['irivDate'];
			$irhrDate			= $_POST['irhrDate'];

			$sql_ir = "UPDATE internal_referral_record SET internal_referral_id = $irid, candidate_type = 1, current_status = '$irCurStatus', refer_date = '$irReferDate', interview_date = '$irivDate', hired_date = '$irhrDate' WHERE record_id = '$irRecordId'";

			if (mysqli_query($con, $sql_ir)){

			    echo "Update Successfully!";

			}else{
			    die('Error_IR: ' . mysqli_error($con));
			}

		}elseif ($contentType === "of") {
			$ofId		= $_POST['ofId'];
			$ofDate		= $_POST['ofDate'];
			$ofType		= $_POST['ofType'];
			$ofLoc		= $_POST['ofLoc'];
			$ofCom		= $_POST['ofCom'];
			$ofPos		= $_POST['ofPos'];

			$sql_of = "UPDATE other_offer_tracking_record SET offer_date = '$ofDate', type = '$ofType', company = '$ofCom', position = '$ofPos', location = '$ofLoc' WHERE offer_id = '$ofId'";

			if (mysqli_query($con, $sql_of)){

			    echo "Update Successfully!";

			}else{
			    die('Error_OF: ' . mysqli_error($con));
			}

		}elseif ($contentType === "st") {
			$stMentorId			= ($_POST['stMentorId'] === "") ? 'null' : "'".$_POST['stMentorId']."'";
			$stRecordId			= $_POST['stRecordId'];
			$stSesNum			= $_POST['stSesNum'];
			$stDate				= $_POST['stDate'];
			$stTopic			= $_POST['stTopic'];
			$stAssignment		= $_POST['stAssignment'];
			$stNote				= $_POST['stNote'];

			$sql_st = "UPDATE session_tracking SET mentor_id = $stMentorId, session_number = '$stSesNum', date = '$stDate', topic = '$stTopic', assignment = '$stAssignment', note = '$stNote' WHERE record_id = '$stRecordId'";

			if (mysqli_query($con, $sql_st)){

			    echo "Update Successfully!";

			}else{
			    die('Error_ST: ' . mysqli_error($con));
			}

		}elseif ($contentType === "uc") {
			$ucRecordId		= $_POST['ucRecordId'];
			$ucIssueDate	= $_POST['ucIssueDate'];
			$ucAmount		= $_POST['ucAmount'];
			$ucUseDate		= $_POST['ucUseDate'];
			$ucReason		= $_POST['ucReason'];
			$ucNote			= $_POST['ucNote'];

			$sql_uc = "UPDATE unicareer_credit SET issue_date = '$ucIssueDate', reason = '$ucReason', amount = '$ucAmount', use_date = '$ucUseDate', note = '$ucNote' WHERE record_id = '$ucRecordId'";

			if (mysqli_query($con, $sql_uc)){

			    echo "Update Successfully!";

			}else{
			    die('Error_UC: ' . mysqli_error($con));
			}

		}elseif ($contentType === "um" || $contentType === "ua" || $contentType === "pm") {
			echo "Update Successfully!";
		}
	}else{
	    die('Error_SR: ' . mysqli_error($con));
	}
}

//close connection
mysqli_close($con);




?>