<?php
require '../check_super_admin_login.php';

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])) {
    header('location:form_insert.php?error=Phải diền đầy đủ thông tin');
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

include '../connect.php';

$sql = "insert into manufucturers(name, address, phone, photo)
values ('$name', '$address', '$phone', '$photo')";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location:index.php?success=Thêm thành công');