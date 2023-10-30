<?php
require_once 'php/connection.php';

$result = [];
$date_from = '';
$date_to = '';

if (isset($_GET['date_from']) && isset($_GET['date_to'])) {

    $date_from = $_GET["date_from"];
    $date_to = $_GET["date_to"];
    
    //extracting all information from cv_user with user names,technical skill name,university name where date is between selected dates
    $query = "SELECT 
    users.first_name, users.middle_name, users.surname, technical_skills.name as skill_name, universities.name as uni_name, cv_user.date 
    FROM `cv_user` 
    INNER JOIN users
    ON cv_user.`user_id` = users.id
    INNER JOIN technical_skills
    ON cv_user.`technical_skill_id` = technical_skills.id
    INNER JOIN universities
    ON cv_user.`university_id` = universities.id
    WHERE cv_user.date > '$date_from' AND cv_user.date < '$date_to'";

    $result = $mysql_conn->query($query);

    $result = $result->fetch_all(MYSQLI_ASSOC);
}

//form consists of 2 date pickers
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link rel="stylesheet" href="public/css/cvs.css">

</head>

<body class="container">

    <div class="innerContainer">

        <form action="#" method="GET" class="formStyle">

            <div class="formInnerStyle">

                <label for="date">От</label>
                <input type="date" name="date_from" date="date" value="<?= $date_from ?>"> <br> <br>

                <label for="date">До</label>
                <input type="date" name="date_to" date="date" value="<?= $date_to ?>"> <br> <br>

                <input type="submit" value="Филтрирай"> <br><br>


                <label for="table">Списък с кандидатите</label>
                <table>

                    <thead>
                        <tr>
                            <th>
                                Потребител
                            </th>

                            <th>
                                Умение
                            </th>

                            <th>
                                Университет
                            </th>

                            <th>
                                Дата на раждане
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $index => $row) {

                            echo ("<tr>");

                            echo ("<td>");
                            echo ("{$row['first_name']} {$row['middle_name']} {$row['surname']}");
                            echo ("</td>");

                            echo ("<td>");
                            echo ("{$row['skill_name']}");
                            echo ("</td>");

                            echo ("<td>");
                            echo ("{$row['uni_name']}");
                            echo ("</td>");

                            echo ("<td>");
                            echo ($row["date"]);
                            echo ("</td>");

                            echo ("</tr>");
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>

</html>