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
        session_start();
        $sum = 0;
    ?>

    <?php if (empty($_SESSION['cart'])) { ?>
        <h1>Bạn chưa có j trong giỏ hàng</h1>
    <?php } else { ?>

        <?php $cart = $_SESSION['cart']; ?>

        <table border="1" width="100%">
            <tr>
                <th>Image</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($cart as $id => $value): ?>
                <tr>
                    <td>
                        <img height="100" src="admin/products/photos/<?php echo $value['photo'] ?>" alt="">
                    </td>
                    <td>
                        <a href="content_detail.php?id=<?php echo $id?>">
                            <?php echo $value['name'] ?>
                        </a>
                    </td>
                    <td><?php echo $value['price'] ?></td>
                    <td>
                        <a href="update_quantity_in_cart.php?id=<?php echo $id?>&type=decre ">
                            Trừ
                        </a>
                        <?php echo $value['quantity'] ?>
                        <a href="update_quantity_in_cart.php?id=<?php echo $id?>&type=incre ">
                            Cộng
                        </a>
                    </td>
                    <td>
                        <?php
                            $result = $value['price'] * $value['quantity'];
                            echo $result;
                            $sum += $result;
                        ?>
                    </td>
                    <td>
                        <a href="delete_from_cart.php?id=<?php echo $id ?>">
                            Gos
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

        <h3>Total: $<?php echo $sum?></h3>

        <?php
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "select * from customers where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $value = mysqli_fetch_array($result);
        ?>

        <form method="post" action="process_checkout.php">
            Tên người nhận
            <input type="text" name="name_receiver" value="<?php echo $value['name']; ?>">
            <br>
            Số điện thoại người nhận
            <input type="number" name="phone_receiver" value="<?php echo $value['phone_number']; ?>">
            <br>
            Địa chỉ người nhận
            <input type="text" name="address_receiver" value="<?php echo $value['address']; ?>">
            <br>
            <button>Đặt hàng</button>
        </form>
    <?php } ?>


    <br>
    <a href="index.php">Trang chu?</a>
</body>
</html>
