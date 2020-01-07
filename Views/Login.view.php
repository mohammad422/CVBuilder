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
    <h1>Log In</h1>
    <hr>
    <!--create a form-->
    <form method="post" action="../Controllers/Login.controller.php" enctype="multipart/form-data">

        <label>Email</label>
        <p>
            <input type="email" name="email">
        </p>
        <label>Password</label>
        <p>
            <input type="password" name="password">
        </p>
            <input type="submit" name="btn">
    </form>

    <?php
    if ($flag){
        echo $_SESSION['error'];
    }
    ?>

</div>
</body>
</html>
