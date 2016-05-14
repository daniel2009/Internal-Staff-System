<?php

require 'configure.php';

$con = connectToDatabase();

//Get the username and password from POST methed
$user_id = $_POST['user_id'];
$password = $_POST['password'];

// This SQL statement selects ALL from the table 'Locations'
$stmt = $con->prepare("SELECT password, authority FROM admin WHERE user_id=?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
// Check if there are results
$stmt->bind_result($pass, $authority);
$stmt->fetch();

if ($pass === $password) {
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['authority'] = $authority;
    //header("Location: ../index.php", true, 301);
}else{
    echo "Login check failed";
}
// Close connections
mysqli_close($con);


?>