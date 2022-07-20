<?php
require '../check_admin_login.php'
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
$order_id = $_GET['id'];
require '../connect.php';
$sql = "select * from order_product
join products on products.id = order_product.product_id
where order_id = '$order_id'";
$result = mysqli_query($connect, $sql);
$sum = 0;
?>
<table border="1" width="100%">
    <tr>
        <th>Image</th>
        <th>Product name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    <?php foreach ($result as $value): ?>
        <tr>
            <td>
                <img height="100" src="../products/photos/<?php echo $value['photo'] ?>" alt="anh?">
            </td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['price'] ?></td>
            <td><?php echo $value['quantity'] ?></td>
            <td>
                <?php
                $result = $value['price'] * $value['quantity'];
                echo $result;
                $sum += $result;
                ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<h1>Total: <?php echo $sum ?></h1>

<a href="../orders/index.php">
    back
</a>
</body>
</html>
