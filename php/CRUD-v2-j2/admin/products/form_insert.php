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
    require '../menu.php';
    require '../connect.php';
    $sql = "select * from manufucturers";
    $result = mysqli_query($connect, $sql);
    ?>

    <form method="post" action="process_insert.php" enctype="multipart/form-data">
        Name
        <input type="text" name="name">
        <br>
        Image
        <input type="file" name="photo">
        <br>
        Price
        <input type="number" name="price">
        <br>
        Description
        <textarea name="description"></textarea>
        <br>
        Manufacturers
        <select name="manufucturer_id">
            <?php foreach ($result as $value): ?>
                <option value="<?php echo $value['id'] ?>">
                    <?php echo $value['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <button>Add</button>
    </form>
</body>
</html>
