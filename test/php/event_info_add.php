<?php

require 'configure.php';

$con = connectToDatabase();

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

$sql_basic = "INSERT INTO event_summary (type, location, date, time, topic, ticket_price, number_of_mentors, number_of_attendees, employee_leader, notes) VALUES ('$type', '$location', '$date', '$time', '$topic', '$ticket_price', '$number_of_mentors', '$number_of_attendees', '$employee_leader', '$notes')";

if (mysqli_query($con, $sql_basic)) {

	$last_id = mysqli_insert_id($con);
	echo "Information inserted successfully!";
} else {
	die('Error: ' . mysqli_error($con));
}

mysqli_close($con);



?>