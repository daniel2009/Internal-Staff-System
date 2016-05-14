<?php

// Create connection
$con=mysqli_connect("localhost","root","5583646Yu","unicareer");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$title = $_POST['title'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$wechat = $_POST['wechat'];
$education = $_POST['education'];
$location = $_POST['location'];
$sellSide = $_POST['checked_sell_side'];
$buySide = $_POST['checked_buy_side'];
$bigFour = $_POST['checked_big_four'];
$consulting = $_POST['checked_consulting'];
$otherFields = $_POST['checked_other_fields'];
$expertSession = $_POST['checked_expert_session'];
$specifiedField = $_POST['specified_field'];
$linkedin = $_POST['linkedin'];
$evaluation = $_POST['evaluation'];
$note = $_POST['note'];
$bio_note = $_POST['bio_note'];

//echo $firstname.$lastname.$company.$title.$email.$phone.$wechat.$education.$location.$checkedValue.$linkedin.$evaluation.$note.$bio_note;


$sql_basic = "INSERT INTO mentors_basic (lastname, firstname, title, company, email, phone, wechat, education, location, linkedin, evaluation, note, bio_note) VALUES ('$lastname','$firstname','$title', '$company', '$email', '$phone', '$wechat', '$education', '$location', '$linkedin', '$evaluation', '$note', '$bio_note')";

if (mysqli_query($con, $sql_basic)){

    $last_id = mysqli_insert_id($con);

    $sellSideLen = count($sellSide);
    $buySideLen = count($buySide);
    $bigFourLen = count($bigFour);
    $consultingLen = count($consulting);
    $otherFieldsLen = count($otherFields);
    $expertSessionLen = count($expertSession);

    for ($i=0; $i < $sellSideLen; $i++) { 
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Finance Sell Side', '$sellSide[$i]')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    for ($i=0; $i < $buySideLen; $i++) { 
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Finance Buy Side', '$buySide[$i]')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    for ($i=0; $i < $bigFourLen; $i++) { 
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Big Four', '$bigFour[$i]')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    for ($i=0; $i < $consultingLen; $i++) { 
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Consulting', '$consulting[$i]')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    for ($i=0; $i < $otherFieldsLen; $i++) { 
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Other Fields', '$otherFields[$i]')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    for ($i=0; $i < $expertSessionLen; $i++) { 
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Expert Session', '$expertSession[$i]')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    if ($specifiedField != '') {
        $sql_specialty = "INSERT INTO mentors_specialty (mentor_id, field, specialty) VALUES ($last_id, 'Specified', '$specifiedField')";
        if (!mysqli_query($con, $sql_specialty)){
            die('Error: ' . mysqli_error($con));
        }
    }
    

    echo"Information inserted successfully!";

}else{
    die('Error: ' . mysqli_error($con));
}

// Close connections
mysqli_close($con);


?>