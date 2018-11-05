<?php

session_start();
require_once("../functions/db_connect.php");
require_once("../functions/users.php");
if (!(checkUser($_SESSION["username"], md5($_SESSION["password"])) && isAdmin($_SESSION["username"]))) {
    header("Location: auth.php");
    exit;
}
?>