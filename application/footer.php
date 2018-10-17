<!-- Footer -->
<div id="footer">
    <p class="left">
        <a href="index.php">Домой</a>
        <span>|</span>
        <a href="store.php">Магазин</a>
        <span>|</span>
        <a href="support.php">Поддержка</a>
        <span>|</span>
        <?php
        if (checkUser($_SESSION["username"], $_SESSION["password"])) {
            echo '<a href="user_panel.php">' . $_SESSION["username"] . '</a> ';
        } else {
            echo '<a href="user_panel.php">Войти</a>';
        }
        ?>
    </p>
    <p class="right">
        &copy; 2018 Интернет-магазин мебели для дома
        <span>|</span>
        Разработал Трушенков Дмитрий 15ИТ18 <a href="https://vk.com/therealdmi" target="_blank" title="">vk.com</a>
    </p>
</div>
<!-- End Footer -->