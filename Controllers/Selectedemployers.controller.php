<?php
require_once "../Models/User.model.php";
require_once "../Models/Resume.model.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:Login.controller.php");
}
#to see all employers with a selected skill
if (isset($_POST["btn1"])) {
    $skill = $_POST["skill"];
    $employers = getEmployersBySkill($skill);

}

require "../Views/Selectedemployers.view.php";