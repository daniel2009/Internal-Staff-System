<?php

require 'configure.php';

$con = connectToDatabase();


$key_word = $_POST['key_word'];
$classification = $_POST['classification'];
$sql;
$eventIdList = array();
$resultArray = array();

if ($classification == " Default") {
    
    $sql = "SELECT event_id FROM event_summary WHERE type LIKE '%$key_word%' OR location LIKE '%$key_word%' OR date LIKE '%$key_word%' OR time LIKE '%$key_word%' OR topic LIKE '%$key_word%' OR ticket_price LIKE '%$key_word%' OR employee_leader LIKE '%$key_word%'";

    if ($result = mysqli_query($con, $sql)) {
        while($row = $result->fetch_assoc()) {
            $event_Id = $row;
            array_push($eventIdList, $event_Id['event_id']);
        }
        
    } else {
        die('Error1: ' . mysqli_error($con));
    }


} else {

    if ($classification == ">> Campus Talk") {

        $sql = "SELECT event_id FROM event_summary WHERE type = 'Campus Talk' AND (location LIKE '%$key_word%' OR date LIKE '%$key_word%' OR time LIKE '%$key_word%' OR topic LIKE '%$key_word%' OR ticket_price LIKE '%$key_word%' OR employee_leader LIKE '%$key_word%')";

    }elseif ($classification == ">> Boot Camp") {

        $sql = "SELECT event_id FROM event_summary WHERE type = 'Boot Camp' AND (location LIKE '%$key_word%' OR date LIKE '%$key_word%' OR time LIKE '%$key_word%' OR topic LIKE '%$key_word%' OR ticket_price LIKE '%$key_word%' OR employee_leader LIKE '%$key_word%')";

    }elseif ($classification == ">> Dine With Me") {

        $sql = "SELECT event_id FROM event_summary WHERE type = 'Dine With Me' AND (location LIKE '%$key_word%' OR date LIKE '%$key_word%' OR time LIKE '%$key_word%' OR topic LIKE '%$key_word%' OR ticket_price LIKE '%$key_word%' OR employee_leader LIKE '%$key_word%')";

    }elseif ($classification == ">> Workshop") {

        $sql = "SELECT event_id FROM event_summary WHERE type = 'Workshop' AND (location LIKE '%$key_word%' OR date LIKE '%$key_word%' OR time LIKE '%$key_word%' OR topic LIKE '%$key_word%' OR ticket_price LIKE '%$key_word%' OR employee_leader LIKE '%$key_word%')";

    }elseif ($classification == ">> Other") {

        $sql = "SELECT event_id FROM event_summary WHERE type = 'Other' AND (location LIKE '%$key_word%' OR date LIKE '%$key_word%' OR time LIKE '%$key_word%' OR topic LIKE '%$key_word%' OR ticket_price LIKE '%$key_word%' OR employee_leader LIKE '%$key_word%')";

    } elseif ($classification == " Date") {

    	$sql = "SELECT event_id FROM event_summary WHERE date LIKE '%$key_word%'";
    	# code...
    } else {
        echo "bad search";
        exit();
    }

    if ($result = mysqli_query($con, $sql)) {
        while($row = $result->fetch_assoc())
        {
            $event_Id = $row;
            array_push($eventIdList, $event_Id['event_id']);
        }
        
    }else{
        die('Error1: ' . mysqli_error($con));
    }
    
}



//echo json_encode($mentorIdList);
$eventIdList = array_unique($eventIdList);
$eventIdList = array_values($eventIdList);

//echo json_encode($mentorIdList);

//$mentorIdList = sort($mentorIdList);
$idListLen = count($eventIdList);

for ($i=0; $i < $idListLen; $i++) {

    $eventInfo = array();
    
    $sql_basic = "SELECT * FROM event_summary WHERE event_id =". $eventIdList[$i];
    if ($result = mysqli_query($con, $sql_basic)) {

        $basicInfo = array();
        if ($row = $result->fetch_assoc()) {
            $basicInfo = $row;
            array_push($eventInfo, $basicInfo);
        }

    } else {
        die('Error2: ' . mysqli_error($con));
    }
    
    
    array_push($resultArray, $eventInfo);

}


echo json_encode($resultArray);


// Close connections
mysqli_close($con);
?>