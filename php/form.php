<?php
require_once 'connection.php';

//extracting information from post request
$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$surname = $_POST["surname"];
$birth_date = $_POST["birth_date"];

$university_id = $_POST["university_id"];
$technical_skill_id = $_POST["technical_skill_id"];

// query for searching the database if the user exists
$selectExistingUserQuery = "SELECT id FROM users WHERE first_name = '$first_name' AND middle_name='$middle_name' AND surname='$surname'";

$existingUserId = $mysql_conn->query($selectExistingUserQuery)->fetch_all(MYSQLI_ASSOC);

// if the user doesn't exists we create him
if (count($existingUserId) == 0) {

    //creating query for inserting data in user table
    $query = "INSERT IGNORE INTO users (first_name, middle_name, surname, birth_date)
        VALUES ('$first_name', '$middle_name', '$surname', '$birth_date')";

    //executing query
    $mysql_conn->query($query);

    $existingUserId = $mysql_conn->insert_id;
} else {
    $existingUserId = $existingUserId[0]['id'];
}


//creating query for inserting data in cv user table
$cv_query = "INSERT INTO `cv_user`(`user_id`, `technical_skill_id`, `university_id`, `date`) 
VALUES ('$existingUserId', '$technical_skill_id', '$university_id', '$birth_date')";

//executing query
$mysql_conn->query($cv_query);

//redirect to second page
header("Location: ../cvs.php");
