<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ".$_SERVER["HTTP_REFERER"]);
?>