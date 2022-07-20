<div class="header">
    <ul>
        <li>
            <a href="index.php">
                Trang chủ
            </a>
        </li>

        <?php if(empty($_SESSION['id'])) { ?>
            <li>
                <a href="signin.php">
                    Đăng nhập
                </a>
            </li>
            <li>
                <a href="signup.php">
                    Đăng ký
                </a>
            </li>
        <?php } else { ?>
            <li>
                chào <?php echo $_SESSION['name'] ?>
                <br>
                <a href="signout.php">
                    Đăng xuất
                </a>
            </li>
            <br>
            <li>
                <a href="view_cart.php">view cart</a>
            </li>
        <?php } ?>
    </ul>
</div>
