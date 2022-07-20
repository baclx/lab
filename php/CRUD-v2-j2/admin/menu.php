<ul>
    <li>
        <a href="../manufucturers">
            Quản lí nhà sản xuất
        </a>
    </li>
    <li>
        <a href="../products">
            Quản lí sản phẩm
        </a>
    </li>
    <li>
        <a href="../orders">
            Quản lí đơn hàng
        </a>
    </li>
    <li>
        <a href="../root/index.php">
            Trang chủ
        </a>
    </li>
</ul>

<?php if(isset($_GET['error'])) {?>
    <span style="color: red">
            <?php echo $_GET['error'] ?>
    </span>
<?php } ?>


<?php if(isset($_GET['success'])) {?>
    <span style="color: green">
            <?php echo $_GET['success'] ?>
    </span>
<?php } ?>