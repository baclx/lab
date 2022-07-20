<?php

$email = $_POST['email'];
$password = $_POST['password'];

require 'connect.php';

$sql = "select * from admin where email = '$email' and password = '$password'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    $value = mysqli_fetch_array($result);
    session_start();
    $_SESSION['id'] = $value['id'];
    $_SESSION['name'] = $value['name'];
    $_SESSION['level'] = $value['level'];

    header('location:root/index.php');
    exit();
}

header('location:index.php');