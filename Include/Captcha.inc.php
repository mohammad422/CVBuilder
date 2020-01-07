<?php
require_once "../Helpers/helper.php";
function generateCaptcha1($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    $_SESSION["answer"] = $string;
    return $string;
}

function generateCaptcha2()
{
    $operators = array("+", "*", "-");
    $numbers = array("یک", "دو", "سه", "چهار", "پنج");
    $key1 = array_rand($numbers);
    $key2 = array_rand($operators);
    $key3 = array_rand($numbers);
    $captcha = $numbers[$key1] . " " . $operators[$key2] . " " . $numbers[$key3];
    $first = (int)$key1 + 1;
    $second = (int)$key3 + 1;
    switch ($key2) { //make the answer
        case "0":
            $answer = $first + $second;
            break;
        case "1":
            $answer = $first * $second;
            break;
        case "2":
            $answer = $first - $second;
            break;
        default:
            $answer = "";
    }
    $_SESSION["answer"] = $answer;
    return $captcha;
}

function generateCaptcha3()
{
    $captchas = array("پایتخت ایران؟", "در چه سال میلادی هستیم؟", "آیفون محصول په شرکتی است؟", "واژه سلام چند حرف دارد؟");
    $ansewrs = array("تهران", "2019", "اپل", "4");
    $key = array_rand($captchas);
    $_SESSION["answer"] = $ansewrs[$key];
    return $captchas[$key];
}

function callcaptcha()
{ //call captchas randomly
    $functions = array("generateCaptcha1", "generateCaptcha2", "generateCaptcha3");
    $key = array_rand($functions);
    return $functions[$key];
}
/*function randomCaptcha()
{
    global $randomstring1;
    $randomstring1 = generateRandomString(5);
    $_SESSION['random'] = $randomstring1;
    $captcha = $_POST["captcha"];
    if ($_SESSION['random'] === $captcha) {
        return true;
    } else {
        $_SESSION['error'] = "Captcha is wrong";
        return false;
    }
}

function sumCaptcha()
{
    global $err;
    global $ran1;
    global $ran2;
    $ran1 = rand(1, 9);
    $ran2 = rand(1, 9);
    $res = $ran1 + $ran2;
    $_SESSION['random'] = $res;
    $captcha = $_POST["captcha"];
    if ($_SESSION['random'] === $captcha) {
        return true;
    } else {
        $_SESSION['error'] = "Captcha is wrong";
        return false;
    }

}

function testCaptcha()
{
    global $capital;
    global $country;
    global $capitals;
    global $captcha;
    $capitals = ["Iran" => "Tehran", "Germany" => "Berlin", "France" => "Paris", "Iraq" => "Baghdad"];
    $country = array_rand($capitals);
    $capital = $capitals[$country];
    $_SESSION['random'] = $capital;

    $captcha = $_POST["captcha"];
    if ($_SESSION['random'] === $captcha) {
        return true;
    } else {
        $_SESSION['error'] = "Captcha is wrong";
        return false;
    }
}


function captchaRand()
{
    global $capRand;
    $captchaArray = array('randomCaptcha', 'sumCaptcha', 'testCaptcha');
    $capRand = array_rand($captchaArray);

    return $captchaArray[$capRand];
}
*/

