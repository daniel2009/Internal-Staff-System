<?php

require 'configure.php';

$con = connectToDatabase();

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends

$row_set = array();
$sql = "SELECT internal_referral_id, company, position, location, type FROM internal_referral_summary WHERE internal_referral_id LIKE '%$term%' OR company LIKE '%$term%' OR position LIKE '%$term%' OR location LIKE '%$term%'";

if ($result = mysqli_query($con, $sql))
{
    while ($row = $result->fetch_assoc()) {
    	if ($row['type'] == 1) {
    		$row['value']=htmlentities(stripslashes($row['internal_referral_id'].": ".$row['company']."---".$row['position']."---".$row['location']." fulltime"));
    	}else{
    		$row['value']=htmlentities(stripslashes($row['internal_referral_id'].": ".$row['company']."---".$row['position']."---".$row['location']." intern"));
    	}
        $row['id']=(int)$row['internal_referral_id'];
		$row_set[] = $row;//build an array
    }

}else{
    die('Error: ' . mysqli_error($con));
}


echo json_encode($row_set);


// Close connections
mysqli_close($con);

?>