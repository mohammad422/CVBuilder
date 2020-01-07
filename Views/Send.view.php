<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send</title>
</head>
<style>

    body {
        margin: 0;
        padding: 0;
        background-color: rgb(39, 63, 65);
    }

    * {
        box-sizing: border-box;
    }
    table{
        width: 100%;
        background-color: white;
        text-align: center;
    }
    td, th {
        border: 1px solid black;
        width: 20%;
    }

    table, tr, td {
        border-collapse: collapse;
    }
    td{
        padding: 10px;
    }
    .container {
        width:70%;
        margin: auto;
        display: flex;
        flex-direction: column;
        background-color: rgb(218, 238, 240);
        margin-top: 10px;
        border-radius: 5%;
        padding: 3%;
    }
</style>
<body>
<div class="container">
    <table>
        <tr>
            <th>Employer</th>
            <th>comment</th>
            <th>status</th>
            <th>situation</th>
        </tr>
        <?php foreach ($arr1 as $status): ?>
            <tr>
                <td><?= $status[0]['email'] ?></td>
                <td><?= $status[1]['comment'] ?></td>
                <td>
                    <?php if ($status[1]['ip'] !== ""): ?>
                        <?= "seen" ?>
                    <?php endif; ?>
                </td>
                <td><?= $status[1]['situation'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
