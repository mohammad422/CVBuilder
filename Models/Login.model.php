<?php
require_once "../Config/Config.php";
require "../Helpers/helper.php";
function login($username, $password)
{
    global $connection;
    $password=sha1($password);
    $sql = "SELECT * FROM tbl_users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $rememberToken = generateRandomString(20);
    updateCurrentUserRememberToken($rememberToken);
    setcookie('remember', $rememberToken, time() + 3600, '/');
    return $row;
}

function updateCurrentUserRememberToken($rememberToken = null)
{
    global $connection;
    $userId = $_SESSION['user_id'];
    $sql = "UPDATE tbl_users SET remember ='$rememberToken' WHERE id ='$userId'";
    return mysqli_query($connection, $sql);
}

function authenticateUserByCookie()
{
    global $connection;
    $rememberToken = $_COOKIE['remember'];
    $sql = "SELECT id FROM tbl_users WHERE remember ='$rememberToken'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) < 1) {
        return;
    }
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
}
function logOut(){
    global $connection;
    $userId=$_SESSION["user_id"];
   $sql = "UPDATE tbl_users SET remember = '' WHERE id ='$userId'";
    mysqli_query($connection, $sql);
    session_unset();
    session_destroy();
    setcookie('remember ','',time()-2000);
    return;

}
