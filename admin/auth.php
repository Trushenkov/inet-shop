<?php
session_start();
require_once("../functions/users.php");
$username = $_POST['username'];
$password = $_POST['password'];

if (checkUser($username, md5($password))) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("Location: index.php");
    exit;
}
if ($username != null && !checkUser($username, md5($password))) {
    $_SESSION['error'] = 1;
} elseif (!isAdmin($_SESSION['username']) && $_SESSION['username'] != null) {

    unset($_SESSION['username']);
    unset($_SESSION['password']);
    $_SESSION['error-admin'] = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Вход в Admin-панель</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<?php if ($_SESSION['error'] == 1) echo '<p style="color: red;text-align: center; font-size: 14px;">Неверный логин или пароль!</p>';
unset($_SESSION['error']);
if ($_SESSION['error-admin'] == 1) echo '<p style="color: red;text-align: center; font-size: 14px;">Вы не являетесь админом!</p>';
unset($_SESSION['error-admin']); ?>

<form id="login" method="post">
    <h1>Авторизация</h1>
    <fieldset id="inputs">
        <input id="username" name="username" type="text" placeholder="Логин" autofocus required>
        <input id="password" name="password" type="password" placeholder="Пароль" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="ВОЙТИ">
    </fieldset>
</form>
</body>
</html>
