<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <link href="../Css/stylesheet4.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">

    <h2 style="text-align: center">Resume</h2>
    <div class="row1">
        <div class="row1_1">
            <p><b>Firstname: </b> <span><?= $resume[0]['firstname'] ?></span></p>
            <p><b>Lastname: </b><span><?= $resume[0]['lastname'] ?></span></p>
            <p><b>Gender: </b><span><?= $resume[0]['gender'] ?></span></p>
            <p><b>Nation: </b><span><?= $resume[0]['nation'] ?></span></p>
            <p><b>City: </b><span><?= $resume[0]['city'] ?></span></p>
            <p><b>Birthdate: </b><span><?= $resume[0]['birthdate'] ?></span></p>
        </div>
        <div class="row1_1">
            <p><b>Degree: </b><span><?= $resume[0]['degree'] ?></span></p>
            <p><b>Major: </b><span><?= $resume[0]['major'] ?></span></p>
            <p><b>GPA: </b><span><?= $resume[0]['aveg'] ?></span></p>
            <p><b>Email: </b><span><?= $resume[0]['email'] ?></span></p>
            <p><b>Telephone: </b><span><?= $resume[0]['tel'] ?></span></p>
        </div>
    </div>
    <div class="row1">
        <div class="row1_1" style="text-align: center">
            <h2>Skills</h2>
            <p><?= $resume[2][0]['skill']?></p>
            <p><?= $resume[2][1]['skill']?></p>
            <p><?= $resume[2][2]['skill']?></p>
        </div>

        <div class="row1_1" style="text-align: center">
            <h2>Interests</h2>
            <p><?= $resume[3][0]['interest']?></p>
            <p><?= $resume[3][1]['interest']?></p>
            <p><?= $resume[3][2]['interest']?></p>
        </div>
    </div>
    <h2 style="text-align: center;"> Experiences</h2>
    <div class="row1">


        <div class="row2_1">
            <p><b>Company: </b><<?= $resume[1][0]['company']?></p>
            <p><b>StartDate: </b><?= $resume[1][0]['startdate']?></p>
            <p><b>EndDate: </b><?= $resume[1][0]['enddate']?></p>
            <p><b>ReasonDeparted: </b><?= $resume[1][0]['reason']?></p>

        </div>
        <div class="row2_1">

            <p><b>Company: </b><<?= $resume[1][1]['company']?></p>
            <p><b>StartDate: </b><?= $resume[1][1]['startdate']?></p>
            <p><b>EndDate: </b><?= $resume[1][1]['enddate']?></p>
            <p><b>ReasonDeparted: </b><?= $resume[1][1]['reason']?></p>

        </div>
        <div class="row2_1">

            <p><b>Company: </b><<?= $resume[1][2]['company']?></p>
            <p><b>StartDate: </b><?= $resume[1][2]['startdate']?></p>
            <p><b>EndDate: </b><?= $resume[1][2]['enddate']?></p>
            <p><b>ReasonDeparted: </b><?= $resume[1][2]['reason']?></p>
        </div>

    </div>
    <h2 style="text-align: center;">About Me</h2>
    <div class="row3">

        <p> <?= $resume[0]['about'] ?></p>
    </div>
    <div class="row3">
        <form action="../Controllers/Getresumes.controller.php" method="post">
            <select name="type">
                <option value="public">Public Comment</option>
                <option value="private">Private Comment</option>
            </select>
            <input type="hidden" name="resume_id" value="<?= $resume[0]['id'] ?>">
            <input type="radio" name="situation" value="<?= "0" ?>">accept
            <input type="radio" name="situation" value="<?= "1" ?>">reject
            <textarea name="comment"></textarea>
            <input type="submit" name="btn">
        </form>
    </div>

</div>


</body>
</html>