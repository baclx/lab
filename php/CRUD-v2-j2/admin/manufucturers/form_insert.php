<?php
require '../check_super_admin_login.php';
?>
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
    <?php require '../menu.php'?>

<form method="post" action="process_insert.php">
    Name
    <input type="text" name="name">
    <br>
    Address
    <textarea name="address"></textarea>
    <br>
    Phone
    <input type="text" name="phone">
    <br>
    Image
    <input type="text" name="photo">
    <br>
    <button>Add</button>
</form>
</body>
</html>
