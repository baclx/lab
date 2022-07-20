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
require '../connect.php';
$sql = "select
orders.*,
customers.name,
customers.phone_number,
customers.address
from orders 
join customers
on customers.id = orders.customer_id";
$result = mysqli_query($connect, $sql);
?>
<table border="1" width="100%">
    <tr>
        <th>Mã</th>
        <th>Thời gian đặt</th>
        <th>Thông tin người nhận</th>
        <th>Thông tin người đặt</th>
        <th>Trạng thái</th>
        <th>Tổng tiền</th>
        <th>Xem</th>
        <th>Hủy</th>
    </tr>
    <?php foreach ($result as $value): ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['created_at']; ?></td>
            <td>
                <?php echo $value['name_receiver']; ?><br>
                <?php echo $value['phone_receiver']; ?><br>
                <?php echo $value['address_receiver']; ?><br>
            </td>
            <td>
                <?php echo $value['name']; ?><br>
                <?php echo $value['phone_number']; ?><br>
                <?php echo $value['address']; ?><br>
            </td>
            <td>
                <?php
                    switch ($value['status']) {
                        case '0':
                            echo 'mới đặt';
                            break;
                        case '1':
                            echo 'đã duyệt';
                            break;
                        case '2':
                            echo 'đã hủy';
                            break;
                    }
                ?>
            </td>
            <td><?php echo $value['total_price']; ?></td>
            <td>
                <a href="detail.php?id=<?php echo $value['id'] ?>">
                    Xem
                </a>
            </td>
            <td>
                <?php if ($value['status'] == 0) {?>
                    <a href="update.php?id=<?php echo $value['id'] ?>&status=1">
                        Duyệt
                    </a>
                    <br>
                    <a href="update.php?id=<?php echo $value['id'] ?>&status=2">
                        Hủy
                    </a>
                <?php } ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
