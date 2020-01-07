<?php
require_once "../Config/Config.php";

#################################### a function for add a user to database ###################################
function addUser($email, $password, $tel, $role)
{
    global $connection;
    $sql = "INSERT INTO tbl_users (email, password, tel,role) VALUES ('$email', SHA1('$password'), '$tel', '$role')";
    mysqli_query($connection, $sql);
    $lastId = mysqli_insert_id($connection); //get the above user_id to insert in pivot table
    return $lastId;
}

function editUser($email, $tel, $user_id)
{
    global $connection;
    $sql = "UPDATE tbl_users SET email='$email',tel='$tel'
    WHERE tbl_users.id='$user_id'";
    mysqli_query($connection, $sql);
}

function getUserById($id)
{
    global $connection;
    $query = "SELECT id,email,tel,role FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    return $user;
}


function getAllEmployers(){
    global $connection;
    $query = "SELECT * FROM tbl_users WHERE role= 'employer'";
    $result = mysqli_query($connection, $query);
    $employers = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $employers;
}
#a function to connect skill_id to user_id in pivot
function connectSkillToEmployer($user_id,$Skill_id){
    global $connection;
    $query="INSERT INTO tbl_employer_has_skill (user_id,skill_id) VALUES ('$user_id','$Skill_id')";
    mysqli_query($connection,$query);
}
