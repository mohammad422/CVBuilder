<?php
require_once "../Models/User.model.php";
require_once "../Include/function.inc.php";

session_start();

if (isset($_SESSION["user_id"])) {
    header("location:../Controllers/Dashboard.controller.php");
}

$user_id = $_SESSION["user_id"];

require_once "../Views/SignupEmployer.view.php";
##add employer to database
if (isset($_POST["btn"]) && filledEmailAndTel() && validEmail() && validTel()) {

    $role = $_POST["role"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $skillName = $_POST["skill"];
    $skill = getskillByName($skillName);
    $skill_id = $skill['id'];
    connectSkillToEmployer($user_id, $skill_id);
    $flag = true;
    $password = rand(12345678, 98765432);//generate a password for user
    addUser($email, $password, $tel, $role);
    echo $password;
}

require_once "../Views/SignupEmployer.view.php";