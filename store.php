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
    <link rel="shortcut icon" type="text/css" href="css/images/icon-for-browser-title.png">
    <!--[if lte IE 6]>
    <link rel="stylesheet" href="css/ie6.css" type="text/css"><![endif]-->
</head>
<body>
<!-- Shell -->
<div class="shell">
    <?php
    $value_page = 1;
    include("application/header.php"); //Подключение хедера
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
            <div class="products-store">
                <div class="cl">&nbsp;</div>
                <ul>
                    <li><img src="css/images/products_mebel/' . $rows["image"] . '.jpg" alt="картинка" class="product-img-store" >
                        <div class="product-info-store">
                            <h3>' . $rows["product"] . '</h3>
                            <div class="product-desc-store">
                                <h4>Производитель: '. $rows['manufacturer'].'</h4>
                                <p>' . $rows["name"] . '</p>
                                <strong class="price-store">' . $rows["price"] . ' &#8381</strong>
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
            <li><span>Коллекция: </span>' . $rows["collection"] . '</li>
            <li><span>Производитель: </span>' . $rows["manufacturer"] . '</li>
            <li><span>Гарантия: </span>' . $rows["security"] . ' мес.</li> 
            <li><span>Срок службы: </span>' . $rows["life_time"] . ' год.</li>
            <li><span>Материал: </span>' . $rows["material"] . '</li>
            <li><span>Цвет: </span>' . $rows["color"] . '</li>
            <li><span>Ширина: </span>' . $rows["width"] . ' см.</li>
            <li><span>Высота: </span>' . $rows["height"] . ' см.</li>
            <li><span>Глубина: </span>' . $rows["depth"] . ' см.</li>
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
    <?php include("application/footer.php") ?> <!--Подключение футера-->
</div>
<!-- End Shell -->
</body>
</html>