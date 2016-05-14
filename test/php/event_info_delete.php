<?php

require 'configure.php';

$con = connectToDatabase();

//Get the username and password from POST methed
$event_id = $_POST['event_id'];

// This SQL statement selects ALL from the table 'Locations'
$sql = "DELETE FROM event_summary WHERE event_id=$event_id";

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