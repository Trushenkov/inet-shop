<?php
if (isset($_POST['reg'])) {
    $product = $_POST['product'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $slide = $_POST['nslideew'];
    $price = $_POST['price'];
    $collection = $_POST['collection'];
    $manufacturer = $_POST['manufacturer'];
    $security = $_POST['security'];
    $life_time = $_POST['life_time'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $depth = $_POST['depth'];

    session_start();

    $uploaddir = '../css/images/products/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    $image = basename($_FILES['image']['name']);
    $image = explode(".", $image);

    addProduct($link, $product, $name, $image, $slide, $price, $collection, $manufacturer, $security, $life_time, $material, $color, $width, $height, $depth);
    $_SESSION["reg_success"] = 1;

}
?>