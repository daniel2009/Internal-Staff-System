<?php

require 'configure.php';

$con = connectToDatabase();

$event_id = $_POST['event_id'];
$attendee_type = $_POST['attendee_type'];
$mentor_id = $_POST['mentor_id'];

$sql_basic = "INSERT INTO event_attend_record (event_id, attendee_type, mentor_id) VALUES ('$event_id', '$attendee_type', '$mentor_id')";

if (mysqli_query($con, $sql_basic)) {

	$last_id = mysqli_insert_id($con);
	echo "Information inserted successfully!";
} else {
	die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

?>