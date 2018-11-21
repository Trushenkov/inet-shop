<?php
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

    if (strlen($username) < 3 || strlen($username) > 20) {
        $_SESSION['error_username'] = 1;
        $bad = true;
    }
    if (strlen($email) < 3 || strlen($email) > 32) {
        $_SESSION['error_email'] = 1;
        $bad = true;
    }
    if (strlen($password) < 6 || strlen($password) > 32) {
        $_SESSION['error_password'] = 1;
        $bad = true;

    }
    if (!$bad) {
        regAdmin($username, $email, $password);
        $_SESSION["reg_success"] = 1;
    }
}
?>