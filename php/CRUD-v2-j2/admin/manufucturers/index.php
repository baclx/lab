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
    Đây là khu vực nhà sản xuất
    <a href="form_insert.php">Add</a>

    <?php
    require '../menu.php';
    require '../connect.php';
    $sql = "select * from manufucturers";
    $result = mysqli_query($connect, $sql);
    ?>

    <table border="1" width="100%">
        <tr>
            <th>Ma</th>
            <th>Ten</th>
            <th>Dia chi</th>
            <th>SDT</th>
            <th>Anh?</th>
            <th>Sua</th>
            <th>Xoa</th>
        </tr>
        <br>
        <?php foreach ($result as $value): ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td>
                    <img height="100" src="<?php echo $value['photo']?>" alt="anh?">
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $value['id']?>">
                        Sua
                    </a>
                </td>
                <td>
                    <a style="margin: 0 10px" href="delete.php?id=<?php echo $value['id']?>">
                        Xoa
                    </a>
                </td>
            </tr>
            <br>
        <?php endforeach ?>
    </table>

</body>
</html>
