<?php
$value_page = 3;
session_start();
include("functions/db_connect.php");
require_once("functions/users.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/ie6.css" type="text/css">
</head>
<body>
<div class="shell">
    <?php
    include("application/header.php");
    if ($_SESSION["error_auth"] == 1) {
        echo '<p style="text-align: center; margin-top: 30px;"><span style="color: red;">Неверное имя пользователя и/или пароль!</span></p>';
        unset($_SESSION["error_auth"]);
    }
    if (checkUser($_SESSION["username"], $_SESSION["password"])) {
        echo '
         <div id="main">
            <div class="user-position">
                <div class="auth">
                    <p>Здравствуйте, <span>' . $_SESSION['username'] . '</span></p>
                    <p><a href="logout.php" title="Выход">Выход</a></p>     
                </div>
                <p>Спасибо за авторизацию на сайте нашего интернет магазина продажи мебели с одноименным названием <span>
                <a href="index.php"> Интернет – магазин мебели для дома</a></span></p>
                
                <h1>Ваша контактная информация:</h1>
                <br>
                <hr>
                <h2>Имя пользователя: <span>' . $_SESSION['username'] . '</span></h2> 
                <h2>Электронная почта: <span>' . getEMAIL($_SESSION['username']) . '</span></h2>
                <br>
                <hr> 
                <p>Никому не сообщайте свой пароль в плане безопасности!</p>
                ';
        if (getPscCart($link, getID($_SESSION['username'])) > 0) {
            echo '<h1><span>У вас всё ещё остались товар(ы) в корзине!</span></h1>
                    <p>Очистите корзину или приобретите товар(ы). Для этого перейдите в <a href="cart.php?action=oneclick   ">корзину</a></p>
            ';
        } else {
            echo '<h1><span>Ваша корзина пуста! Купите товар на ваш вкус!</span></h1>';
        }
        echo '
            <br>
            </div>
        </div>';
    } else {
        echo '
        <div id = "main">
            <div class="form">
                <form id = "login" action = "login.php" method = "post">
                    <h1 class="h1"> Авторизация</h1>
                    <fieldset id = "inputs">
                        <input id = "username" name = "username" type = "text" placeholder = "Имя пользователя" autofocus required>
                        <input id = "password" name = "password" type = "password" placeholder = "Пароль" required>
                    </fieldset>
                    <fieldset id = "actions">
                        <input type = "submit" id = "submit" value = "ВОЙТИ">
                        <a href = "reg.php">Регистрация</a>
                    </fieldset>
                </form>
            </div>
        </div>
    ';
    }
    include("application/footer.php");
    ?>
</div>
</body>
</html>


