<?php
require "../Include/function.inc.php";

require "../Models/User.model.php";
require "../Models/Resume.model.php";

session_start();
// redirect to dashboard if user has been authenticated
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.php');
    exit();
}

$userid = $_SESSION["user_id"];
//get al genders degrees cities nations majors from database by functions
$genders = getGenders();
$degrees = getAllDegrees();
$cities = getAllCities();
$nations = getAllNations();
$majors = getAllMajors();
//get email and tel for a user
$user = getUserById($userid);

$resume = getResumeByUserId($userid);//get user's resume
$resume_id = $resume['id'];
$skills = getAllSkillsForUser($userid);//get user's skills
$interests = getAllInterestsForUser($userid);//get user's interests
$experienses = getAllExperience($userid);//get user's experiences
$city1 = getCityForUser($resume_id);//get user's city
$nation1 = getNationForUser($resume_id);//get user's nation
$major1 = getMajorForUser($resume_id);//get user's major
$degree1 = getDegreeForUser($resume_id);//get user's major

if (isset($_POST["btn"])) {

    $email = $_POST["email"];
    $tel = $_POST["tel"];

    editUser($email, $tel, $userid);//ass user to database

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $city_id = $_POST["city"];
    $nation_id = $_POST["nation"];
    $gender_id = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $degree_id = $_POST["degree"];
    $major_id = $_POST["major"];
    $avg = $_POST["avg"];
    $about = $_POST["about"];
    $skills=$_POST["skill"];

    //update resume
    editResume($userid, $firstname, $lastname, $gender_id, $birthdate, $city_id, $nation_id, $about, $avg, $degree_id, $major_id);


    //header("location:../Controllers/Dashboard.controller.php");
}
require "../Views/Edit.view.php";