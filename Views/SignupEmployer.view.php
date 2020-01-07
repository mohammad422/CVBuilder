<!doctype html>
<html lang="en">
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
    <h1>Sign Up Employer</h1>
    <hr>
    <!--create a form-->
    <form method="post" action="../Controllers/SignupEmployer.controller.php" enctype="multipart/form-data">
   <input type="hidden" name="role" value="employer">

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
        <label>Skill</label>
        <p>
            <input type="text" name="skill">
        </p>
            <input type="submit" name="btn">
    </form>

    <a href="../Controllers/Login.controller.php">Log in</a>
</div>
</body>
</html>
