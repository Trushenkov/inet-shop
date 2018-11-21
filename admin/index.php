<?php
session_start();

require_once("start.php");
require_once("../functions/db_request.php");
require_once("../functions/db_connect.php");
$action = $_GET["action"];

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Admin-панель</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="content-position">
    <div class="auth">
        <?php
        echo '
        <p>Здравствуйте, <span>' . $_SESSION['username'] . '</span></p>
        <p><a href="../logout.php" title="Выход">Выход</a></p>
    </div>
    <div class="navigation">
        <button><a href="index.php?action=products">Таблица "Products"</a></button>
        <button><a href="index.php?action=cart">Таблица "Cart"</a></button>
        <button><a href="index.php?action=users">Таблица "Users"</a></button>
    </div>
        ';
        switch ($action) {
            case 'reg':
                require_once("reg_admin.php");
                if ($_SESSION["error_username"] == 1) echo '<p style="text-align: center;  margin-top: 30px;"><span style="color: red">Некорректное имя пользователя!</span></p>';
                if ($_SESSION["error_email"] == 1) echo '<p style="text-align: center;  margin-top: 30px;"><span style="color: red">Некорректный E-mail!</span></p>';
                if ($_SESSION["error_password"] == 1) echo '<p style="text-align: center;  margin-top: 30px;"><span style="color: red">Некорректный пароль!</span></p>';
                if ($_SESSION["reg_success"] == 1) {
                    echo '<p style="text-align: center"><span style="color: red">Регистрация успешно завершена!</span></p>';
                    unset($_SESSION["reg_success"]);
                }
                echo '
                <form id="login" style="height: 270px; " name="auth" action="" method="post">
                    <h1 class="h1">Регистрация (Admin)</h1>
                    <fieldset id="inputs">
                        <input id="username" name="username" type="text" placeholder="Имя администратора" autofocus required>
                        <input id="username" name="email" type="text" placeholder="E-mail" autofocus required>
                        <input id="password" name="password" type="password" placeholder="Пароль" required>
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" name="reg" id="submit" style="width: 200px" value="ЗАРЕГИСТРИРОВАТЬСЯ">
                    </fieldset>
                </form>';
                break;
            case 'add_product':
            require_once "add_product.php";
                echo '
                <form enctype="multipart/form-data" class="login" name="auth" action="" method="post">
                    <h1 class="h1">Добавить товар в БД</h1>
                    <fieldset class="inputs">
                        <input id="username" name="product" type="text" placeholder="Вид товара" autofocus required>
                        <input id="username" name="name" type="text" placeholder="Название" autofocus required>
                        <input id="username" name="slide" type="text" placeholder="Поместить на слайдер(1-да;0-нет)" autofocus required>
                        <input id="username" name="price" type="text" placeholder="Цена" autofocus required>
                        <input id="username" name="collection" type="text" placeholder="Коллекция" autofocus required>
                        <input id="username" name="manufacturer" type="text" placeholder="Производитель" autofocus required>
                        <input id="username" name="security" type="text" placeholder="Гарантия" autofocus required>
                        <input id="username" name="life_time" type="text" placeholder="Срок службы" autofocus required>
                        <input id="username" name="material" type="text" placeholder="Материал" autofocus required>
                        <input id="username" name="color" type="text" placeholder="Цвет" autofocus required>
                        <input id="username" name="width" type="text" placeholder="Ширина" autofocus required>
                        <input id="username" name="height" type="text" placeholder="Высота" autofocus required>
                        <input id="username" name="depth" type="text" placeholder="Глубина" autofocus required>
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                        <input id="username" name="image" type="file" multiple accept="image/*,image/jpeg" required>
                    </fieldset>
                    <fieldset id="actions">
                        <input type="submit" name="reg" id="submit" style="width: 200px" value="ДОБАВИТЬ">
                    </fieldset>
                </form>
            </div>
        </div>';
                break;
            case 'products':
                $id = $_GET['id'];
                deleteStrProducts($link, "products", $id);

                echo '
                <div class="add">
                    <button><a href="index.php?action=add_product">Добавить</a></button>
                </div>
                <table border="1">
                    <tr>
                        <td>№</td>
                        <td>id</td>
                        <td>product</td>
                        <td>name</td>
                        <td>image</td>
                        <td>slide</td>
                        <td>price</td>
                        <td>collection</td>
                        <td>manufacturer</td>
                        <td>security</td>
                        <td>life_time</td>
                        <td>material</td>
                        <td>color</td>
                        <td>width</td>
                        <td>height</td>
                        <td>depth</td>
                        <td>Удалить</td>
                    </tr>
                    ';
                $i = 1;
                $result = numDB($link, "products");
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo '
                    <tr>
                        <td>' . $i . '</td>
                        <td>' . $rows['id'] . '</td>
                        <td>' . $rows['product'] . '</td>
                        <td>' . $rows['name'] . '</td>
                        <td>' . $rows['image'] . '</td>
                        <td>' . $rows['slide'] . '</td>
                        <td>' . $rows['price'] . '</td>
                        <td>' . $rows['collection'] . '</td>
                        <td>' . $rows['manufacturer'] . '</td>
                        <td>' . $rows['security'] . '</td>
                        <td>' . $rows['life_time'] . '</td>
                        <td>' . $rows['material'] . '</td>
                        <td>' . $rows['color'] . '</td>
                        <td>' . $rows['width'] . '</td>
                        <td>' . $rows['height'] . '</td>
                        <td>' . $rows['depth'] . '</td>
                        <td><a href="index.php?action=products&id=' . $rows["id"] . '"><img src="css/images/delete.png"></a></td>
                    </tr>
                    ';
                        $i++;
                    }
                }
                echo '
                </table>                
                ';
                break;
            case 'cart':
                $id = $_GET['id'];
                deleteStrCart($link, "cart", $id);
                echo '
                <table border="1">
                    <tr>
                        <td>№</td>
                        <td>cart_id</td>
                        <td>id_user</td>
                        <td>id_product</td>
                        <td>count</td>
                        <td>Удалить</td>
                    </tr>
                    ';
                $i = 1;
                $result = numDB($link, "cart");
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo '
                    <tr>
                        <td>' . $i . '</td>
                        <td>' . $rows['cart_id'] . '</td>
                        <td>' . $rows['id_user'] . '</td>
                        <td>' . $rows['id_product'] . '</td>
                        <td>' . $rows['count'] . '</td>
                        <td><a href="index.php?action=cart&id=' . $rows["cart_id"] . '"><img src="css/images/delete.png"></a></td>
                    </tr>
                    ';
                        $i++;
                    }
                }
                echo '
                </table>                
                ';
                break;
            case 'users':
                $id = $_GET['id'];
                deleteStrProducts($link, "users", $id);
                echo '
                <div class="add">
                    <button><a href="index.php?action=reg">Добавить</a></button>
                </div>
                <table border="1">
                    <tr>
                        <td>№</td>
                        <td>id</td>
                        <td>username</td>
                        <td>email</td>
                        <td>password</td>
                        <td>admin</td>
                        <td>Удалить</td>
                    </tr>
                    ';
                $i = 1;
                $result = numDB($link, "users");
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        echo '
                    <tr>
                        <td>' . $i . '</td>
                        <td>' . $rows['id'] . '</td>
                        <td>' . $rows['username'] . '</td>
                        <td>' . $rows['email'] . '</td>
                        <td>' . $rows['password'] . '</td>
                        <td>' . $rows['admin'] . '</td>
                        <td><a href="index.php?action=users&id=' . $rows["id"] . '"><img src="css/images/delete.png"></a></td>
                    </tr>
                    ';
                        $i++;
                    }
                }
                echo '
                </table>                
                ';
                break;
        } ?>
    </div>
</body>
</html>