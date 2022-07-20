<?php
    session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .app {
            width: 100%;
            height: 700px;
        }
        .header {
            height: 20%;
            background: #ccc;
        }
        .content {
            height: 60%;
            background: #fff;
        }
        .footer {
            height: 20%;
            background: #ccc;
        }
    </style>
</head>
<body>
    <div class="app">
        <?php include 'header.php' ?>
        <?php include 'content.php' ?>
        <?php include 'footer.php' ?>
    </div>
</body>
</html>