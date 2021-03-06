<?php

require 'configure.php';

$con = connectToDatabase();

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends

$row_set = array();
$sql = "SELECT event_id, type, location, date FROM event_summary WHERE type LIKE '%$term%' OR location LIKE '%$term%' OR date LIKE '%$term%'";

if ($result = mysqli_query($con, $sql))
{
    while ($row = $result->fetch_assoc()) {
        $row['value']=htmlentities(stripslashes($row['event_id'].": ".$row['type']." ".$row['location']." ".$row['date']));
        $row['id']=(int)$row['event_id'];
		$row_set[] = $row;//build an array
    }

}else{
    die('Error: ' . mysqli_error($con));
}


echo json_encode($row_set);


// Close connections
mysqli_close($con);

?>