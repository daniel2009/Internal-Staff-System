<?php

require 'configure.php';

$con = connectToDatabase();

$menteeId 		= $_POST['menteeId'];
$contentType 	= $_POST['contentType'];

if ($contentType === "bi") {
	$password = $_POST['confirm'];

	session_start();
	$user_id = $_SESSION['user_id'];

	$stmt = $con->prepare("SELECT password, authority FROM admin WHERE user_id=?");
	$stmt->bind_param('s', $user_id);
	$stmt->execute();
	$stmt->bind_result($pass, $authority);
	$stmt->fetch();
	mysqli_stmt_close($stmt);

	if ($password === $pass && substr($authority, 1, 1) === '1') {
		$sql_del_bi = "DELETE FROM mentees_basic WHERE mentee_id = $menteeId";

		if (mysqli_query($con, $sql_del_bi))
		{
		    echo "Delete Successfully!";
		    
		}else{
			die('Error_del_bi: ' . mysqli_error($con));
		}
	}

}elseif ($contentType === "pt") {
	$sql_del_pt = "DELETE FROM pre_talk WHERE mentee_id = $menteeId";

	if (mysqli_query($con, $sql_del_pt))
	{
	    echo "Delete Successfully!";
	    
	}else{
		die('Error_del_pt: ' . mysqli_error($con));
	}

}elseif ($contentType === "pb" || $contentType === "mi" || $contentType === "vs" || $contentType === "rm" ||$contentType === "ev"){
	$serviceRecordId = $_POST['confirm'];

	$sql_del_purchase = "DELETE FROM service_records WHERE service_record_id = $serviceRecordId";

	if (mysqli_query($con, $sql_del_purchase))
	{
	    echo "Delete Successfully!";
	    
	}else{
		die('Error_del_purchase: ' . mysqli_error($con));
	}

}elseif ($contentType === "ir") {
	$irRecordId = $_POST['confirm'];

	$sql_del_ir = "DELETE FROM internal_referral_record WHERE record_id = $irRecordId";

	if (mysqli_query($con, $sql_del_ir))
	{
	    echo "Delete Successfully!";
	    
	}else{
		die('Error_del_ir: ' . mysqli_error($con));
	}

}elseif ($contentType === "of") {
	$offerId = $_POST['confirm'];

	$sql_del_of = "DELETE FROM other_offer_tracking_record WHERE offer_id = $offerId";

	if (mysqli_query($con, $sql_del_of))
	{
	    echo "Delete Successfully!";
	    
	}else{
		die('Error_del_of: ' . mysqli_error($con));
	}

}elseif ($contentType === "st") {
	$recordId = $_POST['confirm'];

	$sql_del_st = "DELETE FROM session_tracking WHERE record_id = $recordId";

	if (mysqli_query($con, $sql_del_st))
	{
	    echo "Delete Successfully!";
	    
	}else{
		die('Error_del_st: ' . mysqli_error($con));
	}

}elseif ($contentType === "uc") {
	$recordId = $_POST['confirm'];

	$sql_del_uc = "DELETE FROM unicareer_credit WHERE record_id = $recordId";

	if (mysqli_query($con, $sql_del_uc))
	{
	    echo "Delete Successfully!";
	    
	}else{
		die('Error_del_uc: ' . mysqli_error($con));
	}
}

//close connection
mysqli_close($con);



?>