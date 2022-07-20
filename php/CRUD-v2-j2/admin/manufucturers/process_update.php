<?php
require '../check_super_admin_login.php';

if (empty($_POST['id'])) {
    header('location:index.php?error=Phải truyền mã để sửa');
    exit();
}
$id = $_POST['id'];

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])) {
    header("location:form_update.php?id=$id&error=Phải diền đầy đủ thông tin");
    exit();
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

include '../connect.php';

$sql = "update manufucturers
set
name = '$name$',
address = '$address',
phone = '$phone',
photo = '$photo'
where
id = '$id'";

mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if (empty($error)) {
    header('location:index.php?success=Sửa thành công');
} else {
    header('location:form_update?id=$id&error=Lỗi truy vấn');
}

