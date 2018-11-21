<?php
$value_page = 2;
session_start();
include("functions/db_connect.php");
require_once("functions/users.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Поддержка</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/ie6.css" type="text/css">
    <link rel="shorcut icon" href="css/images/icon-for-browser-title.png">
</head>
<body>
<div class="shell">
    <!--Подключение хедера-->
    <?php
    include("application/header.php");
    ?>

    <!--Main content-->
    <div id="main">
        <div class="user-position">
            <p>Мы рады, что вы посетили наш <span>"Интернет-магазин мебели для дома"</span>.</p>
            <p>Если у вас возникли какие-либо проблемы, то звоните по телефону: <span>+7 800 888 70 07</span>. Мы рады
                вам помочь!</p>
            <h1>Наше местоположение:</h1>
            <br>
            <hr>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2390.0534678151294!2d44.986944655508985!3d53.198957294422776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414101ab88dba9a1%3A0xde0bb0db8fd514b3!2z0YPQuy4g0J_Rg9GI0LrQuNC90LAsIDEzNywg0J_QtdC90LfQsCwg0J_QtdC90LfQtdC90YHQutCw0Y8g0L7QsdC7LiwgNDQwMDA4!5e0!3m2!1sru!2sru!4v1494331092508"
                    width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            <br>
            <hr>
            <br>
        </div>
    </div>

    <!--Подключение футера-->
    <?php
    include("application/footer.php");
    ?>
</div>
</body>
</html>


