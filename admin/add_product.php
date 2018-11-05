<?php
if (isset($_POST['reg'])) {
    $product = htmlspecialchars($_POST['product']);
    $name = htmlspecialchars($_POST['name']);
    $slide = htmlspecialchars($_POST['slide']);
    $price = htmlspecialchars($_POST['price']);
    $collection = htmlspecialchars($_POST['collection']);
    $manufacturer = htmlspecialchars($_POST['manufacturer']);
    $security = htmlspecialchars($_POST['security']);
    $life_time = htmlspecialchars($_POST['life_time']);
    $material = htmlspecialchars($_POST['material']);
    $color = htmlspecialchars($_POST['color']);
    $width = htmlspecialchars($_POST['width']);
    $height = htmlspecialchars($_POST['height']);
    $depth = htmlspecialchars($_POST['depth']);

    if ($slide != null && $slide != "0") $slide = 1;

    session_start();

    $uploaddir = '../css/images/products/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    $image = basename($_FILES['image']['name']);
    $image = explode(".", $image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    addProduct($link, $product, $name, $image[0], $slide, $price, $collection, $manufacturer, $security, $life_time, $material, $color, $width, $height, $depth);
    $_SESSION["reg_success"] = 1;

}
?>