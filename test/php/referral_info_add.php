<?php

require 'configure.php';

$con = connectToDatabase();

$company = $_POST['company'];
$position = $_POST['position'];
$location = $_POST['location'];
$create_date = $_POST['create_date'];
$expire_date = $_POST['expire_date'];
$submission_date = $_POST['submission_date'];
$type = $_POST['type'];
$link = $_POST['link'];
$requirement = $_POST['requirement'];
$job_description = $_POST['job_description'];

$sql_basic = "INSERT INTO internal_referral_summary (company, position, create_date, type, location, requirement, job_description, link, expire_date, submission_date) VALUES ('$company', '$position', '$create_date', '$type', '$location', '$requirement', '$job_description', '$link', '$expire_date', '$submission_date')";

if (mysqli_query($con, $sql_basic)) {

	$last_id = mysqli_insert_id($con);
	echo "Information inserted successfully!";
} else {
	die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
?>