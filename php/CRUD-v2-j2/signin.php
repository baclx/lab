<?php
session_start();
if(isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    require 'admin/connect.php';
    $sql = "select * from customers 
    where token = '$token'
    limit 1";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);

    if($number_rows == 1) {
        $value = mysqli_fetch_array($result);
        $_SESSION['id'] = $value['id'];
        $_SESSION['name'] = $value['name'];
    }
}

if(isset($_SESSION['id'])) {
    header('location:user.php');
    exit();
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
<h1>Form đăng nhập</h1>
<form method="post" action="process_signin.php">
    Email
    <input type="email" name="email">
    <br>
    Password
    <input type="password" name="password">
    <br>
    Ghi nhớ đăng nhập
    <input type="checkbox" name="remember">
    <br>
    <br>
    <button>Đăng nhập</button>
</form>
</body>
</html>