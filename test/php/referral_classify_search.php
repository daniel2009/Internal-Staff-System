<?php

require 'configure.php';

$con = connectToDatabase();


$key_word = $_POST['key_word'];
$classification = $_POST['classification'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$filterDate = $_POST['filterDate'];
$sql;
$internalReferralIdList = array();
$resultArray = array();

if ($classification == "Default") {
    
    $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE company LIKE '%$key_word%' OR position LIKE '%$key_word%' OR location LIKE '%$key_word%'";

    if ($result = mysqli_query($con, $sql)) {
        while($row = $result->fetch_assoc()) {
            $internal_referral_Id = $row;
            array_push($internalReferralIdList, $internal_referral_Id['internal_referral_id']);
        }
        
    } else {
        die('Error1: ' . mysqli_error($con));
    }


} else {

    if ($classification == "Company") {

        $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE company LIKE '%$key_word%'";

    }elseif ($classification == "Position") {

        $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE position LIKE '%$key_word%'";

    }elseif ($classification == "Location") {

        $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE location LIKE '%$key_word%'";

    }elseif ($classification == ">>Fulltime") {

        $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE type = 1";

    }elseif ($classification == ">>Intern") {

        $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE type = 0";

    }elseif ($classification == "Submission Date") {
        
    	$sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE submission_date BETWEEN '$startDate' AND '$endDate'";
    	# code...
    } elseif ($classification == "Expire After") {
        $sql = "SELECT internal_referral_id FROM internal_referral_summary WHERE expire_date >= '$filterDate'";
    } else {
        echo "bad search";
        exit();
    }

    if ($result = mysqli_query($con, $sql)) {
        while($row = $result->fetch_assoc())
        {
            $internal_referral_Id = $row;
            array_push($internalReferralIdList, $internal_referral_Id['internal_referral_id']);
        }
        
    }else{
        die('Error1: ' . mysqli_error($con));
    }
    
}



//echo json_encode($mentorIdList);
$internalReferralIdList = array_unique($internalReferralIdList);
$internalReferralIdList = array_values($internalReferralIdList);

//echo json_encode($mentorIdList);

//$mentorIdList = sort($mentorIdList);
$idListLen = count($internalReferralIdList);

for ($i=0; $i < $idListLen; $i++) {

    $internalReferralInfo = array();
    
    $sql_basic = "SELECT * FROM internal_referral_summary WHERE internal_referral_id =". $internalReferralIdList[$i];
    if ($result = mysqli_query($con, $sql_basic)) {

        $basicInfo = array();
        if ($row = $result->fetch_assoc()) {
            $basicInfo = $row;
            array_push($internalReferralInfo, $basicInfo);
        }

    } else {
        die('Error2: ' . mysqli_error($con));
    }
    
    
    array_push($resultArray, $internalReferralInfo);

}


echo json_encode($resultArray);


// Close connections
mysqli_close($con);
?>