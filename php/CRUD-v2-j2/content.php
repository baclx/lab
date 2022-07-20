<style>
    .product {
        width: 33.33%;
        border: 1px solid black;
        height: 250px;
        float: left;
    }
</style>

<?php
    require 'admin/connect.php';
    $sql = "select * from products";
    $result = mysqli_query($connect, $sql);
?>

<div class="content">
    <?php foreach ($result as $value): ?>
        <div class="product">
            <h1>
                <?php echo $value['name'] ?>
            </h1>
            <img height="50" src="admin/products/photos/<?php echo $value['photo']?>" alt="anh?">
            <p><?php echo $value['price'] ?>$</p>
            <a href="content_detail.php?id=<?php echo $value['id'] ?>">
                xem detail >>>>
            </a>
            <br>
            <?php if (!empty($_SESSION['id'])) { ?>
                <a href="add_to_cart.php?id=<?php echo $value['id'] ?>">
                    thêm vào giỏ
                </a>
            <?php } ?>
        </div>
    <?php endforeach; ?>
</div>
