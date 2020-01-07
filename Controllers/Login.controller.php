<?php
require_once "../Models/Login.model.php";
session_start();
// redirect to dashboard if user has been authenticated
if (isset($_SESSION['user_id'])) {
    header('location: Dashboard.controller.php');
    exit();
}
// try to authenticate user by cookie
if (isset($_COOKIE['remember']) && !isset($_SESSION['user_id'])) {
    authenticateUserByCookie();
}

$flag = false;

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

// check correctness of username and password
    $credentialIsCorrect = login($email, $password);

    print_r($credentialIsCorrect);
// redirect to login page if username or password is wrong
    if (!isset($credentialIsCorrect)) {

        $_SESSION['error'] = 'Username Or Password Is Incorrect';
        $flag = true;
        require "../Views/Login.view.php";
        exit();
    } else {
        header('location:../Controllers/Dashboard.controller.php');
    }


}

require "../Views/Login.view.php";

