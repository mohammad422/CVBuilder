<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="../Css/stylesheet3.css" type="text/css"rel="stylesheet">
</head>
<body>
<ul class="topnav">
    <li><a href="../Controllers/Signout.controller.php">Log Out</a></li>
    <li><a href="../Controllers/Getresumes.controller.php">Resumes</a></li>
</ul>
<div class="container">
    <div class="row1">

        <p><h3>Email: </h3><?= $user["email"]?></p>
        <p><h3>Telephone: </h3><?= $user["tel"] ?></p>

    </div>

</div>

</body>
</html>