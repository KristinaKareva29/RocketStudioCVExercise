//function for showing university form
function showUniversityAddForm() {

    var x = document.getElementById("universityAddForm");


    if (x.style.display === "none") {

        x.style.display = "block";
    } else {

        x.style.display = "none";
    }

}

//function for saving university data
function saveUniversity() {

    var universityName = document.getElementById('universityName').value;
    var universityGrade = document.getElementById('universityGrade').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (data) {

        if (this.readyState == 4 && this.status == 200) {

            var universitySelect = document.getElementById('university');

            while (universitySelect.options.length > 0) {
                universitySelect.remove(0);
            }

            const responseJson = JSON.parse(this.responseText);

            responseJson.forEach(function (item) {

                universitySelect.add(new Option(item.name, item.id));
            });
        }
    };

    xmlhttp.open("GET", "./php/saveAddForm.php?type=university&universityName=" + universityName + "&universityGrade=" + universityGrade, true);
    xmlhttp.send();

}

//function for showing technical skills form

function showTechnicalSkillsAddForm() {
    var x = document.getElementById("skillAddForm");


    if (x.style.display === "none") {

        x.style.display = "block";
    } else {

        x.style.display = "none";
    }
}

//function for saving technical skill data

function saveTechnicalSkill() {
    var skillName = document.getElementById('skillName').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var technicalSkillSelect = document.getElementById('technical_skill');

            while (technicalSkillSelect.options.length > 0) {
                technicalSkillSelect.remove(0);
            }

            const responseJson = JSON.parse(this.responseText);

            responseJson.forEach(function (item) {

                technicalSkillSelect.add(new Option(item.name, item.id));
            });
        }
    };
    xmlhttp.open("GET", "./php/saveAddForm.php?type=technical_skill&skillName=" + skillName, true);
    xmlhttp.send();
}