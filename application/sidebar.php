<?php
require_once("functions/db_request.php");
?>
<!-- Sidebar -->
<div id="sidebar">
    <!-- Search -->
    <div class="box search">
        <h2>Поиск <span></span></h2>
        <div class="box-content">
            <form action="index.php" method="get">

                <label>Название</label>
                <?php
                echo '
                <input type="text" name="search" value="' . $search . '" placeholder="Например: ACER Aspire es1-530g" class="field"/>
'; ?>
                <label>Категория</label>
                <select class="field" name="product">
                    <?php
                    if ($product != null) {
                        echo '<option value="' . $product . '">' . $product . '</option>';
                    } else {
                        echo '<option value="">-- Выберите категорию --</option>';
                    }
                    checkCategories($link, $arrayCategories);
                    for ($i = 0; $i < count($arrayCategories); $i++) {
                        echo '<option value="' . $arrayCategories[$i] . '">' . $arrayCategories[$i] . '</option>';
                    }
                    ?>
                </select>

                <div class="inline-field">
                    <label>Цена</label>
                    <select name="min" class="field small-field">
                        <?php
                        $minValue = null;
                        if ($min == null && $max == null) {
                            echo '<option value="' . price($link, "min") . '">' . price($link, "min") . ' &#8381</option>';
                            $minValue = price($link, "min") + 1000;

                        } elseif ($min != null && $max != null) {
                            echo '<option value="' . $min . '">' . $min . ' &#8381</option>';
                            $minValue = price($link, "min");
                        }
                        for ($i = $minValue; $i < price($link, "max"); $i += 1000) {
                            echo '<option value="' . $i . '">' . $i . ' &#8381</option>';
                        }
                        ?>
                    </select>
                    <label>до:</label>
                    <select name="max" class="field small-field">
                        <?php
                        $maxValue = null;
                        if ($min == null && $max == null) {
                            echo '<option value="' . price($link, "max") . '">' . price($link, "max") . ' &#8381</option>';
                            $maxValue = price($link, "max") - 1000;

                        } elseif ($min != null && $max != null) {
                            echo '<option value="' . $max . '">' . $max . ' &#8381</option>';
                            $maxValue = price($link, "max");
                        }
                        for ($i = $maxValue; $i > price($link, "min"); $i -= 1000) {
                            echo '<option value="' . $i . '">' . $i . ' &#8381</option>';
                        }
                        ?>
                    </select>
                    <div class="br"></div>
                    <label>Фильтр</label>
                    <select name="sort" id="sort" class="field small-field">
                        <?php
                        if ($sort == null) {
                            echo '<option value="">-- Выберите --</option>
                                <option value="min">По возрастанию</option>
                                <option value="max">По убыванию</option>';
                        } elseif ($sort == "min") {
                            echo '
                                <option value="min">По возрастанию</option>
                                <option value="max">По убыванию</option>
                                <option value="">-- Выберите --</option>';

                        } else {
                            echo '
                                <option value="max">По убыванию</option>
                                <option value="min">По возрастанию</option>
                                <option value="">-- Выберите --</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="search-submit" value="Поиск"/>
            </form>
        </div>
    </div>
    <!-- End Search -->


    <!-- Categories -->
    <div class="box categories">
        <?php
        echo ' 
            <h2>Категории<span></span></h2>';
        ?>
        <div class="box-content">
            <ul>
                <?php
                for ($i = 0; $i < count($arrayCategories); $i++) {
                    echo '
                <li><a href="index.php?product=' . $arrayCategories[$i] . '">' . $arrayCategories[$i] . '</a><span>' . numProducts($link, $arrayCategories[$i]) . '</span></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- End Categories -->

</div>
<!-- End Sidebar -->