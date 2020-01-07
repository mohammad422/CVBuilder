<?php
require_once "../Models/User.model.php";
require_once "../Models/Resume.model.php";

session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:Login.controller.php");
}

$user_idto = $_SESSION["user_id"];
##get resume by an employer from a user
$data = recievedDataForEmployer($user_idto);

$arr = array();
$arr1 = array();

$ip = $_SERVER["REMOTE_ADDR"];
##get all received resume to an employer
foreach ($data as $row) {
    $user_idfrom = $row['user_idfrom'];
    $resume = getResumeByUserId($user_idfrom);
    $arr[] = $resume;
    $arr1[] = $arr;
    $arr = [];
}
##insert a public or private comment under a received resume and accept or reject the resume
if (isset($_POST["btn"])) {
    $type = $_POST["type"];
    $resume_id = $_POST["resume_id"];
    $comment = $_POST["comment"];
    $situation_value = $_POST["situation"];
   if ($situation_value === "0"){

        $situation="accepted";
        updateSituationReceivedResume($resume_id,$situation,$user_idto);//if the resume has been accepted

    }elseif($situation_value === "1"){

        $situation="rejected";
        updateSituationReceivedResume($resume_id,$situation,$user_idto);//if the resume has been rejected
    }

    if ($type === "public") {
        commentOnResumeByEmployer($resume_id, $comment,$user_idto);//add public comment
        header("location:../Controllers/Getresumes.controller.php");
    } elseif ($type === "private") {
        privateComResumeByEmployer($resume_id, $comment,$user_idto);//add private comment
        header("location:../Controllers/Getresumes.controller.php");
    }
}
//a function for employer to see his comments on resumes
$statuses = sendStatusToEmployer($user_idto);

$array = array();
$array1 = array();

foreach ($statuses as $status) {

    $userfrom = $status["user_idfrom"];
    $user1 = getUserById($userfrom);
    $array[] = $user1;
    $array[] = $status;
    $array1[] = $array;
    $array = [];
}

require "../Views/Getresumes.view.php";
## a function to save ip
seenResumebyEmployer($user_idto, $ip);