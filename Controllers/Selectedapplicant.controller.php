<?php
require_once "../Models/User.model.php";
require_once "../Models/Resume.model.php";

session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:Login.controller.php");
}

###get a received resume
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $resumeSelected = getResumeByUserId($id);
    $resume[] = $resumeSelected;
    $experience = getAllExperience($id);
    $resume[] = $experience;
    $skill = getAllSkillsForUser($id);
    $resume[] = $skill;
    $interest = getAllInterestsForUser($id);
    $resume[] = $interest;

}
require "../Views/Selectedapplicant.view.php";