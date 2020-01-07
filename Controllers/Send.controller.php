<?php

require_once "../Models/User.model.php";
require_once "../Models/Resume.model.php";

session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:Login.controller.php");
}

$arr = array();
$arr1 = array();

$user_idfrom = $_SESSION["user_id"];

$data = sendStatusToApplicant($user_idfrom);//send comment and seen from employer to applicant


foreach ($data as $value) {
    $user_idto = $value["user_idto"];
    $user = getUserById($user_idto);
    $arr[] = $user;
    $arr[] = $value;
    $arr1[] = $arr;
    $arr = [];
}


require "../Views/Send.view.php";