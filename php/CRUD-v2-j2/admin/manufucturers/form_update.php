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
    <?php
        if(empty($_GET['id'])) {
            header('location:index.php?error=Phải truyền mã để sửa');
        }
        $id = $_GET['id'];
        require '../menu.php';
        require '../connect.php';

        $sql = "select * from manufucturers
        where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $number_row = mysqli_num_rows($result);
        if($number_row === 1) {
            $value = mysqli_fetch_array($result);
    ?>

<form method="post" action="process_update.php">
    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
    Name
    <input type="text" name="name" value="<?php echo $value['name'] ?>">
    <br>
    Address
    <textarea name="address"><?php echo $value['address'] ?></textarea>
    <br>
    Phone
    <input type="text" name="phone" value="<?php echo $value['phone'] ?>">
    <br>
    Image
    <input type="text" name="photo" value="<?php echo $value['photo'] ?>">
    <br>
    <button>Sửa</button>
</form>

<?php } else { ?>
        <h1>Not found id</h1>
<?php } ?>
</body>
</html>
