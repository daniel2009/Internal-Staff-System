<?php

require 'configure.php';

$con = connectToDatabase();

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends

$row_set = array();
$sql = "SELECT mentor_id, firstname, lastname FROM mentors_basic WHERE firstname LIKE '%$term%' OR lastname LIKE '%$term%'";

if ($result = mysqli_query($con, $sql))
{
    while ($row = $result->fetch_assoc()) {
        $row['value']=htmlentities(stripslashes($row['mentor_id'].": ".$row['firstname']." ".$row['lastname']));
        $row['id']=(int)$row['mentor_id'];
		$row_set[] = $row;//build an array
    }

}else{
    die('Error: ' . mysqli_error($con));
}


echo json_encode($row_set);


// Close connections
mysqli_close($con);

?>