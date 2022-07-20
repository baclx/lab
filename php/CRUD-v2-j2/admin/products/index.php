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
    $sql = "select 
    products.*,
    manufucturers.name as manufucturer_name
    from products 
    join manufucturers 
    on products.manufucturers_id = manufucturers.id ";
    $result = mysqli_query($connect, $sql);
    ?>
    <h1>Quản lí sản phẩm</h1>

    <a href="form_insert.php">Add</a>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Nhà sản xuất</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $value): ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td>
                    <img height="100" src="photos/<?php echo $value['photo']?>" alt="anh">
                </td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['manufucturer_name'] ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $value['id'] ?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $value['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
