<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="../Css/stylesheet2.css" type="text/css" rel="stylesheet">
</head>

<body>

<ul class="topnav">
    <li><a href="../Controllers/Signout.controller.php">Log Out</a></li>
    <li><a href="../Controllers/Edit.controller.php">Edit</a></li>
    <li><a href="../Controllers/Send.controller.php">Sent</a></li>
</ul>
<div class="container">
    <div class="row1">
        <div class="row0_1">
            <b>Search Employers By Skill:</b><br>
            <form method="post" action="../Controllers/Selectedemployers.controller.php">
                <input type="text" name="skill">
                <input type="submit" name="btn1">
            </form>
        </div>
        <div class="row0_1">
            <b>Send Resume To Employers:</b><br>
            <!--create a form-->
            <form method="post" action="../Controllers/Dashboard.controller.php" enctype="multipart/form-data">
                <select name="to">
                    <option>Choose an Employer</option>
                    <?php foreach ($employers as $employer): ?>
                        <option value="<?= $employer['id'] ?>"><?= $employer['email'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" name="btn">
            </form>
        </div>
    </div>
    <h2 style="text-align: center">Resume</h2>
    <div class="row1">
        <div class="row1_1">
            <p><b>Firstname: </b> <span><?= $resume['firstname'] ?></span></p>
            <p><b>Lastname: </b><span><?= $resume['lastname'] ?></span></p>
            <p><b>Gender: </b><span><?= $resume['gender'] ?></span></p>
            <p><b>Nation: </b><span><?= $resume['nation'] ?></span></p>
            <p><b>City: </b><span><?= $resume['city'] ?></span></p>
            <p><b>Birthdate: </b><span><?= $resume['birthdate'] ?></span></p>
        </div>
        <div class="row1_1">
            <p><b>Degree: </b><span><?= $resume['degree'] ?></span></p>
            <p><b>Major: </b><span><?= $resume['major'] ?></span></p>
            <p><b>GPA: </b><span><?= $resume['aveg'] ?></span></p>
            <p><b>Email: </b><span><?= $resume['email'] ?></span></p>
            <p><b>Telephone: </b><span><?= $resume['tel'] ?></span></p>
        </div>
    </div>
    <div class="row1">
        <div class="row1_1" style="text-align: center">
            <h2>Skills</h2>
            <?php foreach ($skills as $skill) : ?>
                <p><?= $skill['skill'] ?></p>
            <?php endforeach; ?>
        </div>
        <!--  <h3><? /*= $resume['role'] */ ?></h3>-->
        <div class="row1_1" style="text-align: center">
            <h2>Interests</h2>
            <?php foreach ($interests as $interest) : ?>
                <p><?= $interest['interest'] ?></p>
            <?php endforeach; ?>
        </div>
    </div>
    <h2 style="text-align: center;"> Experiences</h2>
    <div class="row1">

        <?php foreach ($experiences as $experience) : ?>
            <div class="row2_1">

                <p><b>Company: </b><?= $experience['company'] ?></p>
                <p><b>StartDate: </b><?= $experience['startdate'] ?></p>
                <p><b>EndDate: </b><?= $experience['enddate'] ?></p>
                <p><b>ReasonDeparted: </b><?= $experience['reason'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <h2 style="text-align: center;">About Me</h2>
    <div class="row3">

        <p> <?= $resume['about'] ?></p>
    </div>
</div>


</body>
</html>
