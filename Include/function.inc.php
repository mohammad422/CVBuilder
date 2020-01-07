<?php
# checking if  email and tel are filled
function filledEmailAndTel()
{
    //define an error variable
    global $fillErr;
    //checking email or tel are filled or not
    $fill = !empty($_POST["email"]) || !empty($_POST["tel"]);
    if ($fill) {//if the fields are not empty
        return true;
    } else {//if one or both fields are empty
        $fillErr = "email or telepone number is empty";
        return false;
    }
}

#define a function to checking if all fields are empty or not
function filledOtherFields()
{
    //define an error variable
    global $fillErr2;
    //all fields that should been checked
    $fill2 = !empty($_POST["firstname"]) || !empty($_POST["lastname"]) ||
        !empty($_POST["birthdate"]) || !empty($_POST["gpa"]) || !empty($_POST["interest"]) || !empty($_POST["skill"]) ||
        !empty($_POST["comp1"]) || !empty($_POST["start1"]) || !empty($_POST["end1"]) || !empty($_POST["reason1"]) ||
        !empty($_POST["comp2"]) || !empty($_POST["start2"]) || !empty($_POST["end2"]) || !empty($_POST["reason2"]) ||
        !empty($_POST["comp3"]) || !empty($_POST["start3"]) || !empty($_POST["end3"]) || !empty($_POST["reason3"]);
    if ($fill2) {//if the fields are not empty
        return true;
    } else {//if one or both fields are empty
        $fillErr2 = "Please fill all the necessary fields";
        return false;
    }
}

#check for firstname, lastname that they have letters only
function fieldsHaveOnlyLetters($name)
{
    //define an error variable
    global $nameErr;
    $regex = "/^([a-zA-Z' ]+)$/";//define a pattern with letters only
    if (!preg_match($regex, trim($name))) {//checking if  the fields have only letters or not
        $nameErr = "Please enter only letters";
        return false;

    } else {
        return true;
    }
}

#check for email pattern
function validEmail()
{
    //define an error variable
    global $emailErr;
    $regex = "/^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/";//define a pattern for a valid email
    if (!preg_match($regex, $_POST["email"])) {//checking if entered email is valid or not
        $emailErr = "Please Enter a Valid Email";
        return false;
    } else {
        return true;
    }
}

#check a function for telephone number pattern
function validTel()
{
    //define an error variable
    global $telErr;
    $regex = "/^[0]{1}[9]{1}\d{9}$/";//define a pattern for a valid tel
    if (!preg_match($regex, $_POST["tel"])) {//checking if entered telephone number is valid or not
        $telErr = "Please Enter a Valid tel";
        return false;
    } else {
        return true;
    }
}


