<?php

require 'configure.php';

$con = connectToDatabase();

$event_id = $_POST['event_id'];
$type = $_POST['type'];
$location = $_POST['location'];
$date = $_POST['date'];
$time = $_POST['time'];
$topic = $_POST['topic'];
$ticket_price = $_POST['ticket_price'];
$number_of_mentors = $_POST['number_of_mentors'];
$number_of_attendees = $_POST['number_of_attendees'];
$employee_leader = $_POST['employee_leader'];
$notes = $_POST['notes'];

//echo $firstname.$lastname.$company.$title.$email.$phone.$wechat.$education.$location.$checkedValue.$linkedin.$evaluation.$note.$bio_note;



$sql_basic = "UPDATE event_summary SET type='$type', location='$location', date='$date', time='$time', topic='$topic', ticket_price='$ticket_price', number_of_mentors='$number_of_mentors', number_of_attendees='$number_of_attendees', employee_leader='$employee_leader', notes='$notes' WHERE event_id=$event_id";

if (mysqli_query($con, $sql_basic)) {
    echo"Information updated successfully!";
}else{
    die('Error-basic: ' . mysqli_error($con));
}

// Close connections
mysqli_close($con);

?>