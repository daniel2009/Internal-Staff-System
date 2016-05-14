<?php

require 'configure.php';

$con = connectToDatabase();

$preTalkMenteeId = $_POST['preTalkMenteeId'];
$preTalkSource = $_POST['preTalkSource'];
$preTalkDate = $_POST['preTalkDate'];
$preTalkTime = $_POST['preTalkTime'];
$preTalkMentorId = $_POST['preTalkMentorId'];
$preTalkCloseStatus = $_POST['preTalkCloseStatus'];
$preTalkCloseNotes = $_POST['preTalkCloseNotes'];
$preTalkRecommendService = $_POST['preTalkRecommendService'];
$preTalk3DaysFollow = $_POST['preTalk3DaysFollow'];
$preTalkFinalCloseStatus = $_POST['preTalkFinalCloseStatus'];


$sql = "INSERT INTO pre_talk (mentee_id, source, date, time, mentor_id, close_status, close_note, recommend_service, three_days_follow, final_close_status) VALUES ('$preTalkMenteeId','$preTalkSource','$preTalkDate', '$preTalkTime', '$preTalkMentorId', '$preTalkCloseStatus', '$preTalkCloseNotes', '$preTalkRecommendService', '$preTalk3DaysFollow', '$preTalkFinalCloseStatus')";

if (mysqli_query($con, $sql)){

    echo"Information inserted successfully!";

}else{
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

?>