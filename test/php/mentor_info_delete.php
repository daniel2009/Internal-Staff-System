<?php

require 'configure.php';

$con = connectToDatabase();

//Get the username and password from POST methed
$mentorId = $_POST['mentor_id'];

// This SQL statement selects ALL from the table 'Locations'
$sql = "DELETE FROM mentors_basic WHERE mentor_id=$mentorId";

// Check if there are results

if (mysqli_query($con, $sql))
{
    echo "Record deleted successfully!";
    
}else{
	die('Error: ' . mysqli_error($con));
}

// Close connections
mysqli_close($con);


?>