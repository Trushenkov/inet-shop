<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин мебели для дома</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- JS -->
    <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
    <script src="js/jquery-func.js" type="text/javascript"></script>
    <!-- End JS -->
</head>
<body>
<!-- Shell -->
<div class="shell">
    <?php
    $value_page = 0;
    include("functions/db_connect.php");
    include("application/header.php");
    include("application/additional_information.php");
    include("home.php");
    ?>
</div>
<!-- End Shell -->
</body>
</html>