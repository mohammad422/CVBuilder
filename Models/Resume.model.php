<?php
require_once "../Config/Config.php";
function getAllDegrees()
{
    global $connection;
    $query = "SELECT * FROM tbl_degree";
    $result = mysqli_query($connection, $query);
    $degrees = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $degrees;
}

function getGenders()
{
    global $connection;
    $query = "SELECT * FROM tbl_gender";
    $result = mysqli_query($connection, $query);
    $genders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $genders;
}

function getAllCities()
{
    global $connection;
    $query = "SELECT * FROM tbl_city";
    $result = mysqli_query($connection, $query);
    $cities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $cities;
}

function getAllNations()
{
    global $connection;
    $query = "SELECT * FROM tbl_nation";
    $result = mysqli_query($connection, $query);
    $nations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $nations;
}

function getAllMajors()
{
    global $connection;
    $query = "SELECT * FROM tbl_major ";
    $result = mysqli_query($connection, $query);
    $majors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $majors;
}

function getAllSkills()
{
    global $connection;
    $query = "SELECT * FROM tbl_skill ";
    $result = mysqli_query($connection, $query);
    $skills = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $skills;
}

function getAllInterests()
{
    global $connection;
    $query = "SELECT * FROM tbl_interest ";
    $result = mysqli_query($connection, $query);
    $interests = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $interests;
}

function getSkillByName($skill)
{
    global $connection;
    $query = "SELECT * FROM tbl_skill WHERE skill = '$skill'";
    $result = mysqli_query($connection, $query);
    $skill = mysqli_fetch_assoc($result);
    return $skill;
}


function addSkill($skill)
{
    global $connection;
    $query = "INSERT INTO tbl_skill (id,skill) VALUES (null,'$skill')";
    mysqli_query($connection, $query);

}

function getMajorForUser($resume_id)
{
    global $connection;
    $query = "SELECT tbl_major.major FROM tbl_resume
            INNER JOIN tbl_major ON tbl_major.id=tbl_resume.major_id
            WHERE tbl_resume.id='$resume_id'";
    $result = mysqli_query($connection, $query);
    $major = mysqli_fetch_assoc($result);
    return $major;
}
function getDegreeForUser($resume_id)
{
    global $connection;
    $query = "SELECT tbl_degree.degree FROM tbl_resume
            INNER JOIN tbl_degree ON tbl_degree.id=tbl_resume.degree_id
            WHERE tbl_resume.id='$resume_id'";
    $result = mysqli_query($connection, $query);
    $degree = mysqli_fetch_assoc($result);
    return $degree;
}

function getCityForUser($resume_id){
    global $connection;
    $query = "SELECT tbl_city.city FROM tbl_resume
            INNER JOIN tbl_city ON tbl_city.id=tbl_resume.city_id
            WHERE tbl_resume.id='$resume_id'";
    $result = mysqli_query($connection, $query);
    $city = mysqli_fetch_assoc($result);
    return $city;
}
function getNationForUser($resume_id){
    global $connection;
    $query = "SELECT tbl_nation.nation FROM tbl_resume
            INNER JOIN tbl_nation ON tbl_nation.id=tbl_resume.nation_id
            WHERE tbl_resume.id='$resume_id'";
    $result = mysqli_query($connection, $query);
    $nation = mysqli_fetch_assoc($result);
    return $nation;
}

function getinterestByName($interest)
{
    global $connection;
    $query = "SELECT * FROM tbl_interest WHERE interest = '$interest'";
    $result = mysqli_query($connection, $query);
    $interest = mysqli_fetch_assoc($result);
    return $interest;
}


function addInterest($interest)
{
    global $connection;
    $query = "INSERT INTO tbl_interest (interest) VALUES ('$interest')";
    mysqli_query($connection, $query);
}


function addResume($user_id, $firstname, $lastname, $gender_id, $birthdate, $city_id, $nation_id, $about, $avg, $degree_id, $major_id)
{
    global $connection;

    $sql = "INSERT INTO tbl_resume (user_id,firstname,lastname, gender_id, birthdate,city_id,nation_id,about,aveg,degree_id,major_id) VALUES
    ('$user_id', '$firstname', '$lastname', '$gender_id','$birthdate','$city_id','$nation_id','$about','$avg','$degree_id','$major_id')";
    mysqli_query($connection, $sql);
    $lastId = mysqli_insert_id($connection); //get the above user_id to insert in pivot table
    #query for pivot table
    return $lastId;
}

function editResume($user_id, $firstname, $lastname, $gender_id, $birthdate, $city_id, $nation_id, $about, $avg, $degree_id, $major_id)
{
    global $connection;
    $sql = "UPDATE tbl_resume SET firstname='$firstname',lastname='$lastname', gender_id='$gender_id', birthdate='$birthdate',city_id='$city_id',nation_id='$nation_id',about='$about',
    aveg='$avg',degree_id='$degree_id',major_id='$major_id'
    WHERE tbl_resume.user_id='$user_id'";
    mysqli_query($connection, $sql);
}


function addUserHasInterest($user_id, $interest_id1, $interest_id2, $interest_id3)
{
    global $connection;
    $sql = "INSERT INTO tbl_resume_has_interest (user_id,interest_id) VALUES ('$user_id','$interest_id1'),('$user_id','$interest_id2'),('$user_id','$interest_id3')";
    mysqli_query($connection, $sql);
}



function addUserHasSkill($user_id, $skill_id1, $skill_id2, $skill_id3)
{
    global $connection;
    $sql = "INSERT INTO tbl_resume_has_skill (user_id,skill_id) VALUES ('$user_id','$skill_id1'),('$user_id','$skill_id2') ,('$user_id','$skill_id3')";
    mysqli_query($connection, $sql);
}



function addUserHasExp($user_id, $comp_id1, $start1, $end1, $reason1, $comp_id2, $start2, $end2, $reason2, $comp_id3, $start3, $end3, $reason3)
{
    global $connection;
    $sql = "INSERT INTO tbl_experience (user_id, comp_id, startdate, enddate, reason) VALUES 
             ('$user_id','$comp_id1','$start1','$end1','$reason1'), ('$user_id','$comp_id2','$start2','$end2','$reason2'),
            ('$user_id','$comp_id3','$start3','$end3','$reason3')";
    mysqli_query($connection, $sql);
}



function addCompany($company)
{
    global $connection;
    $sql = "INSERT INTO tbl_company (company) VALUES ('$company')";
    mysqli_query($connection, $sql);
}

function getCompanyByName($comp)
{
    global $connection;
    $query = "SELECT * FROM tbl_company WHERE company = '$comp'";
    $result = mysqli_query($connection, $query);
    $company = mysqli_fetch_assoc($result);
    return $company;
}

function getCompanyById($id)
{
    global $connection;
    $query = "SELECT * FROM tbl_company WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $company = mysqli_fetch_assoc($result);
    return $company;
}

function getResumeByUserId($userid)
{
    global $connection;
    $query = "SELECT tbl_resume.user_id,tbl_users.email,tbl_users.tel,tbl_resume.id, tbl_resume.firstname,tbl_resume.lastname,tbl_resume.birthdate,tbl_resume.about,tbl_resume.aveg, tbl_nation.nation,tbl_city.city,tbl_major.major,tbl_degree.degree,tbl_gender.gender FROM `tbl_resume` 
             INNER JOIN tbl_nation ON tbl_nation.id=tbl_resume.nation_id
             INNER JOIN tbl_city ON tbl_city.id=tbl_resume.city_id
             INNER JOIN tbl_degree ON tbl_degree.id=tbl_resume.degree_id
             INNER JOIN tbl_major ON tbl_major.id=tbl_resume.major_id
             INNER JOIN tbl_gender ON tbl_gender.id=tbl_resume.gender_id
             INNER JOIN tbl_users ON tbl_users.id=tbl_resume.user_id
              WHERE user_id= '$userid'";
    $result = mysqli_query($connection, $query);
    $resume = mysqli_fetch_assoc($result);
    return $resume;
}

function getAllExperience($user_id)
{
    global $connection;
    $query = "SELECT tbl_experience.startdate,tbl_experience.enddate,tbl_experience.reason,tbl_company.company FROM `tbl_experience` 
    INNER JOIN tbl_users ON tbl_experience.user_id=tbl_users.id
    INNER JOIN tbl_company ON tbl_experience.comp_id=tbl_company.id
    WHERE tbl_experience.user_id='$user_id'";
    $result = mysqli_query($connection, $query);
    $experience = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $experience;
}

function getAllSkillsForUser($user_id)
{
    global $connection;
    $query = "SELECT tbl_skill.skill FROM `tbl_resume_has_skill` 
    INNER JOIN tbl_users ON tbl_resume_has_skill.user_id=tbl_users.id
    INNER JOIN tbl_skill ON tbl_resume_has_skill.skill_id=tbl_skill.id
    WHERE user_id='$user_id'";
    $result = mysqli_query($connection, $query);
    $skills = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $skills;
}

function getAllInterestsForUser($user_id)
{
    global $connection;
    $query = "SELECT tbl_interest.interest FROM `tbl_resume_has_interest` 
    INNER JOIN tbl_users ON tbl_resume_has_interest.user_id=tbl_users.id
    INNER JOIN tbl_interest ON tbl_resume_has_interest.interest_id=tbl_interest.id
    WHERE user_id='$user_id'";
    $result = mysqli_query($connection, $query);
    $interests = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $interests;
}

function getFieldsForaUser($resume_id)
{
    global $connection;
    $query = "SELECT tbl_nation.nation,tbl_city.city,tbl_major.major,tbl_degree.degree,tbl_gender.gender FROM `tbl_resume` 
             INNER JOIN tbl_nation ON tbl_nation.id=tbl_resume.nation_id
             INNER JOIN tbl_city ON tbl_city.id=tbl_resume.city_id
             INNER JOIN tbl_degree ON tbl_degree.id=tbl_resume.degree_id
             INNER JOIN tbl_major ON tbl_major.id=tbl_resume.major_id
             INNER JOIN tbl_gender ON tbl_gender.id=tbl_resume.gender_id
      WHERE tbl_resume.id='$resume_id'";
    $result = mysqli_query($connection, $query);
    $fields = mysqli_fetch_assoc($result);
    return $fields;
}
# a function to relate a resume to an employer and applicant
function sendEmployerhasResume($resume_id, $from, $to)
{
    global $connection;
    $query = "INSERT INTO tbl_employer_has_resume (resume_id,user_idfrom,user_idto) VALUES ('$resume_id','$from','$to')";
    mysqli_query($connection, $query);
}
# define a function to relate all received resumes to an employer
function recievedDataForEmployer($to)
{
    global $connection;
    $query = "SELECT resume_id,user_idfrom FROM tbl_employer_has_resume WHERE user_idto = '$to'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}
#send comment and status to an applicant
function sendStatusToApplicant($from)
{
    global $connection;
    $query = "SELECT user_idto,ip,comment,situation FROM tbl_employer_has_resume WHERE user_idfrom = '$from'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}
#send all employer's comments to himself
function sendStatusToEmployer($to)
{
    global $connection;
    $query = "SELECT user_idfrom,comment,privatecom,situation FROM tbl_employer_has_resume WHERE user_idto= '$to'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

#a function to save ips
function seenResumebyEmployer($user_id, $ip)
{
    global $connection;
    $query = "UPDATE `tbl_employer_has_resume` SET ip = '$ip' WHERE tbl_employer_has_resume.user_idto = '$user_id'";
    mysqli_query($connection, $query);
}

function commentOnResumeByEmployer($resume_id, $comment, $user_idto)
{
    global $connection;
    $query = "UPDATE `tbl_employer_has_resume` SET comment = '$comment' WHERE resume_id = '$resume_id' AND user_idto='$user_idto'";
    mysqli_query($connection, $query);
}

function privateComResumeByEmployer($resume_id, $private, $user_idto)
{
    global $connection;
    $query = "UPDATE `tbl_employer_has_resume` SET privatecom = '$private' WHERE resume_id = '$resume_id' AND user_idto='$user_idto'";
    mysqli_query($connection, $query);
}
# a function to accept or reject a resume
function updateSituationReceivedResume($resume_id, $situation, $user_idto)
{
    global $connection;
    $query = "UPDATE `tbl_employer_has_resume` SET situation = '$situation' WHERE resume_id = '$resume_id' AND user_idto='$user_idto'";
    mysqli_query($connection, $query);
}

function getEmployersBySkill($skill)
{
    global $connection;
    $query = "SELECT tbl_users.email,tbl_skill.skill FROM `tbl_employer_has_skill` 
             INNER JOIN tbl_users ON tbl_employer_has_skill.user_id=tbl_users.id
             INNER JOIN tbl_skill ON tbl_employer_has_skill.skill_id=tbl_skill.id
             WHERE tbl_skill.skill='$skill'";
    $result = mysqli_query($connection, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $users;
}
/*$users=getEmployersBySkill('php');
print_r($users);*/