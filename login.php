<?php

require_once("functions/users.php");
session_start();
$username = $_POST["username"];
$password = md5($_POST["password"]);
unset($_SESSION["error_auth"]);
if (checkUser($username, $password)) {
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
} else {
    $_SESSION["error_auth"] = 1;
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>