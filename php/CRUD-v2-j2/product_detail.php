
<?php
$id = $_GET['id'];
require 'admin/connect.php';
$sql = "select * from products
where id = '$id'";
$result = mysqli_query($connect, $sql);
$value = mysqli_fetch_array($result);
?>

<div class="content">
    <h1>
        <?php echo $value['name'] ?>
    </h1>
    <img height="50" src="admin/products/photos/<?php echo $value['photo'] ?>" alt="anh?">
    <p><?php echo $value['price'] ?>$</p>
    <p><?php echo $value['description'] ?></p>
</div>