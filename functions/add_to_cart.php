<?php
require_once("db_connect.php");
$parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

$parse = explode("?", $parse);

$parse_new = explode("=", $parse[0]);
$id = $parse_new[1];
unset($parse_new);

$parse_new = explode("=", $parse[1]);
$id_user = $parse_new[1];
unset($parse_new);

$parse_new = explode("=", $parse[2]);
$count = $parse_new[1];
unset($parse_new);
$result = mysqli_query($link, "SELECT * from cart WHERE `id_product`='$id' AND `id_user`='$id_user'");
$row = mysqli_num_rows($result);
if ($row == 0 && $count > 0) {
    $query = "INSERT INTO `cart`(id_product, id_user, count) VALUES ('$id','$id_user','$count')";
    mysqli_real_query($link, $query);
} else {
    $resultArray = $result->fetch_assoc();
    $cart_id = $resultArray["cart_id"];
    $count_products = $resultArray['count'] + $count;
    if ($count_products <= 0) {
        $query = "DELETE FROM `cart` WHERE `cart_id` = '$cart_id' AND `id_user`='$id_user'";
        mysqli_real_query($link, $query);
    } else {
        $query = "UPDATE `cart` SET `count` = ' $count_products' WHERE `cart`.`cart_id` = '$cart_id' AND `cart`.`id_user`='$id_user'";
        mysqli_real_query($link, $query);
    }
}
?>