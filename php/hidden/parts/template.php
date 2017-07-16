<!DOCTYPE html>
<head>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/head.php");?>
</head>
<body>
<div id="wrapper">
    <?php include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/header.php") ?>
    <div id="page">
        <?php include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/sidebar.php") ?>
        <div id="content">
            <!-- Content start -->

            <?php include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/content.php") ?>
            <!--
            Копия шаблона находится в следующих страницах:
            /index.php
            /download/index.php
            /players/index.php
            -->

            <!-- Content end -->
            <br class="clearfix" />
        </div>
        <br class="clearfix" />
    </div>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/bottom.php") ?>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/footer.php") ?>
</body>
</html>