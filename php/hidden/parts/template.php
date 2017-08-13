<?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/auth.php");?>
<!DOCTYPE html>
<head>
    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/head.php");?>
</head>
<body>
<div id="wrapper">
    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/header.php") ?>
    <div id="page">
        <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/sidebar.php") ?>
        <div id="content">
            <!-- Content start -->

            <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/content.php") ?>
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
    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/bottom.php") ?>
</div>
<?php include_once($_SERVER["DOCUMENT_ROOT"]."/php/hidden/parts/footer.php") ?>
</body>
</html>