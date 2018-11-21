<?php

/**
 * Функция для подключения к базе данных
 *
 * @return mysqli
 */
function connectDB()
{
    return new mysqli("localhost", "root", "", "mebel_database");
}

/**
 * Функция для проверки существования введенного username в базе данных
 *
 * @param $username - имя пользователя
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
 * @param $email - email
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
 * @param $password - пароль
 * @return int длина пароля от 3 до 20 символов
 */
function validatePassword($password)
{
    return strlen($password) > 3 && strlen($password) < 20;
}

/**
 * Функция для закрытия подключения к базе данных
 *
 * @param $mysqli
 */
function closeDB($mysqli)
{
    $mysqli->close();
}

/**
 * Функция для регистрации пользователя и записи в таблицу 'users' в базе данных
 *
 * @param $username - username
 * @param $email - email
 * @param $password - password
 */
function regUser($username, $email, $password)
{
    $link = connectDB();
    $password = md5($password);
    $result = mysqli_query($link, "INSERT INTO users (`username`,`email`,`password`) VALUES ('$username','$email','$password')");
    closeDB($link);
}

/**
 * Функция для регистрации пользователя с правами администратора
 *
 * @param $username - admin username
 * @param $email - admin email
 * @param $password - admin password
 */
function regAdmin($username, $email, $password)
{
    $link = connectDB();
    $password = md5($password);
    $result = mysqli_query($link, "INSERT INTO users (`username`,`email`,`password`,`admin`) VALUES ('$username','$email','$password','1')");
    closeDB($link);
}

/**
 * Функция для проверки введенного пароля пользователя и пароля, указанного при регистрации, хранящегося в базе данных
 *
 * @param $username - username
 * @param $password - password
 * @return bool true if passwords is same, else false
 */
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

/**
 * Функция для получения id пользователя с указанным 'username'
 *
 * @param $username - username
 * @return bool id user
 */
function getID($username)
{
    if ($username == "") return false;
    $mysqli = connectDB();
    $result = $mysqli->query("SELECT id FROM users WHERE `username`='$username'");
    $user = $result->fetch_assoc();
    return $user['id'];
}

/**
 * Функция для получения email пользователя с указанным 'username'
 *
 * @param $username - username
 * @return bool email user
 */
function getEMAIL($username)
{
    if ($username == "") return false;
    $mysqli = connectDB();
    $result = $mysqli->query("SELECT email FROM users WHERE `username`='$username'");
    $user = $result->fetch_assoc();
    return $user['email'];
}

/**
 * Функция для вывода списка всех администраторов
 *
 * @param $username - username
 * @return mixed - list of admins
 */
function isAdmin($username)
{
    $link = connectDB();
    $result = mysqli_query($link, "SELECT * FROM users WHERE `username`='$username'");
    $rows = $result->fetch_assoc();
    return $rows["admin"];
} 
