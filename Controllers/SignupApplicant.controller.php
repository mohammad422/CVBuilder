<?php
require "../Include/function.inc.php";

require "../Models/User.model.php";
require "../Models/Resume.model.php";

session_start();

if (isset($_SESSION["user_id"])) {
    header("location:../Controllers/Dashboard.controller.php");
}

##get all genders degrees cities nations majors in database by functions
$genders = getGenders();
$degrees = getAllDegrees();
$cities = getAllCities();
$nations = getAllNations();
$majors = getAllMajors();

if (isset($_POST["btn"]) && filledEmailAndTel() && filledOtherFields() && validEmail($_POST["email"]) && validTel($_POST["tel"]) &&
    fieldsHaveOnlyLetters($_POST["firstname"]) && fieldsHaveOnlyLetters($_POST["lastname"])) {
    $role = $_POST["role"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $password = rand(12345678, 98765432);//generate a password for user
   $user_id = addUser($email, $password, $tel, $role);//ass user to database

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $city_id = $_POST["city"];
    $nation_id = $_POST["nation"];
    $gender_id = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $degree_id = $_POST["degree"];
    $major_id = $_POST["major"];
    $gpa = $_POST["gpa"];
    $about = $_POST["about"];

######################################### add skills to database and get there ids ##################################
    $skillText = $_POST["skill"];
    $skillNames = explode(',', $skillText);

    foreach ($skillNames as $skillName) {
        $skill = getskillByName($skillName);
        if (isset($skill)) {//if there is the skill in database already
            $skill_ids[] = $skill['id'];
        } else {//if there is not the skill in database
            addSkill($skillName);
            $skill = getskillByName($skillName);
            $skill_ids[] = $skill['id'];
        }
    }
    $skill_id1 = $skill_ids[0];
    $skill_id2 = $skill_ids[1];
    $skill_id3 = $skill_ids[2];

######################################### add interests to database and get their ids ##################################
    $interestText = $_POST["interest"];
    $interestNames = explode(',', $interestText);

    foreach ($interestNames as $interestName) {
        $interest = getinterestByName($interestName);
        if (isset($interest)) {//if there is this interest in database already
            $interest_ids[] = $interest['id'];
        } else {//if there isn't the skill in database
            addInterest($interestName);
            $interest = getskillByName($interestName);
            $interest_ids[] = $interest['id'];
        }
    }
    $interest_id1 = $interest_ids[0];
    $interest_id2 = $interest_ids[1];
    $interest_id3 = $interest_ids[2];

    ######################################### add experiences to database ##################################
    ##add company1 to database and get its id
    $companyName = $_POST["comp1"];
    $company = getCompanyByName($companyName);
    if (isset($company)) {//if there is this company in database already
        $comp_id1 = $company['id'];
    } else {//if there isn't this company in database
        addCompany($companyName);
        $company = getCompanyByName($companyName);
        $comp_id1 = $company['id'];
    }
    $start1 = $_POST["start1"];
    $end1 = $_POST["end1"];
    $reason1 = $_POST["reason1"];

    ##add company2 to database and get its id
    $companyName = $_POST["comp2"];
    $company = getCompanyByName($companyName);
    if (isset($company)) {
        $comp_id2 = $company['id'];
    } else {
        addCompany($companyName);
        $company = getCompanyByName($companyName);
        $comp_id2 = $company['id'];
    }
    $start2 = $_POST["start2"];
    $end2 = $_POST["end2"];
    $reason2 = $_POST["reason2"];

    ##add company3 to database and get its id
    $companyName = $_POST["comp3"];
    $company = getCompanyByName($companyName);
    if (isset($company)) {
        $comp_id3 = $company['id'];
    } else {
        addCompany($companyName);
        $company = getCompanyByName($companyName);
        $comp_id3 = $company['id'];
    }
    $start3 = $_POST["start3"];
    $end3 = $_POST["end3"];
    $reason3 = $_POST["reason3"];
    ##add resume to database
    $resume_id = addResume($user_id, $firstname, $lastname, $gender_id, $birthdate, $city_id, $nation_id, $about, $gpa, $degree_id, $major_id);
    addUserHasInterest($user_id, $interest_id1, $interest_id2, $interest_id3);//relate interests and user
    addUserHasSkill($user_id, $skill_id1, $skill_id2, $skill_id3);//relate skills and user
    ##relate experiences and user
    addUserHasExp($user_id, $comp_id1, $start1, $end1, $reason1, $comp_id2, $start2, $end2, $reason2, $comp_id3, $start3, $end3, $reason3);

    echo $password;
}

require "../Views/SignupApplicant.view.php";
