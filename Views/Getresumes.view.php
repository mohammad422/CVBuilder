<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <link href="../Css/stylesheet5.css" type="text/css" rel="stylesheet">
</head>
<body>
<div style="width:70%;border-radius:5px;margin: auto;margin-top:20px;margin-bottom: 10px; text-align: center;padding: 10px;border: 1px solid black;background-color: rgb(218, 238, 240); ">
    <h2>Resumes Review Results</h2>
    <table>
        <tr>
            <th>Applicant</th>
            <th>Public Comment</th>
            <th>Private Comment</th>
            <th>Situation</th>
        </tr>

        <?php foreach ($array1 as $value):?>
            <tr>
                <td><?= $value[0]['email'] ?></td>
                <td><?= $value[1]['comment'] ?></td>
                <td>
                    <?= $value[1]['privatecom'] ?>
                </td>
                <td><?= $value[1]['situation'] ?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
    <div class="container">
        <h2>Received Resumes</h2>
        <?php foreach ($arr1 as $resume): ?>
            <h3><button><a href="../Controllers/Selectedapplicant.controller.php?id=<?= $resume[0]['user_id'] ?>"><?= $resume[0]['email'] ?></a></button></h3>


        <?php endforeach; ?>
    </div>





</body>
</html>

