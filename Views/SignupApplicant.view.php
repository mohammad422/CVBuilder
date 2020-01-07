<!doctype html>
<html lang="11">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="../Css/stylesheet1.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="form">
    <h1>Sign Up Applicant</h1>
    <hr>
<!--create a form-->
<form method="post" action="../Controllers/SignupApplicant.controller.php" enctype="multipart/form-data">

        <input type="hidden" name="role" value="applicant">
        <label>Email</label>
        <p>
            <input type="email" name="email">
            <br>
            <span>
               <?php
               if (isset($_POST["btn"]) && !validEmail()) {
                   echo $emailErr;
               }
               ?>
            </span>

        </p>


        <label>Tel</label>
        <p>
            <input type="tel" name="tel">
           <br>
            <span>
               <?php
               if (isset($_POST["btn"]) && !validTel()) {
                   echo $telErr;
               }
               ?>
            </span>

        </p>
        <label>FirstName</label>
        <p>
            <input type="text" name="firstname">
            <p>

            <span>
              <?php
              if (isset($_POST["btn"]) && !fieldsHaveOnlyLetters($_POST["firstname"])) {
                  echo $nameErr;
              }
              ?>
            </span>
    </p>
        </p>
        <label>LastName</label>
        <p>
            <input type="text" name="lastname">
            <p>
            <span>
             <?php
             if (isset($_POST["btn"]) && !fieldsHaveOnlyLetters($_POST["lastname"])) {
                 echo $nameErr;
             }
             ?>
            </span>
        <p>
        </p>
        <label>City</label>
        <p>
            <select name="city">
                <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city['id'] ?>"><?= $city['city'] ?> </option>
                <?php endforeach; ?>
            </select>
        </p>

        <label>Gender</label>
        <p>
            <select name="gender">
                <?php foreach ($genders as $gender) : ?>
                    <option value="<?= $gender['id'] ?>"><?= $gender['gender'] ?> </option>
                <?php endforeach; ?>
            </select>

        </p>
        <label>Nation</label>
        <p>
            <select name="nation">
                <?php foreach ($nations as $nation) : ?>
                    <option value="<?= $nation['id'] ?>"><?= $nation['nation'] ?> </option>
                <?php endforeach; ?>
            </select>

        </p>
        <label>BirthDate</label>
        <p>
            <input type="date" name="birthdate">

        </p>
        <label>Last Degree</label>
        <p>
            <select name="degree">
                <?php foreach ($degrees as $degree) : ?>
                    <option value="<?= $degree['id'] ?>"><?= $degree['degree'] ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
        <label>Major</label>
        <p>
            <select name="major">
                <?php foreach ($majors as $major) : ?>
                    <option value="<?= $major['id'] ?>"><?= $major['major'] ?> </option>
                <?php endforeach; ?>
            </select>

        </p>
        <label>Average</label>
        <p>
            <input type="text" name="gpa">

        </p>
        <label>3 Last Experience</label>
        first
        <p> Company <input type="text" name="comp1"></p>
        <p> Start Date <input type="date" name="start1"></p>
        <p> End Date <input type="date" name="end1"></p>
        <p> Reason <input type="text" name="reason1"></p>

        <p>second
        <p>Company <input type="text" name="comp2"></p>
        <p> Start Date <input type="date" name="start2"></p>
        <p> End Date <input type="date" name="end2"></p>
        <p> Reason <input type="text" name="reason2"></p>

        <p>third
        <p> Company <input type="text" name="comp3"></p>
        <p> Start Date <input type="date" name="start3"></p>
        <p> End Date <input type="date" name="end3"></p>
        <p> Reason <input type="text" name="reason3"></p>

        <label>About</label>
        <p>
            <textarea name="about"></textarea>
        </p>
        <label>Skills</label>
        <p>Please insert your skills and split them by ,</p>
        <p>
            <input type="text" name="skill">

        </p>
        <label>Interests</label>
        <p>Please insert your interests and split them by ,</p>
        <p>
            <input type="text" name="interest">

        </p>

        <input type="submit" name="btn">
</form>
    <?php if ((isset($_POST["btn"]) && !filledOtherFields())) : ?>
        <p>
           <span> <?= $fillErr2 ?></span>
        </p>
    <?php endif; ?>
    <?php
    if ((isset($_POST["btn"]) && !filledEmailAndTel())) : ?>
        <p>
           <span><?= $fillErr ?></span>
        </p>
    <?php endif; ?>
</div>


</body>
</html> 