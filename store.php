<?php
session_start();
require_once("functions/db_connect.php");
require_once ("functions/users.php");
$id_user = $_SESSION["username"];
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!--[if lte IE 6]>
    <link rel="stylesheet" href="css/ie6.css" type="text/css"><![endif]-->
</head>
<body>
<!-- Shell -->
<div class="shell">
    <?php
    $value_page = 1;
    include("application/header.php");
    ?>
    <div id="main">
        <div class="cl">&nbsp;</div>
        <?php
        require_once("functions/db_request.php");
        $id = $_GET["id"];
        $result = store($link, $id);
        if (mysqli_num_rows($result) > 0) {
            // Выбирает одну из результирующего набора и помещает ее в ассоциативный массив.
            $rows = mysqli_fetch_array($result);
            do {
                echo '
        <div id="content-notebooks">
            <div class="products">
                <div class="cl">&nbsp;</div>
                <ul>
                    <li><img src="css/images/products/' . $rows["image"] . '.jpg" alt="">
                        <div class="product-info">
                        
                            <h3>' . $rows["product"] . '</h3>
                            <div class="product-desc">
                                <h4>Ноутбук</h4>
                                <p>' . $rows["name"] . '</p>
                                <strong class="price">' . $rows["price"] . ' &#8381</strong>
                            </div>
                            <div class="cart-product-store">
                                <div class="id-user">' . getID($id_user) . '</div>
                                <div class="id-product">' . $rows["id"] . '</div>
                                <input type="number" class="cart-number" min="1" max="10" value="1" name="count_tovar">';

                if ($_SESSION["username"] != null) {
                   echo ' <a class="cart-submit">Добавить в корзину!<img src="css/images/cart.png" alt="Иконка корзины" class="add-cart-image" class="add-cart-image"></a>';
                } else {
                    echo '<a id="cart-submit" onclick="alert(\'Чтобы заказать товар, авторизуйтесь!\')">Добавить в корзину!<img src="css/images/cart.png" class="add-cart-image"></a>';
                }
                echo '
                        </div>
                    </li>
                   </ul>
             <div class="cl">&nbsp;</div>
            </div>

    <div class="description">
        <ul>
            <li><span>Дисплей: </span>' . $rows["display"] . '</li>
            <li><span>Разрешение экрана: </span>' . $rows["display_size"] . '</li>
            <li><span>Процессор: </span>' . $rows["CPU"] . '</li>
            <li><span>Частота процессора: </span>' . $rows["frequency"] . '</li>
            <li><span>Оперативная память: </span>' . $rows["RAM"] . '</li>
            <li><span>Память </span>' . $rows["memory"] . '</li>
            <li><span>Видеокарта: </span>' . $rows["GPU"] . '</li>
            <li><span>Другие: </span>' . $rows["other"] . '</li>
        </ul>
    </div>
</div>';
            } while ($rows = mysqli_fetch_array($result));
        } else {
            echo '
                    <h1 align="center">По запросу ничего не найдено!</h1>';
        }
        ?>
        <script type="text/javascript" src="js/script.js"></script>
    </div>
    <?php include("application/footer.php") ?>
</div>
<!-- End Shell -->
</body>
</html>