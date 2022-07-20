<?php
require '../check_admin_login.php';

$name = $_POST['name'];
$photo = $_FILES['photo'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufucturer_id = $_POST['manufucturer_id'];

//print_r($photo);
//die();
// handle file
$folder = 'photos/';
$file_extension = explode('.', $photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
//die($path_file);

move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into products(name, photo, price, description, manufucturers_id)
values ('$name', '$file_name', '$price', '$description', '$manufucturer_id')";

mysqli_query($connect,$sql);
mysqli_close($connect);