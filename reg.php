<?php
session_start();
require_once("functions/users.php");
$value_page = 3;
include("functions/db_connect.php");
//Регистрация
if (isset($_POST['reg'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $bad = false;
    session_start();
    unset($_SESSION['error_username']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_password']);
    unset($_SESSION["reg_success"]);

//    if (strlen($username) < 3 || strlen($username) > 20) {
//        $_SESSION['error_username'] = 1;
//        $bad = true;
//    }
//    if (strlen($email) < 3 || strlen($email) > 32) {
//        $_SESSION['error_email'] = 1;
//        $bad = true;
//    }
//    if (strlen($password) < 6 || strlen($password) > 32) {
//        $_SESSION['error_password'] = 1;
//        $bad = true;
//    }

    if (checkLoginUser($username) > 0){
//        echo    "<p style='color: red; font-size:14px; margin-left: 36%; margin-top:0px; margin-bottom: 10px; display: inline-block;'>
//                    Этот логин  уже занят! Введите, пожалуйста, другой  логин
//                 </p>";
        $_SESSION['error_username'] = 1;
        $bad = true;
    }

    if (checkEmailUser($email) > 0){
//        echo    "<p style='color: red; font-size:14px; margin-left: 36%; margin-top: 0px; margin-bottom: 20px; display: inline-block;'>
//                    Пользователь с таким email уже существует. Введите, пожалуйста, другой email
//                 </p>";
        $_SESSION['error_email'] = 1;
        $bad = true;
    }

    if (!validatePassword($password)){
//        echo    "<p style='color: red; font-size:14px; margin-left: 36%; margin-top: 0px; margin-bottom: 20px; display: inline-block;'>
//                    Извините, длина пароля должна быть от 3 до 20 символов. Придумайте другой пароль
//                 </p>";
        $_SESSION['error_password'] = 1;
        $bad = true;
    }

    if (!$bad) {
        regUser($username, $email, $password);
        $_SESSION["reg_success"] = 1;
        header("Location: user_panel.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div class="shell">
    <?php
    include("application/header.php"); //Подключение хедера
    if ($_SESSION["error_username"] == 1) echo '<p style="text-align: center;  margin-top: 30px;"><span style="color: red">Этот логин  уже занят! Введите, пожалуйста, другой  логин</p>';
    if ($_SESSION["error_email"] == 1) echo '<p style="text-align: center;  margin-top: 30px;"><span style="color: red">Пользователь с таким email уже существует. Введите, пожалуйста, другой email</span></p>';
    if ($_SESSION["error_password"] == 1) echo '<p style="text-align: center;  margin-top: 30px;"><span style="color: red">Извините, длина пароля должна быть от 3 до 20 символов. Придумайте другой пароль</span></p>';
    echo '
        <div id="main">
            <div class="form">
                <form id="login" style="height: 270px; " name="auth" action="" method="post">
                    <h1 class="h1">Регистрация</h1>
                    <fieldset id="inputs">
                        <input id="username" name="username" type="text" placeholder="Имя пользователя" autofocus required>
                        <input id="username" name="email" type="email" placeholder="E-mail" autofocus required>
                        <input id="password" name="password" type="password" placeholder="Пароль" required>
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" name="reg" id="submit" style="width: 230px" value="ЗАРЕГИСТРИРОВАТЬСЯ">
                        <a href="user_panel.php">Авторизация</a>
                    </fieldset>
                </form>
            </div>
        </div>
        ';
    include("application/footer.php"); //Подключение футера
    ?>
</div>
</body>
</html>
