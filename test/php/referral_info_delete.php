<?php

require 'configure.php';

$con = connectToDatabase();

//Get the username and password from POST methed
$internal_referral_id = $_POST['internal_referral_id'];

// This SQL statement selects ALL from the table 'Locations'
$sql = "DELETE FROM internal_referral_summary WHERE internal_referral_id=$internal_referral_id";

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