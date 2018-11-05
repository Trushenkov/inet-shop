<!-- Content Slider -->
<div id="slider" class="box">
    <div id="slider-holder">
        <ul>
            <?php
            $result = mysqli_query($link, "SELECT * FROM `products` WHERE `slide` = 1");
            $index = 0;
            if (mysqli_num_rows($result) > 0) {
                // Выбирает одну строку из результирующего набора и помещает ее в ассоциативный массив.
                $rows = mysqli_fetch_array($result);
                do {
                    echo '
            <li><a href="store.php?id=' . $rows["id"] . '"><img src="css/images/products_mebel/' . $rows["image"] . '-slide.jpg"</a>';
                    $index++;
                } while ($rows = mysqli_fetch_array($result));
            }
            ?>
        </ul>

    </div>
    <div id="slider-nav">
        <?php
        for ($i = 1; $i < $index; $i++) {
            echo '
            <a href="#">' . $i . '</a>';
        }
        ?>
    </div>
</div>
<!--End Content Slider-->