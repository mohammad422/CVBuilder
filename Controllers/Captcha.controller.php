<?php
require "../Include/Captcha.inc.php";
session_start();
function validateCaptcha($captcha)
{
    if ($captcha === $_SESSION["answer"]) {
        return true;
    }
    $error = "Wrong captcha";
    return $error;
}
$function = callcaptcha();
$captcha = $function();
require "../Views/Captcha.php";
/*$capt = captchaRand();
$var = $capt();
echo gettype($var);
echo $_SESSION['random'];
require "../Views/Captcha.php";
//if(isset($_POST["btn"])) {
if ($var === true) {
    header("location:Login.controller.php");
} else {
    $_SESSION['error'] = "captcha is wrong";
}*/

/*  if ($_SESSION['random'] === $_POST['captcha']) {

  } else {

  }*/
//}
