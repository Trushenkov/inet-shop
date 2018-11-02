<?php

function connectDB()
{
    return new mysqli("localhost", "root", "", "all_notebooks");
}

/**
 * Функция для проверки существования введенного username в базе данных
 *
 * @param $username введённый username
 * @return int количество повторений введенного username
 *
 */
function checkLoginUser($username)
{
    $link = connectDB();
    $result = mysqli_query($link,"SELECT * FROM `users` WHERE `username` ='$username' ");
    return mysqli_num_rows($result);
}

/**
 * Функция для проверки существования введенного email в базе данных
 *
 * @param $email введенный email
 * @return int количество повторений введенного email
 */
function checkEmailUser($email)
{
    $link = connectDB();
    $result = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email'");
    return mysqli_num_rows($result);
}

/**
 * Функция для корректного ввода пароля. Пароль должен быть от 3 до 20 символов.
 *
 * @param $password введенный пароль
 * @return int длина пароля от 3 до 20 символов
 */
function validatePassword($password)
{
    return strlen($password) > 3 && strlen($password) < 20;
}

function closeDB($mysqli)
{
    $mysqli->close();
}

function regUser($username, $email, $password)
{
    $link = connectDB();
    $password = md5($password);
    $result = mysqli_query($link, "INSERT INTO users (`username`,`email`,`password`) VALUES ('$username','$email','$password')");
    closeDB($link);
}

function regAdmin($username, $email, $password)
{
    $link = connectDB();
    $password = md5($password);
    $result = mysqli_query($link, "INSERT INTO users (`username`,`email`,`password`,`admin`) VALUES ('$username','$email','$password','1')");
    closeDB($link);
}

function checkUser($username, $password)
{
    if (($username == "") || ($password == "")) return false;
    $mysqli = connectDB();
    $result = $mysqli->query("SELECT password FROM users WHERE `username`='$username'");
    $user = $result->fetch_assoc();
    $real_password = $user['password'];
    closeDB($mysqli);
    return $real_password == $password;
}

function getID($username)
{
    if ($username == "") return false;
    $mysqli = connectDB();
    $result = $mysqli->query("SELECT id FROM users WHERE `username`='$username'");
    $user = $result->fetch_assoc();
    return $user['id'];
}

function getEMAIL($username)
{
    if ($username == "") return false;
    $mysqli = connectDB();
    $result = $mysqli->query("SELECT email FROM users WHERE `username`='$username'");
    $user = $result->fetch_assoc();
    return $user['email'];
}

function isAdmin($username)
{
    $mysqli = connectDB();
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE `username`='$username'");
    $rows = $result->fetch_assoc();
    return $rows["admin"];
}
