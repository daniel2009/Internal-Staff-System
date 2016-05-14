<?php

require 'configure.php';

$con = connectToDatabase();

$internal_referral_id = $_POST['internal_referral_id'];
$company = $_POST['company'];
$position = $_POST['position'];
$location = $_POST['location'];
$type = $_POST['type'];
$create_date = $_POST['create_date'];
$expire_date = $_POST['expire_date'];
$submission_date = $_POST['submission_date'];
$link = $_POST['link'];
$requirement = $_POST['requirement'];
$job_description = $_POST['job_description'];

//echo $firstname.$lastname.$company.$title.$email.$phone.$wechat.$education.$location.$checkedValue.$linkedin.$evaluation.$note.$bio_note;



$sql_basic = "UPDATE internal_referral_summary SET location='$location', company='$company', position='$position', location='$location', type='$type', create_date='$create_date', expire_date='expire_date', submission_date='$submission_date', link='$link', requirement='$requirement', job_description='$job_description' WHERE internal_referral_id=$internal_referral_id";

if (mysqli_query($con, $sql_basic)) {
    echo"Information updated successfully!";
}else{
    die('Error-basic: ' . mysqli_error($con));
}

// Close connections
mysqli_close($con);

?>