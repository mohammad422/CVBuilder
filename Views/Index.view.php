<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: rgb(39, 63, 65);
        }

        * {
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: white;
        }

        ul.topnav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            margin-bottom: 10px;
        }

        ul.topnav li {
            float: left;
        }

        ul.topnav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li:first-child {
            margin-left: 10%;
        }
    </style>
</head>
<body>

<ul class="topnav">
    <?php if (!isset($_SESSION["user_id"])): ?>
    <li><a href="Controllers/Login.controller.php">Log In</a></li>
    <?php else: ?>
        <li><a href="Controllers/Signout.controller.php">Log Out</a></li>
    <?php endif; ?>
    <li><a href="Controllers/SignupApplicant.controller.php">Sign up Applicant</a></li>
    <li><a href="Controllers/SignupEmployer.controller.php">Sign up Employer</a></li>
</ul>
<div class="container"style="text-align: center;margin-top: 200px;color: aquamarine;font-size: xx-large;">

<h1>Wellcome </h1>

</div>

</body>
</html>
