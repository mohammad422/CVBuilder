<?php
require_once "../Models/User.model.php";
require_once "../Models/Resume.model.php";

session_start();
// redirect to dashboard if user has not been authenticated
if (!isset($_SESSION['user_id'])) {
    header('location: ../index.php');
    exit();
}

$user_id = $_SESSION["user_id"];
$user = getUserById($user_id);//get email,tel and role for a user

if ($user['role'] === 'employer') {//if user is an employer

    require "../Views/DashboardEmployer.view.php";//employer's dashboard

} else {
    $resume = getResumeByUserId($user_id);//get user's resume
    $experiences = getAllExperience($user_id);//get user's experiences
    $skills = getAllSkillsForUser($user_id);//get users's skills
    $interests = getAllInterestsForUser($user_id);// get user's interests
    $employers = getAllEmployers();//get  all employers from database
    require "../Views/DashboardApplicant.view.php";//applicant's dashboard
}

//if a user send resume to an employer
if (isset($_POST["btn"])) {
    $user_id2 = $_POST["to"];
    $resume = getResumeByUserId($user_id);
    $resume_id = $resume['id'];
    sendEmployerhasResume($resume_id, $user_id, $user_id2);//relate resume from applicant to employer
    header("location:Dashboard.controller.php");
}
