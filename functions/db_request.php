<?php

require_once("clear_string.php");

/**
 * Функция для выполнения запроса для вывода всех данных из таблицы 'products'
 *
 * @param $link
 * @return bool|mysqli_result
 */
function allRequest($link)
{
    return mysqli_query($link, "SELECT * FROM `products` WHERE 1");
}


/**
 * Функция для
 *
 * @param $link
 * @param $rows
 * @return int
 */
function numProducts($link, $rows)
{

    $result = mysqli_query($link, "SELECT * FROM `products` WHERE `product` LIKE '$rows'");
    return mysqli_num_rows($result);
}

/**
 * Функция для формирования
 *
 * @param $link
 * @param $array2
 */
function checkCategories($link, &$array2)
{
    $result = allRequest($link);
    $array[] = array();
    $array2[] = array();
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($rows = mysqli_fetch_array($result)) {
            $array[$i] = $rows["product"];
            $i++;
        }
    }
    $array[] = clear_string(sort($array, SORT_STRING));

    $array2[0] = $array[0];
    $i = 0;
    while ($array2[$i] != $array[count($array) - 2]) {
        for ($j = $i + 1; $j < count($array) - 1; $j++) {
            if ($array2[$i] != $array[$j]) {
                $i++;
                $array2[$i] = $array[$j];
            }
        }
    }
}

/**
 * Функция для вывода цены товара
 *
 * @param $link
 * @param $value
 * @return mixed
 */
function price($link, $value)
{
    $result = mysqli_query($link, "SELECT $value(price) FROM `products`");
    $rows = mysqli_fetch_array($result);
    return $rows["$value(price)"];
}

/**
 * Функция для выборки всех данных из таблицы 'products'
 *
 * @return данные из таблицы x"products"
 */
function select()
{
    return "SELECT * FROM `products` ";
}

/**
 * Функция для работы input-поля для поиска товара на главной странице в сайдбаре
 *
 * @param $firstValue
 * @param $secondValue
 * @param $thirdValue
 * @param $sign
 * @return string
 */
function search_request($firstValue, $secondValue, $thirdValue, $sign)
{
    $request = "WHERE (`product` LIKE '%$firstValue%' $sign `name` LIKE '%$secondValue%')";;
    if ($thirdValue != null) {
        $request .= " AND `name` LIKE '%$thirdValue%'";
    }
    return $request;
}

/**
 * Функция для
 *
 * @param $search
 * @return bool|mysqli_result|null|string
 */
function searchProcessing($search)
{
    global $result;
    if ($search != null) {
        $array = explode(" ", $search);
        switch (count($array)) {
            case 1: {
                $result = search_request($array[0], $array[0], null, "OR");
                break;
            }
            case 2: {
                $result = search_request($array[0], $array[1], null, "AND");
                break;
            }
            case 3: {
                $result = search_request($array[0], $array[1], $array[2], "AND");
                break;
            }
            default:
                $result = null;
        }
        return $result;
    }
}

/**
 * Функция для формирования части запроса для поиска товара в пределах заданного диапозона цены
 *
 * @param $min минимальная цена
 * @param $max максимальная цена
 * @param $flag
 * @return string товары, в пределах заданного диапазона цены
 */
function priceProcessing($min, $max, $flag)
{
    if ($flag) {
        return " AND `price` >= $min AND `price` <= $max";
    } else {
        return "WHERE `price` >= $min AND `price` <= $max";
    }
}

/**
 * Функция, используемая для сортировки
 *
 * @param $sort вид сортировки
 * @return string строка запроса для сортировки
 */
function sortProcessing($sort)
{
    if ($sort == "min") {
        return " ORDER BY `products`.`price` ASC";
    } else {
        return " ORDER BY `products`.`price` DESC";
    }
}

/**
 * Функция для работы сайдбара
 *
 * @param $link
 * @param $search
 * @param $product
 * @param $min
 * @param $max
 * @param $sort
 * @return bool|mysqli_result
 */
function sidebarResult($link, $search, $product, $min, $max, $sort)
{
    if ($search == null && $product == null && $sort == null && $min == null && $max == null) {
        return mysqli_query($link, select() . " WHERE `new` = 1" . sortProcessing("max"));
    } elseif ($search != null && $product != null && $sort != null) {
        return mysqli_query($link, select() . searchProcessing($search) . priceProcessing($min, $max, true) . sortProcessing($sort));
    }
    if ($min == null && $max == null) {
        $min = price($link, "MIN");
        $max = price($link, "MAX");
    }
    if ($search != null && $product == null && $min == null && $max == null && $sort == null) {
        return mysqli_query($link, select() . searchProcessing($search));
    } elseif ($product != null && $sort != null && $search == null) {
        return mysqli_query($link, select() . searchProcessing($product) . priceProcessing($min, $max, true) . sortProcessing($sort));
    } elseif ($search == null && $product == null && $sort == null) {
        return mysqli_query($link, select() . priceProcessing($min, $max, false));
    } elseif ($sort != null && $search == null && $product == null) {
        return mysqli_query($link, select() . priceProcessing($min, $max, false) . sortProcessing($sort));
    } elseif ($search == null && $sort == null && $product != null) {
        return mysqli_query($link, select() . searchProcessing($product) . priceProcessing($min, $max, true));
    } elseif ($search != null && $product == null && $sort == null) {
        return mysqli_query($link, select() . searchProcessing($search) . priceProcessing($min, $max, true));
    } elseif ($search != null && $sort != null && $product == null) {
        return mysqli_query($link, select() . searchProcessing($search) . priceProcessing($min, $max, true) . sortProcessing($sort));
    } elseif ($search != null && $product != null && $sort == null) {
        return mysqli_query($link, select() . searchProcessing($search) . priceProcessing($min, $max, true));
    }
}

/**
 * Функция для отображения корзины пользователя в headere
 *
 * @param $link
 * @param $all_price цена всех товаров в корзине
 * @param $id_user id пользователя
 * @param $count количество товара в корзине
 *
 */
function cart($link, &$all_price, $id_user, &$count)
{
    $result = mysqli_query($link, "SELECT * FROM `cart`,`products` WHERE products.id = cart.id_product AND cart.id_user='$id_user'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        do {
            $count = $count + $row["count"];
            $int = $row["price"] * $row["count"];
            $all_price = $all_price + $int;
        } while ($row = mysqli_fetch_array($result));
    } else {
        $count = 0;
    }
}


/**
 * Функция для вывода количества товара в корзине пользователя
 *
 * @param $link
 * @param $id_user
 * @return int количество товара в корзине пользователя
 */
function getPscCart($link, $id_user)
{
    return mysqli_num_rows(mysqli_query($link, "SELECT * FROM `cart`,`products` WHERE products.id = cart.id_product AND cart.id_user='$id_user'"));
}

/**
 * Функция для вывода всех товаров из базы данных на страницу сайта "Магазин"
 *
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
function store($link, $id)
{
    if ($id == null) return mysqli_query($link, "SELECT * FROM `products` WHERE 1");
    else return mysqli_query($link, "SELECT * FROM `products` WHERE `id`='$id'");
}
/**
 * Функция для
 *
 * @param $link
 * @param $table_db
 * @return bool|mysqli_result
 */
function numDB($link, $table_db)
{
    return mysqli_query($link, "SELECT * FROM $table_db WHERE 1");
}

/**
 * Функция для удаления строки из таблицы 'products'
 *
 * @param $link
 * @param $table_db
 * @param $id
 */
function deleteStrProducts($link, $table_db, $id)
{
    $query = "DELETE FROM `$table_db` WHERE `id` = '$id'";
    mysqli_real_query($link, $query);
}

/**
 * Функция для удаления строки из таблицы 'cart'
 *
 * @param $link
 * @param $table_db
 * @param $id
 */
function deleteStrCart($link, $table_db, $id)
{
    $query = "DELETE FROM `$table_db` WHERE `cart_id` = '$id'";
    mysqli_real_query($link, $query);
}


/**
 * Функция для добавления товара в таблицу 'products'
 *
 * @param $link
 * @param $product
 * @param $name
 * @param $image
 * @param $slide
 * @param $new
 * @param $price
 * @param $display
 * @param $display_size
 * @param $CPU
 * @param $frequency
 * @param $RAM
 * @param $memory
 * @param $GPU
 * @param $other
 */
function addProduct($link, $product, $name, $image, $slide, $new, $price, $display, $display_size, $CPU, $frequency, $RAM, $memory, $GPU, $other)
{
    $result = mysqli_query($link, "INSERT INTO products (`product`,`name`,`image`,`slide`,`new`,`price`,`display`,`display_size`,`CPU`,`frequency`,`RAM`,`memory`,`GPU`,`other`) VALUES 
('$product','$name','$image','$slide','$new','$price','$display','$display_size','$CPU','$frequency','$RAM','$memory','$GPU','$other')");
}