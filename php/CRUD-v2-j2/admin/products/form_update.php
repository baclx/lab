<?php
require '../check_admin_login.php';
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
    $id = $_GET['id'];
    require '../menu.php';
    require '../connect.php';
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $value = mysqli_fetch_array($result);

    $sql = "select * from manufucturers";
    $manufucturers = mysqli_query($connect, $sql);
    ?>

    <form method="post" action="process_update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
        Name
        <input type="text" name="name" value="<?php echo $value['name'] ?>">
        <br>
        New image
        <input type="file" name="photo_new">
        <br>
        Old image
        <img src="photos/<?php echo $value['photo'] ?>" alt="anh cu" height="100">
        <input type="hidden" name="photo_old" value="<?php echo $value['photo'] ?>">
        <br>
        Price
        <input type="number" name="price" value="<?php echo $value['price'] ?>">
        <br>
        Description
        <textarea name="description"><?php echo $value['description']?></textarea>
        <br>
        Manufacturers
        <select name="manufucturer_id">
            <?php foreach ($manufucturers as $manufucturer): ?>
                <option
                 value="<?php echo $manufucturer['id'] ?>"
                 <?php if($value['manufucturers_id'] == $manufucturer['id']) { ?>
                        selected
                 <?php } ?>
                >
                    <?php echo $manufucturer['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <button>Sửa</button>
    </form>
</body>
</html>
