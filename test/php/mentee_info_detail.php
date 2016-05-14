<?php

require 'configure.php';

$con = connectToDatabase();

$menteeId = $_POST['menteeId'];

$menteeInfoList = array();

/***************Basic Info**********************/
$sql_basic = "SELECT * FROM mentees_basic WHERE mentee_id = '$menteeId'";

if ($result = mysqli_query($con, $sql_basic)) {

    while ($row = $result->fetch_assoc()) {
        $basicInfo = $row;
        $menteeInfoList['basicInfo'] = $basicInfo;
    }

}else {
    die('Error_basic: ' . mysqli_error($con));
}

/***************Pre Talk***********************/
/*
$sql_pre_talk  =  "SELECT pre_talk.mentee_id, pre_talk.source, pre_talk.date, pre_talk.time, pre_talk.close_status, pre_talk.close_note, pre_talk.recommend_service, pre_talk.three_days_follow, pre_talk.final_close_status, mentors_basic.mentor_id, mentors_basic.lastname AS mentor_lastname, mentors_basic.firstname AS mentor_firstname
                    FROM pre_talk INNER JOIN mentors_basic 
                    ON pre_talk.mentee_id = '$menteeId' AND pre_talk.mentor_id = mentors_basic.mentor_id";
*/
$sql_pre_talk = "SELECT * FROM pre_talk WHERE mentee_id = '$menteeId'";

if ($result = mysqli_query($con, $sql_pre_talk)) {

    while ($row = $result->fetch_assoc()) {
        $preTalkInfo = $row;
        if ($preTalkInfo['mentor_id'] !== "" && $preTalkInfo['mentor_id'] !== null) {
            $sql_pt_mt = "SELECT lastname AS mentor_lastname, firstname AS mentor_firstname FROM mentors_basic WHERE mentor_id =".$preTalkInfo['mentor_id'];
            if ($resPtMt = mysqli_query($con, $sql_pt_mt)) {
                while ($ptMt = $resPtMt->fetch_assoc()) {
                    $preTalkInfo = array_merge($preTalkInfo, $ptMt);
                }
            }else{
                die('Error_PtMt: ' . mysqli_error($con));
            }
        }
    }
    $menteeInfoList['preTalkInfo'] = $preTalkInfo;
}else {
    die('Error_pre_talk: ' . mysqli_error($con));
}

/***************Service Purchased*********************/
$sql_service_record = "SELECT * FROM service_records WHERE mentee_id = '$menteeId'";
//All services this mentee purchased
if ($result = mysqli_query($con, $sql_service_record)) {
	$serviceRecordList = array();
	$profileBuilderList = array();
	$mockInterviewList = array();
	$vipServiceList = array();
	$referMeList = array();
	$eventList = array();
	$uniMembership = array();
	$uniAcademyList = array();
	$personalMentorList = array();

    while ($row = $result->fetch_assoc()) {
        $serviceRecordInfo = $row;
        //if the service is Profile Builder
        
        if ($serviceRecordInfo['service_type'] === "Profile Builder") {
            /*
        	$sql_profile_builder = "SELECT profile_builder_record.record_id, profile_builder_record.service_record_id, profile_builder_record.start_date, profile_builder_record.first_revision_date, profile_builder_record.second_revision_date, profile_builder_record.third_revision_date, profile_builder_record.offer, profile_builder_record.note, mentors_basic.mentor_id, mentors_basic.lastname AS mentor_lastname, mentors_basic.firstname AS mentor_firstname
                                    FROM profile_builder_record INNER JOIN mentors_basic
                                    ON profile_builder_record.mentor_id = mentors_basic.mentor_id
                                    AND profile_builder_record.service_record_id =".$serviceRecordInfo['service_record_id'];
            */
            $sql_profile_builder = "SELECT * FROM profile_builder_record WHERE service_record_id =".$serviceRecordInfo['service_record_id'];

        	if ($resultPB = mysqli_query($con, $sql_profile_builder)) {
        		while ($profileBuilder = $resultPB->fetch_assoc()) {
        			$serviceRecordInfo = array_merge($profileBuilder, $serviceRecordInfo);
                    if ($serviceRecordInfo['mentor_id'] !== "" && $serviceRecordInfo['mentor_id'] !== null) {
                        $sql_pb_mt = "SELECT lastname AS mentor_lastname, firstname AS mentor_firstname FROM mentors_basic WHERE mentor_id =".$serviceRecordInfo['mentor_id'];
                        if ($resPbMt = mysqli_query($con, $sql_pb_mt)) {
                            while ($pbMt = $resPbMt->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $pbMt);
                            }
                        }else{
                            die('Error_PbMt: ' . mysqli_error($con));
                        }
                    }
        			array_push($profileBuilderList, $serviceRecordInfo);
        		}
        		
        	}else {
			    die('Error_PB: ' . mysqli_error($con));
			}

		//if the service is Mock Interview
        }elseif ($serviceRecordInfo['service_type'] === "Mock Interview") {
            /*
        	$sql_mock_interview = "SELECT mock_interview_record.record_id, mock_interview_record.service_record_id, mock_interview_record.interview_company, mock_interview_record.interview_position, mock_interview_record.interview_date, mock_interview_record.mock_date, mock_interview_record.result, mentors_basic.mentor_id, mentors_basic.lastname AS mentor_lastname, mentors_basic.firstname AS mentor_firstname
                                    FROM mock_interview_record INNER JOIN mentors_basic
                                    ON mock_interview_record.mentor_id = mentors_basic.mentor_id
                                    AND mock_interview_record.service_record_id =".$serviceRecordInfo['service_record_id'];
            */
            $sql_mock_interview = "SELECT * FROM mock_interview_record WHERE service_record_id =".$serviceRecordInfo['service_record_id'];
        	if ($resultMI = mysqli_query($con, $sql_mock_interview)) {
        		while ($mockInterview = $resultMI->fetch_assoc()) {
        			$serviceRecordInfo = array_merge($mockInterview, $serviceRecordInfo);
                    if ($serviceRecordInfo['mentor_id'] !== "" && $serviceRecordInfo['mentor_id'] !== null) {
                        $sql_mi_mt = "SELECT lastname AS mentor_lastname, firstname AS mentor_firstname FROM mentors_basic WHERE mentor_id =".$serviceRecordInfo['mentor_id'];
                        if ($resMiMt = mysqli_query($con, $sql_mi_mt)) {
                            while ($miMt = $resMiMt->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $miMt);
                            }
                        }else{
                            die('Error_miMt: ' . mysqli_error($con));
                        }
                    }
        			array_push($mockInterviewList, $serviceRecordInfo);
        		}
        		
        	}else {
			    die('Error_MI: ' . mysqli_error($con));
			}

        //if the service is VIP Service
        }elseif ($serviceRecordInfo['service_type'] === "VIP Service") {
        	$sql_vip_service = "SELECT * FROM vip_service_record WHERE service_record_id =".$serviceRecordInfo['service_record_id'];
        	if ($resultVS = mysqli_query($con, $sql_vip_service)) {
        		while ($vipService = $resultVS->fetch_assoc()) {
        			$serviceRecordInfo = array_merge($vipService, $serviceRecordInfo);

                    //Query the lead mentor name from mentors_basic
                    if($serviceRecordInfo['lead_mentor_id'] !== "" && $serviceRecordInfo['lead_mentor_id'] !== null){
                        $sql_vs_lead_mentor = "SELECT firstname AS lm_firstname, lastname AS lm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['lead_mentor_id'];
                        if ($resVsLm = mysqli_query($con, $sql_vs_lead_mentor)) {
                            while ($vsLm = $resVsLm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsLm);
                            }
                        }else{
                            die('Error_VsLm: ' . mysqli_error($con));
                        }
                    }
                    //Query the changed Mentor name
                    if($serviceRecordInfo['changed_to_mentor_id'] !== "" && $serviceRecordInfo['changed_to_mentor_id'] !== null){
                        $sql_vs_change_mentor = "SELECT firstname AS cm_firstname, lastname AS cm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['changed_to_mentor_id'];
                        if ($resVsCm = mysqli_query($con, $sql_vs_change_mentor)) {
                            while ($vsCm = $resVsCm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsCm);
                            }
                        }else{
                            die('Error_VsCm: ' . mysqli_error($con));
                        }
                    }
                    //Query the first mentor name
                    if($serviceRecordInfo['first_mentor_id'] !== "" && $serviceRecordInfo['first_mentor_id'] !== null){
                        $sql_vs_first_mentor = "SELECT firstname AS fm_firstname, lastname AS fm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['first_mentor_id'];
                        if ($resVsFm = mysqli_query($con, $sql_vs_first_mentor)) {
                            while ($vsFm = $resVsFm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsFm);
                            }
                        }else{
                            die('Error_VsFm: ' . mysqli_error($con));
                        }
                    }
                    //Query the Second Mentor name
                    if($serviceRecordInfo['second_mentor_id'] !== "" && $serviceRecordInfo['second_mentor_id'] !== null){
                        $sql_vs_second_mentor = "SELECT firstname AS sm_firstname, lastname AS sm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['second_mentor_id'];
                        if ($resVsSm = mysqli_query($con, $sql_vs_second_mentor)) {
                            while ($vsSm = $resVsSm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsSm);
                            }
                        }else{
                            die('Error_VsSm: ' . mysqli_error($con));
                        }
                    }
                    //Query the third mentor name
                    if($serviceRecordInfo['third_mentor_id'] !== "" && $serviceRecordInfo['third_mentor_id'] !== null){
                        $sql_vs_third_mentor = "SELECT firstname AS tm_firstname, lastname AS tm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['third_mentor_id'];
                        if ($resVsTm = mysqli_query($con, $sql_vs_third_mentor)) {
                            while ($vsTm = $resVsTm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsTm);
                            }
                        }else{
                            die('Error_VsTm: ' . mysqli_error($con));
                        }
                    }
                    //Query the Assist Mentor 1
                    if($serviceRecordInfo['assist_mentor_1'] !== "" && $serviceRecordInfo['assist_mentor_1'] !== null){
                        $sql_vs_assist_mentor_1 = "SELECT firstname AS af_firstname, lastname AS af_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['assist_mentor_1'];
                        if ($resVsAf = mysqli_query($con, $sql_vs_assist_mentor_1)) {
                            while ($vsAf = $resVsAf->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsAf);
                            }
                        }else{
                            die('Error_VsAf: ' . mysqli_error($con));
                        }
                    }
                    //Query the Assist Mentor 2
                    if($serviceRecordInfo['assist_mentor_2'] !== "" && $serviceRecordInfo['assist_mentor_2'] !== null){
                        $sql_vs_assist_mentor_2 = "SELECT firstname AS as_firstname, lastname AS as_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['assist_mentor_2'];
                        if ($resVsAs = mysqli_query($con, $sql_vs_assist_mentor_2)) {
                            while ($vsAs = $resVsAs->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsAs);
                            }
                        }else{
                            die('Error_VsAs: ' . mysqli_error($con));
                        }
                    }
                    //Query the Assist mentor 3
                    if($serviceRecordInfo['assist_mentor_3'] !== "" && $serviceRecordInfo['assist_mentor_3'] !== null){
                        $sql_vs_assist_mentor_3 = "SELECT firstname AS at_firstname, lastname AS at_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['assist_mentor_3'];
                        if ($resVsAt = mysqli_query($con, $sql_vs_assist_mentor_3)) {
                            while ($vsAt = $resVsAt->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsAt);
                            }
                        }else{
                            die('Error_VsAt: ' . mysqli_error($con));
                        }
                    }
                    //Query the free boot camp
                    if($serviceRecordInfo['free_boot_camp_id'] !== "" && $serviceRecordInfo['free_boot_camp_id'] !== null){
                        $sql_vs_free_boot_camp = "SELECT type AS ev_type, location AS ev_location, date AS ev_date 
                                                FROM event_summary
                                                WHERE event_id =".$serviceRecordInfo['free_boot_camp_id'];
                        if ($resVsEv = mysqli_query($con, $sql_vs_free_boot_camp)) {
                            while ($vsEv = $resVsEv->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $vsEv);
                            }
                        }else{
                            die('Error_VsEv: ' . mysqli_error($con));
                        }
                    }

        			array_push($vipServiceList, $serviceRecordInfo);
        		}
        		
        	}else {
			    die('Error_VS: ' . mysqli_error($con));
			}

        //if the service is Refer Me
        }elseif ($serviceRecordInfo['service_type'] === "Refer Me") {
        	$sql_refer_me = "SELECT * FROM refer_me_record WHERE service_record_id =".$serviceRecordInfo['service_record_id'];
        	if ($resultRM = mysqli_query($con, $sql_refer_me)) {
        		while ($referMe = $resultRM->fetch_assoc()) {
        			$serviceRecordInfo = array_merge($referMe, $serviceRecordInfo);

                    //Query the lead mentor
                    if($serviceRecordInfo['lead_mentor_id'] !== "" && $serviceRecordInfo['lead_mentor_id'] !== null){
                        $sql_rm_lead_mentor = "SELECT firstname AS lm_firstname, lastname AS lm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['lead_mentor_id'];
                        if ($resRmLm = mysqli_query($con, $sql_rm_lead_mentor)) {
                            while ($rmLm = $resRmLm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $rmLm);
                            }
                        }else{
                            die('Error_RmLm: ' . mysqli_error($con));
                        }
                    }
                    //Query the mock mentor
                    if($serviceRecordInfo['mock_mentor_id'] !== "" && $serviceRecordInfo['mock_mentor_id'] !== null){
                        $sql_rm_mock_mentor = "SELECT firstname AS mm_firstname, lastname AS mm_lastname 
                                                FROM mentors_basic
                                                WHERE mentor_id =".$serviceRecordInfo['mock_mentor_id'];
                        if ($resRmMm = mysqli_query($con, $sql_rm_mock_mentor)) {
                            while ($rmMm = $resRmMm->fetch_assoc()) {
                                $serviceRecordInfo = array_merge($serviceRecordInfo, $rmMm);
                            }
                        }else{
                            die('Error_RmMm: ' . mysqli_error($con));
                        }
                    }

        			array_push($referMeList, $serviceRecordInfo);
        		}
        		
        	}else {
			    die('Error_RM: ' . mysqli_error($con));
			}

        //if the service is Event
        }elseif ($serviceRecordInfo['service_type'] === "Event") {
        	$sql_event = "SELECT event_attend_record.record_id, event_attend_record.event_id, event_attend_record.service_record_id, event_attend_record.mentee_id, event_summary.type, event_summary.location, event_summary.date
                            FROM event_attend_record INNER JOIN event_summary
                            ON event_summary.event_id = event_attend_record.event_id
                            AND event_attend_record.service_record_id =".$serviceRecordInfo['service_record_id'];
        	if ($resultEvent = mysqli_query($con, $sql_event)) {
        		while ($event = $resultEvent->fetch_assoc()) {
        			$serviceRecordInfo = array_merge($event, $serviceRecordInfo);
        			array_push($eventList, $serviceRecordInfo);
        		}
        		
        	}else {
			    die('Error_Event: ' . mysqli_error($con));
			}
		//if the service is UniMembership
        }elseif ($serviceRecordInfo['service_type'] === "UniMembership") {
        	array_push($uniMembership, $serviceRecordInfo);

        //if the service is UniAcademy
        }elseif ($serviceRecordInfo['service_type'] === "UniAcademy") {
        	array_push($uniAcademyList, $serviceRecordInfo);

        //if the service is Personal Mentor
        }elseif ($serviceRecordInfo['service_type'] === "Personal Mentor") {
        	array_push($personalMentorList, $serviceRecordInfo);
        }
    }
    $serviceRecordList['profileBuilderList'] = $profileBuilderList;
    $serviceRecordList['mockInterviewList'] = $mockInterviewList;
    $serviceRecordList['vipServiceList'] = $vipServiceList;
    $serviceRecordList['referMeList'] = $referMeList;
    $serviceRecordList['eventList'] = $eventList;
    $serviceRecordList['uniMembership'] = $uniMembership;
    $serviceRecordList['uniAcademyList'] = $uniAcademyList;
    $serviceRecordList['personalMentorList'] = $personalMentorList;
    $menteeInfoList['serviceRecordList'] = $serviceRecordList;
}else {
    die('Error_service: ' . mysqli_error($con));
}

/*****************Internal Referral Tracking***********************/
$sql_internal_referral = "SELECT internal_referral_record.record_id, internal_referral_record.internal_referral_id, internal_referral_record.refer_date, internal_referral_record.current_status, internal_referral_record.interview_date, internal_referral_record.hired_date, internal_referral_summary.company, internal_referral_summary.position, internal_referral_summary.location, internal_referral_summary.type
						FROM internal_referral_record INNER JOIN internal_referral_summary 
						ON internal_referral_record.internal_referral_id = internal_referral_summary.internal_referral_id 
						AND internal_referral_record.candidate_type = 1 AND internal_referral_record.mentee_id = '$menteeId'";

if ($result = mysqli_query($con, $sql_internal_referral)) {
	$internalReferralList = array();
	while ($row = $result->fetch_assoc()) {
        $internalReferral = $row;
        array_push($internalReferralList, $internalReferral);
    }
    $menteeInfoList['internalReferralList'] = $internalReferralList;
}else {
    die('Error_referral: ' . mysqli_error($con));
}

/****************Other Offer Tracking*****************************/
$sql_other_offer = "SELECT * FROM other_offer_tracking_record WHERE mentee_id = '$menteeId'";

if ($result = mysqli_query($con, $sql_other_offer)) {
	$otherOfferList = array();
	while ($row = $result->fetch_assoc()) {
        $otherOffer = $row;
        array_push($otherOfferList, $otherOffer);
    }
    $menteeInfoList['otherOfferList'] = $otherOfferList;
}else {
    die('Error_otherOffer: ' . mysqli_error($con));
}

/*******************Session Tracking******************************/
$sql_session_tracking = "SELECT session_tracking.record_id, session_tracking.mentee_id, session_tracking.session_number, session_tracking.date, session_tracking.topic, session_tracking.assignment, session_tracking.note, mentors_basic.mentor_id, mentors_basic.lastname AS mentor_lastname, mentors_basic.firstname AS mentor_firstname
                        FROM session_tracking INNER JOIN mentors_basic
                        ON session_tracking.mentor_id = mentors_basic.mentor_id
                        AND session_tracking.mentee_id = '$menteeId'";

if ($result = mysqli_query($con, $sql_session_tracking)) {
	$sessionTrackingList = array();
	while ($row = $result->fetch_assoc()) {
        $sessionTracking = $row;
        array_push($sessionTrackingList, $sessionTracking);
    }
    $menteeInfoList['sessionTrackingList'] = $sessionTrackingList;
}else {
    die('Error_Session: ' . mysqli_error($con));
}

/*********************UniCareer Credit*************************/
$sql_credit = "SELECT * FROM unicareer_credit WHERE mentee_id = '$menteeId'";

if ($result = mysqli_query($con, $sql_credit)) {
	$creditList = array();
	while ($row = $result->fetch_assoc()) {
        $credit = $row;
        array_push($creditList, $credit);
    }
    $menteeInfoList['creditList'] = $creditList;
}else {
    die('Error_credit: ' . mysqli_error($con));
}

echo json_encode($menteeInfoList);

// Close connections
mysqli_close($con);

?>




