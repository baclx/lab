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
<?php
    // session flash
    session_start();
    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<form method="post" action="process_signup.php">
    <h1>Form đăng kí</h1>
    Tên
    <input type="text" name="name">
    <br>
    Email
    <input type="email" name="email">
    <br>
    Mật khẩu
    <input type="password" name="password">
    <br>
    Số điện thoại
    <input type="number" name="phone_number">
    <br>
    Địa chỉ
    <input type="text" name="address">
    <br>
    <button>Đăng ký</button>
</form>
</body>
</html>
