<?php
/**
 * Date: 30.10.2023
 * 
 * Description: 
 * This file contains of form to creating CVs
 * 
 * @author Kristina Kareva
 */

require_once 'php/connection.php';

//extracting all universities
$universities = $mysql_conn->query("SELECT id, name FROM universities");

//extracting all technical skills
$technical_skills = $mysql_conn->query("SELECT id, name FROM technical_skills");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Създаване на CV</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="public/css/app.css">
    <script src="public/js/app.js"></script>

</head>

<body class="container">

    <div class="innerContainer">

        <h1>Създаване на CV</h1>

        <form action="php/form.php" method="POST" class="formStyle">

            <div class="formInnerStyle">

                <input type="text" class="textInput" pattern="{[A-Za-z][U+0400–U+04FF]}" required name="first_name" placeholder="Име">
                <input type="text" class="textInput" pattern="{[A-Za-z][U+0400–U+04FF]}" required name="middle_name" placeholder="Презиме">
                <input type="text" class="textInput" pattern="{[A-Za-z][U+0400–U+04FF]}" required name="surname" placeholder="Фамилия">

                <div>
                    <label for="date"> Дата на раждане </label>
                    <input type="date" required name="birth_date" date="date">
                </div>

                <div class="selectWithButton">
                    <select class="select" name="university_id" id="university" required>

                        <option value="" selected disabled>
                            Изберете университет
                        </option>

                        <?php

                        while ($university = $universities->fetch_assoc()) {

                            $id = $university['id'];
                            $university_name = $university['name'];

                            echo "<option value=\"$id\">";
                            echo ($university_name);
                            echo ("</option>");
                        }

                        ?>
                    </select>

                    <button type="button" class="editSelect" onclick="showUniversityAddForm()"></button>
                </div>

                <div id="universityAddForm" style="display: none;">

                    <form class="formInnerStyle">

                        <input id="universityName" class="textInput" type="text" placeholder="Име на университет" />
                        <input id="universityGrade" class="textInput" type="number" step="0.1" placeholder="Акредитационна оценка" />

                        <button type="button" onclick="saveUniversity()"> Запис </button>

                    </form>

                    <span id="universityFormResponse"></span>

                </div>

                <div class="selectWithButton">
                    <select class="select" name="technical_skill_id" id="technical_skill" required>

                        <option value="" selected disabled>
                            Име на технологията
                        </option>

                        <?php

                        while ($technical_skill = $technical_skills->fetch_assoc()) {

                            $id = $technical_skill['id'];
                            $skill_name = $technical_skill['name'];

                            echo "<option value=\"$id\">";
                            echo ($skill_name);
                            echo ("</option>");
                        }

                        ?>

                    </select>

                    <button type="button" class="editSelect" onclick="showTechnicalSkillsAddForm()"></button>
                </div>

                <div id="skillAddForm" style="display: none;">

                    <form class="formInnerStyle">

                        <input id="skillName" class="textInput" type="text" placeholder="Име на технологията" />

                        <button type="button" onclick="saveTechnicalSkill()"> Запис </button>

                    </form>

                    <span id="skillFormResponse"></span>

                </div>

                <input type="submit" value="Запис на CV">

            </div>

        </form>

    </div>

</body>

</html>