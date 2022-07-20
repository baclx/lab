<?php

session_start();
//unset($_SESSION['cart']);
$id = $_GET['id'];

if(empty($_SESSION['cart'][$id])) {
//    $_SESSION['cart'] = $id;
//    $_SESSION['cart'][$id] = 1;
    require 'admin/connect.php';
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $value = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $value['name'];
    $_SESSION['cart'][$id]['photo'] = $value['photo'];
    $_SESSION['cart'][$id]['price'] = $value['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
} else {
//    if(!empty($_SESSION['cart'][$id])) {
//        $_SESSION['cart'][$id]++;
//    } else {
//        $_SESSION['cart'][$id] = 1;
//    }
    $_SESSION['cart'][$id]['quantity']++;
}

//print_r($_SESSION['cart']);
echo json_encode(($_SESSION['cart']));