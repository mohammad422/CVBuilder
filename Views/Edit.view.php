<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="../Css/stylesheet1.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="form">
    <h1>Sign Up</h1>
    <hr>
    <!--create a form-->
    <form method="post" action="../Controllers/Edit.controller.php" enctype="multipart/form-data">

        <label>Email</label>
        <p>
            <input type="email" name="email" placeholder="<?= $user['email'] ?>">

        </p>

        <label>Tel</label>
        <p>
            <input type="tel" name="tel" placeholder="<?= $user['tel'] ?>">

        </p>
        <label>FirstName</label>
        <p>
            <input type="text" name="firstname" placeholder="<?= $resume['firstname'] ?>">

        </p>
        <label>LastName</label>
        <p>
            <input type="text" name="lastname" placeholder="<?= $resume['lastname'] ?>">
        </p>
        <label>City</label>
        <p>
            <select name="city">
                <option><?= $city1['city'] ?></option>
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
                <option><?= $nation1['nation'] ?></option>
                <?php foreach ($nations as $nation) : ?>
                    <option value="<?= $nation['id'] ?>"><?= $nation['nation'] ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
        <label>BirthDate</label>
        <p>
            <input type="date" name="birthdate" placeholder="<?= $resume['birthdate'] ?>">
        </p>
        <label>Last Degree</label>
        <p>
            <select name="degree">
                <option><?= $degree1['degree'] ?></option>
                <?php foreach ($degrees as $degree) : ?>
                    <option value="<?= $degree['id'] ?>"><?= $degree['degree'] ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
        <label>Major</label>
        <p>
            <select name="major">
                <option><?= $major1['major'] ?></option>
                <?php foreach ($majors as $major) : ?>
                    <option value="<?= $major['id'] ?>"><?= $major['major'] ?> </option>
                <?php endforeach; ?>
            </select>
        </p>
        <label>Average</label>
        <p>
            <input type="number" name="avg" placeholder="<?= $resume['aveg'] ?>">
        </p>
        <label>About</label>
        <p>
            <textarea name="about" placeholder="<?= $resume['about'] ?>"></textarea>
        </p>


        <input type="submit" name="btn">
    </form>

</div>
</body>
</html>
