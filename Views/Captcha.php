<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="../Controllers/Captcha.controller.php">
  <!--  <?php /*if ($capRand == 0) : */?>
    <p><?/*=  $randomstring1*/?></p>
    <input type="text" name="captcha">
    <?php /*elseif ($capRand == 1): */?>
    <?/*= $ran1."+".$ran2 */?>
        <input type="text" name="captcha">
    <?php /*else: */?>
    which one is the capital of <?/*= $country */?>
    <input type="radio" name="captcha" value="Beirut">Beirut
        <input type="radio" name="captcha" value="Moscow">Moscow
        <input type="radio" name="captcha" value="<?/*=  $capital */?> "><?/*= $capital */?>
        <input type="radio" name="captcha" value="Kabul">Kabul
    --><?php /*endif; */?>
    [اگر جواب عددی است لطفا به عدد بنویسید]
    <input type="text" value="<?= $captcha ?>" disabled>
    <input type="submit" name="btn">
</form>
<?php if (isset($_POST['btn'])) :?>
<?= $_SESSION['error']  ?>
<?php endif; ?>
</body>
</html>
