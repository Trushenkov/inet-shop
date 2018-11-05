<!-- Main -->
<div id="main">
    <div class="cl">&nbsp;</div>
    <?php
    if ($_SESSION["reg_success"] == 1) {
        echo '<p style="text-align: center; font-size: 16px; padding-bottom: 20px;"><span style="color: green">Совершен вход в аккаунт! <a href="index.php">Обновите </a>страницу</span></p>';
        unset($_SESSION["reg_success"]);
    }
    ?>
    <!-- Content -->
    <div id="content">

        <!--ТУТ БЫЛ ИНКЛЮДЕ СЛАЙДЕРА-->
        <!-- Products -->
        <div class="products box">
            <div class="cl">&nbsp;</div>
            <ul>
                <?php
                require_once("functions/db_request.php");
                $search = $_GET["search"];
                $product = $_GET["product"];
                $min = $_GET["min"];
                $max = $_GET["max"];
                $sort = $_GET["sort"];

                $result = sidebarResult($link, $search, $product, $min, $max, $sort);
                $index = 1;
                if (mysqli_num_rows($result) > 0) {
                    // Выбирает одну из результирующего набора и помещает ее в ассоциативный массив.
                    $rows = mysqli_fetch_array($result);
                    do {
                        if ($index % 3 == 0) {
                            echo '<li class="last">';
                        } else {
                            echo '<li>';
                        }
                        $index++;
                        echo '
                        <a>
                    <a href="store.php?id=' . $rows["id"] . '"><img class="image-product" src="css/images/products_mebel/' . $rows["image"] . '.jpg" alt=""></a>
                                            
                    <div class="product-info">
                  
                            <h3>' . $rows["product"] . '</h3>
                            <div class="product-desc">
                                <h4>Производитель: '. $rows['manufacturer'].'</h4>
                                <p>' . $rows["name"] . '</p>
                                <strong class="price">' . $rows["price"] . ' &#8381</strong>
                            </div>
                        </div>
                        
                        
                    <div class="cart-product">
                        <div class="id-product">'. $rows["id"] . '</div>
                        <div class="id-user">'.getID($_SESSION['username']).'</div>
                                <input type="number" class="cart-number" min="1" max="10" value="1" name="count_tovar">
                                ';
                        if($_SESSION["username"]!=null){
                            echo'
                            <a class="cart-submit">Добавить в корзину!<img src="css/images/cart.png" alt="Иконка корзины" class="add-cart-image"></a>';
                        }else{
                            echo '<a id="cart-submit" onclick="alert(\'Чтобы заказать товар, авторизуйтесь!\')">Добавить в корзину!<img src="css/images/cart.png" alt="Иконка корзины" class="add-cart-image"></a>';
                        }
                        echo '
                    </div>
                </li>';
                    } while ($rows = mysqli_fetch_array($result));
                } else {
                    echo '
                    <h1 align="center">По запросу ничего не найдено!</h1>';
                }
                ?>
            </ul>
            <div class="cl">&nbsp;</div>
        </div>
        <!-- End Products-->

    </div>
    <!-- End Content -->
    <?php
    include("application/sidebar.php");
    ?>

    <div class="cl">&nbsp;</div>
</div>
<!-- End Main -->

<!-- Side Full -->
<div class="side-full">
    <!-- Text Cols -->
    <div class="cols">
        <div class="cl">&nbsp;</div>
        <div class="col">
            <h3 class="ico ico1">Авиапочта</h3>
            <p>Посылка прибудет в пункт назначения в целостности и сохранности!</p>
            <p class="more"><a href="support.php" class="bul">Подробнее</a></p>
        </div>
        <div class="col">
            <h3 class="ico ico2">Телефон</h3>
            <p>По вопросам обращайтесь по телефону: <br> +7 937 421 20 72</p>
            <p class="more"><a href="support.php" class="bul">Подробнее</a></p>
        </div>
        <div class="col">
            <h3 class="ico ico3">Посылка</h3>
            <p>Благодаря нашей почтой, мы доставим вашу посылку как можно быстрее!</p>
            <p class="more"><a href="support.php" class="bul">Подробнее</a></p>
        </div>
        <div class="col col-last">
            <h3 class="ico ico4">Корзина</h3>
            <p>На нашем сайте, механизм добавления товара и осуществления заказа очень прост!</p>
            <?php
            if($_SESSION["username"]!=null){
                echo'<p class="more"><a href="cart.php?action=oneclick" class="bul">Подробнее</a></p>';
            }else{
                echo '<p class="more"><a onclick="alert(\'Чтобы зайти в корзину, авторизуйтесь!\')" class="bul">Подробнее</a></p>';
            }
            ?>
        </div>
        <div class="cl">&nbsp;</div>
    </div>
    <!-- End Text Cols -->
</div>
<!-- End Side Full -->
<script type="text/javascript" src="js/script.js"></script>
<?php
include("application/footer.php");
?>