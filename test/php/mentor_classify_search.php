<?php

// Create connection
$con=mysqli_connect("localhost","root","5583646Yu","unicareer");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Get the username and password from POST methed
$key_word = $_POST['key_word'];
$classification = $_POST['classification'];
$sql;
$mentorIdList = array();
$resultArray = array();

echo $classification;

if ($classification == "Default") {

    $sql = "SELECT mentor_id FROM mentors_basic WHERE lastname LIKE '%$key_word%' OR lastname LIKE '%$key_word%' OR company LIKE '%$key_word%' OR title LIKE '%$key_word%' OR location LIKE '%$key_word%'";

    if ($result = mysqli_query($con, $sql))
    {
        while($row = $result->fetch_assoc())
        {
            $mentorId = $row;
            array_push($mentorIdList, $mentorId['mentor_id']);
        }
        
    }else{
        die('Error1: ' . mysqli_error($con));
    }

    $sql = "SELECT mentor_id FROM mentors_specialty WHERE specialty LIKE '%$key_word%'";

    if ($result = mysqli_query($con, $sql))
    {
        while($row = $result->fetch_assoc())
        {
            $mentorId = $row;
            array_push($mentorIdList, $mentorId['mentor_id']);
        }
        
    }else{
        die('Error1: ' . mysqli_error($con));
    }

}else{

    if ($classification == "Basic Info") {

        $sql = "SELECT mentor_id FROM mentors_basic WHERE firstname LIKE '%$key_word%' OR lastname LIKE '%$key_word%' OR company LIKE '%$key_word%' OR title LIKE '%$key_word%' OR location LIKE '%$key_word%'";

    }elseif ($classification == ">>> First Name") {

        $sql = "SELECT mentor_id FROM mentors_basic WHERE firstname LIKE '%$key_word%'";

    }elseif ($classification == ">>> Last Name") {

        $sql = "SELECT mentor_id FROM mentors_basic WHERE lastname LIKE '%$key_word%'";

    }elseif ($classification == ">>> Company") {

        $sql = "SELECT mentor_id FROM mentors_basic WHERE company LIKE '%$key_word%'";

    }elseif ($classification == ">>> Title") {

        $sql = "SELECT mentor_id FROM mentors_basic WHERE title LIKE '%$key_word%'";

    }elseif ($classification == ">>> Location") {

        $sql = "SELECT mentor_id FROM mentors_basic WHERE location LIKE '%$key_word%'";

    }elseif ($classification == "Specialty"){

        $sql = "SELECT mentor_id FROM mentors_specialty WHERE specialty LIKE '%$key_word%'";

    }elseif ($classification == ">>> Finance Sell Side"){

            $sql = "SELECT mentor_id FROM mentors_specialty WHERE field = 'Finance Sell Side' AND specialty LIKE '%$key_word%'";

    }elseif ($classification == ">>> Finance Buy Side"){

            $sql = "SELECT mentor_id FROM mentors_specialty WHERE field = 'Finance Buy Side' AND specialty LIKE '%$key_word%'";

    }elseif ($classification == ">>> Big Four"){

            $sql = "SELECT mentor_id FROM mentors_specialty WHERE field = 'Big Four' AND specialty LIKE '%$key_word%'";

    }elseif ($classification == ">>> Consulting"){

            $sql = "SELECT mentor_id FROM mentors_specialty WHERE field = 'Consulting' AND specialty LIKE '%$key_word%'";

    }elseif ($classification == ">>> Other Fields") {

            $sql = "SELECT mentor_id FROM mentors_specialty WHERE field = 'Other Fields' AND specialty LIKE '%$key_word%'";

    }elseif ($classification == "Expert Session") {

        $sql = "SELECT mentor_id FROM mentors_specialty WHERE field = 'Expert Session' AND specialty LIKE '%$key_word%'";

    }else{
        echo "bad search";
        exit();
    }

    if ($result = mysqli_query($con, $sql))
    {
        while($row = $result->fetch_assoc())
        {
            $mentorId = $row;
            array_push($mentorIdList, $mentorId['mentor_id']);
        }
        
    }else{
        die('Error1: ' . mysqli_error($con));
    }
    
}



//echo json_encode($mentorIdList);
$mentorIdList = array_unique($mentorIdList);
$mentorIdList = array_values($mentorIdList);

//echo json_encode($mentorIdList);

//$mentorIdList = sort($mentorIdList);
$idListLen = count($mentorIdList);

for ($i=0; $i < $idListLen; $i++) {

    $mentorInfo = array();
    
    $sql_basic = "SELECT * FROM mentors_basic WHERE mentor_id =". $mentorIdList[$i];
    if ($result = mysqli_query($con, $sql_basic))
    {
        $basicInfo = array();
        if ($row = $result->fetch_assoc()) {
            $basicInfo = $row;
            array_push($mentorInfo, $basicInfo);
        }

    }else{
        die('Error2: ' . mysqli_error($con));
    }
    
    $sql_specialty = "SELECT field, specialty FROM mentors_specialty WHERE mentor_id =". $mentorIdList[$i];
    $specialtyList = array();
    if ($result = mysqli_query($con, $sql_specialty)) {
        while($row = $result->fetch_assoc())
        {
            $specialty = $row;
            array_push($specialtyList, $specialty);
        }
        array_push($mentorInfo, $specialtyList);

    }else{
        die('Error3: ' . mysqli_error($con));
    }
    array_push($resultArray, $mentorInfo);

}


echo json_encode($resultArray);


// Close connections
mysqli_close($con);


?>