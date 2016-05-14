<?php

//Create Connection to Database
function connectToDatabase(){
	// Create connection
	$con = mysqli_connect("localhost","root","5583646Yu","unicareer");

	// Check connection
	if (mysqli_connect_errno())
	{
	  die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	return $con;
}

?>