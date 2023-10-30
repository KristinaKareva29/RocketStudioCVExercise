<?php
require_once 'connection.php';
//extracting information from request
$type = $_REQUEST['type'];

//initialising variables
$response = "Failed to save!";

$response_data = [];


switch ($type) {
        //switch universities

    case 'university':

        //extracting data from request
        $universityName = $_REQUEST['universityName'];
        $universityGrade = $_REQUEST['universityGrade'];

        //creating query
        $query = "INSERT INTO `universities`(`name`, `grade`) VALUES ('$universityName',$universityGrade)";

        //executing query
        $insertPassed = $mysql_conn->query($query);

        //if query is true we create response data
        if ($insertPassed) {

            $response = "Saved!";

            $query = "SELECT * FROM universities ";

            $response_data = $mysql_conn->query($query)->fetch_all(MYSQLI_ASSOC);
        }
        break;

        //switch technical skills
    case 'technical_skill':

        //extracting data from request
        $skillName = $_REQUEST['skillName'];

        //creating query
        $query = "INSERT INTO `technical_skills`(`name`) VALUES ('$skillName')";

        //executing query
        $insertPassed = $mysql_conn->query($query);

        //if query is true we create response data

        if ($insertPassed) {


            $response = "Saved!";

            $query = "SELECT * FROM technical_skills ";

            $response_data = $mysql_conn->query($query)->fetch_all(MYSQLI_ASSOC);
        }
        break;
}

//return response data like json string
echo json_encode($response_data);
