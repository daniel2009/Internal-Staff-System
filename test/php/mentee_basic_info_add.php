<?php

require 'configure.php';

$con = connectToDatabase();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$othername = $_POST['othername'];
$location = $_POST['location'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$wechat = $_POST['wechat'];
$school = $_POST['school'];
$degree = $_POST['degree'];
$graduationDate = $_POST['graduationDate'];
$firstConcentration = $_POST['firstConcentration'];
$secondConcentration = $_POST['secondConcentration'];
$isUnimember = $_POST['isUnimember'];


//echo $firstname.$lastname.$company.$title.$email.$phone.$wechat.$location

$sql_basic = "INSERT INTO mentees_basic (lastname, firstname, othername, location, email, phone, wechat, school, degree, graduation_date, first_concentration, second_concentration, is_unimember) VALUES ('$lastname','$firstname','$othername', '$location', '$email', '$phone', '$wechat', '$school', '$degree', '$graduationDate', '$firstConcentration', '$secondConcentration', '$isUnimember')";

if (mysqli_query($con, $sql_basic)){

    echo"Information inserted successfully!";

}else{
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

?>