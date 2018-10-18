<?php
require_once("functions/db_request.php");
require_once("functions/users.php");

$all_price = 0;
$count = 0;
cart($link, $all_price, getID($_SESSION['username']), $count);
?>

<!--Header -->
<div class="nav-bar">
    <div class="shop_name">
        <a href="index.php">
            <img src="../css/images/icon_meta.png" alt="Логотип" class="logo">
            <img src="../css/images/1.png" alt="internet-shop" class="internet-shop">
            <img src="../css/images/2.png" alt="internet-shop2"  class="internet-shop-2">
        </a>
    </div>

    <!-- Navigation -->
    <div id="navigation">
        <ul>
            <li><a href="index.php" <?php if ($value_page == 0) {
                    echo 'class=active';
                } ?>>Домой</a></li>
            <li><a href="store.php"<?php if ($value_page == 1) {
                    echo 'class=active';
                } ?>>Магазин</a></li>
            <li><a href="support.php"<?php if ($value_page == 2) {
                    echo 'class=active';
                } ?>>Поддержка</a></li>
            <?php
            $str = "";
            if ($value_page == 3) {
                $str = '<li><a href="user_panel.php" class="active">';
            } else {
                $str = '<li><a href="user_panel.php">';
            }
            if (checkUser($_SESSION["username"], $_SESSION["password"])) {
                $str .= $_SESSION["username"] . '</a></li> ';
            } else {
                $str .= 'Войти</a></li>';
            }
            echo $str;
            ?>
        </ul>
    </div>
    <!-- End Navigation -->

    <!-- Cart -->
    <div id="cart">
        <?php if ($_SESSION["username"] != null) {
            echo '<a href="cart.php?action=oneclick" class="cart-link">Корзина</a>';
        } else {
            echo '<a onclick="alert(\'Чтобы зайти в корзину, авторизуйтесь!\')" class="cart-link">Корзина</a>';
        }
        echo '
        <div class="cl">&nbsp;</div>
        <span>Товаров: <strong>' . $count . '</strong></span>
        &nbsp;&nbsp;
        <span>Цена: <strong>' . $all_price . ' &#8381</strong></span>'; ?>
    </div>
    <!-- End Cart -->
</div>
<!-- End Header -->