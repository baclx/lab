<?php
    session_start();
    if(empty($_SESSION['id'])) {
        header('location:signin.php?error=Bạn chưa đăng nhập');
    }
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
    Đây là trang người dùng, chào
    <?php
        echo $_SESSION['name'];
    ?>
    <br>
    <br>
    <a href="signout.php">Đăng xuất</a>
    <br>
    <a href="index.php">Trang chủ</a>
</body>
</html>
