<?php
session_start();
require_once("functions/db_connect.php"); //Подключение скрипта для подключения к БД
require_once("functions/db_request.php"); //Подключение скрипта с запросами к БД
require_once("functions/users.php"); //Подключение скрипта с запросами к таблице 'users' в БД

$value_page = 5;
$action = $_GET["action"];
$id_user = getID($_SESSION['username']);

switch ($action) {
    case 'clear':
        $clear = mysqli_query($link, "DELETE FROM `cart` WHERE cart_id AND `id_user`='$id_user'");
        header("Location: cart.php?action=oneclick");
        break;
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Корзина товаров</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="shorcut icon" type="text/css" href="css/images/icon-for-browser-title.png">
</head>
<body>
<!-- Shell -->
<div class="shell">
    <?php
    include("application/header.php") //Подключение хедера
    ?>
    <div id="main">
        <div class="cl">&nbsp;</div>
        <?php
        switch ($action) {
            case 'oneclick':
                echo '
        <div class = "style-cart">
            <div class = "style-step">
                <ul>
                    <li><a class = "active">1. Просмотр товаров</a></li>
                    <li><span>&rarr;</span></li>
                    <li><a>2. Контактная информация</a></li>
                    <li><span>&rarr;</span></li>
                    <li><a>3. Подтверждение</a></li>
                </ul>
            </div>
            <div class="step-and-cart-delete">
                <p class="step">Шаг 1 из 3</p>
                <a class="cart-delete" href="cart.php?action=clear">Удалить всё</a>
            </div>
            <hr>
            ';
                $result = mysqli_query($link, "SELECT * FROM `cart`,`products` WHERE products.id = cart.id_product AND cart.id_user='$id_user'");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    echo '
            <div class="block-list">
                <div class="picture">
                    <p align="center">Изображение</p>
                </div>
                <div class="product-name" align="center">
                    <p>Наименование</p>
                </div>
                <div class="amount" align="center">
                    <p>Количество</p>
                </div>
                <div align="center" class="price-name">
                    <p>Цена</p>
                </div>
            </div>
            ';
                    $all_price = 0;
                    $i = 0;
                    do {
                        $all_price += $row["price"] * $row["count"];
                        global $arrayProducts;
                        global $arrayCount;
                        $_SESSION["products" . $i] = $row["product"] . " " . $row["name"];
                        $_SESSION["counts" . $i] = $row["count"];
                        if ($i + 1 == mysqli_num_rows($result)) {
                            $_SESSION["index"] = $i + 1;

                        }
                        $i++;
                        echo '
            <div class="block-list-cart">
                <div class="img-cart">
                    <p align="center"><img src="css/images/products_mebel/' . $row["image"] . '.jpg"></p>
                </div>
                <div class="name">
                    <p align="center">' . $row["product"] . " " . $row["name"] . '</p>
                </div>
                <div class="count_products" >
                    <p align="center">' . $row["count"] . ' шт.</p>
                </div>

                <div class="price-cart">
                    <p align="center"><span>' . $row["count"] . '</span> x <span>' . $row["price"] . ' &#8381</span>
                    <p align="center">' . $row["price"] * $row["count"] . ' &#8381</p>
                </div>
                <div class="delete-product-cart">
                    <div class="id-product">' . $row["id_product"] . '</div>
                    <div class="id-user">' . $row["id_user"] . '</div>
                    <input class="cart-number" type="text" name="count" value="-1"><a href="cart.php?action=oneclick" class="cart-remove"><img align="center" src = "css/images/delete.png"></a>
                </div>
            </div>
            ';
                    } while ($row = mysqli_fetch_array($result));
                    echo '
            <p class="total">Общая стоимость: <span class="active">' . $all_price . ' &#8381</span></p>
            <p class="cart-next"><a href="cart.php?action=confirm" class="cart-next">Далее</a>
                ';
                } else {
                    echo '<div class="null-cart" style="height: 200px">
            <p><img src="css/images/null-cart.png">
            <p style="padding-top: 15px">Корзина пуста!</p>
        </div>
        ';
                }
                break;
            case 'confirm':
                echo '
                <div class = "style-cart">
					<div class = "style-step">
						<ul>
							<li><a href="cart.php?action=oneclick">1. Просмотр товаров</a></li>
                            <li><span>&rarr;</span></li>
                            <li><a class = "active">2. Контактная информация</a></li>
                            <li><span>&rarr;</span></li>
                            <li><a>3. Подтверждение</a></li>
							</ul>
					</div>
					<div class="step-and-cart-delete">
						<p class="step">Шаг 2 из 3</p>
					</div>
					<hr>
				';
                echo '
				<p class="header-contact">Способ отправки:</p>
				<form action="cart.php?action=completion" method="post">
				    <div class="form-radio">
				        <ul>
				            <li><label><input name="delivery" required type="radio" value="Почтой">Почтой</label></li>
				            <li><label><input name="delivery" required type="radio" value="Курьером">Курьером</label></li>
				            <li><label><input name="delivery" required type="radio" value="Самовывозом">Самовывозом</label></li>
				        </ul>
				    </div>
				    <p class="header-contact">Контактная информация:</p>
				    <div class="form-radio" id="form-text">
				        <label>ФИО &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="input" value="' . $_SESSION["full_name"] . '" required name="full_name" placeholder="например: Трушенков Дмитрий Сергеевич"></label><br>
				        <label>E-mail &nbsp;<input type="email" class="input" name="e_mail" required value="' . getEMAIL($_SESSION['username']) . '" placeholder="например: job@moedelo.org"></label><br>
				        <label>Телефон <input type="number" class="input" name="phone" required value="' . $_SESSION["phone"] . '" placeholder="например: 89374452931"></label><br>
				        <label>Адрес &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" required value="' . $_SESSION["address"] . '" class="input" name="address" placeholder="например: Пенза, ул. Кирова 9"></label><br>
				        <label>Почтовый индекс <input type="number" class="input" name="postcode" required value="' . $_SESSION["postcode"] . '" placeholder="например: 440528"></label><br>
				     </div>
				   <input class="send" id="send-next" type="submit" value="Далее"><br>   
				    <br>
				</form>				   
            
            ';
                break;
            case 'completion':
                if (isset($_POST["delivery"])) {
                    $_SESSION["delivery"] = $_POST["delivery"];
                    $_SESSION["full_name"] = $_POST["full_name"];
                    $_SESSION["e_mail"] = $_POST["e_mail"];
                    $_SESSION["address"] = $_POST["address"];
                    $_SESSION["phone"] = $_POST["phone"];
                    $_SESSION["postcode"] = $_POST["postcode"];
                }
                echo '
					<div class = "style-cart">
					    <div class = "style-step">
						<ul>
							<li><a href="cart.php?action=oneclick">1. Просмотр товаров</a></li>
							<li><span>&rarr;</span></li>
							<li><a href="cart.php?action=confirm">2. Контактная информация</a></li>
							<li><span>&rarr;</span></li>
							<li><a class="active">3. Подтверждение</a></li>
							</ul>
					</div>
					<div class="step-and-cart-delete">
						<p class="step">Шаг 3 из 3</p>
					</div>
					<hr>
					<br>
					<p class="header-contact">Подтвердите данные, введеные вами ранее! </p>
					<br>
					<br>
					<div class="form-radio">
					    <p><b>Способ отправки: </b>' . $_SESSION["delivery"] . '</p><br>
				        <p><b>ФИО:</b> ' . $_SESSION["full_name"] . ' </p><br>
				        <p><b>E-mail: </b>' . $_SESSION["e_mail"] . ' </p><br>
				        <p><b>Адрес: </b>' . $_SESSION["address"] . ' </p><br>
				        <p><b>Телефон: </b>' . $_SESSION["phone"] . ' </p><br>
				        <p><b>Почтовый индекс: </b>' . $_SESSION["postcode"] . ' </p><br>
				    </div>
                    <a class="send" href="cart.php?action=check">Отправить</a>
                    <br>
                    <br>
                    ';
                break;
            case 'check': {
                $username = $_SESSION["username"];
                $delivery = $_SESSION["delivery"];
                $full_name = $_SESSION["full_name"];
                $email = $_SESSION["e_mail"];
                $address = $_SESSION["address"];
                $phone = $_SESSION["phone"];
                $postcode = $_SESSION["postcode"];

                $all_product = "";
                $index = (int)$_SESSION["index"];
                for ($i = 0; $i < $index; $i++) {
                    if ($i == 0) {
                        $all_product .= "<b>" . $_SESSION["products" . $i] . "</b>" . " " . "<b>" . $_SESSION["counts" . $i] . " шт." . "</p><br>";
                    } else {
                        $all_product .= "<p><b>" . $_SESSION["products" . $i] . "</b>" . " " . "<b>" . $_SESSION["counts" . $i] . " шт." . "</p><br>";
                    }
                    unset($_SESSION["products" . $i]);
                    unset($_SESSION["counts" . $i]);
                    unset($_SESSION["index"]);
                }

                unset($_SESSION['delivery']);
                unset($_SESSION['full_name']);
                unset($_SESSION['e_mail']);
                unset($_SESSION['address']);
                unset($_SESSION['phone']);
                unset($_SESSION['postcode']);

                $email_seller = "diman28051999@gmail.com";
                $subject = "Заказ мебели из магазина \" Интернет-магазин мебели для дома\"";
                $message = "               
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <p>Заказ от <b>$username</b></p>
    <br>
    <p>Продукты: $all_product
    <p>Способ отправки: <b>$delivery</b></p>
    <br>
    <p>ФИО: <b>$full_name</b></p>
    <br>
    <p>E-mail: <b>$email</b></p>
    <br>
    <p>Пункт назначения: <b>$address</b></p>
    <br>
    <p>Телефон: <b>$phone</b></p>
    <br>
    <p>Почтовый индекс: <b>$postcode</b></p>
    <br>
    </body>
    </html>
    ";

                // заголовок письма
                $headers = "MIME-Version: 1.0\r\n";
                // кодировка письма
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                // отправляем письмо
                $result = mail($email_seller, $subject, $message, $headers);
                // результат отправки письма
                if ($result) {
                    echo '
                <div class="style-cart">
                    <div class="null-cart">
                        <p style="padding-top: 80px;"><img src="css/images/check.png">
                        <p style="padding-top: 20px; height: 200px;">Заказ успешно отправлен продавцу!</p>
                        <script type="text/javascript">
                            setTimeout(\'location.replace("cart.php?action=clear")\', 2000);
                        </script>
                    </div>
                </div>
                ';
                } else {
                    echo "Произошла ошибка! Обратитесь в службу поддержки!";
                }
            }
            break;
        }
        ?>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
<?php include("application/footer.php") ?> <!--Подключение футера-->
</div>
<!-- End Shell -->
</body>
</html>