<?php

$email = $_POST['email'];
$password = $_POST['password'];

// check remember
if(isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}

require 'admin/connect.php';

$sql = "select * from customers
where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
// đếm số bản ghi
$number_rows = mysqli_num_rows($result);

if($number_rows == 1) {
    session_start();
    $value = mysqli_fetch_array($result);
    $id = $value['id'];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $value['name'];

    // cookie
    if($remember) {
        $token = uniqid('user_', true);
        $sql = "update customers
        set
        token = '$token'
        where
        id = '$id'
        ";
        mysqli_query($connect, $sql);
        setcookie('remember', $token, time() + 86400 * 30 );
    }

    header('location:user.php');
    exit();
}

header('location:signin.php?error=Đăng nhập thất bại, vui lòng đăng nhập lại');