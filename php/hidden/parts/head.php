<meta charset="UTF-8" />
<meta name="description" content="Сайт об игре Storm of time" />
<meta name="keywords" content="Игра, storm of time, storm, time, wiki, википедия, вики, wikipedia, гайд, информация" />

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="/styles/main.css" />
<link rel="stylesheet" type="text/css" href="/styles/page/head.css" />
<link rel="stylesheet" type="text/css" href="/styles/page/content.css" />
<link rel="stylesheet" type="text/css" href="/styles/page/bottom.css" />

<?php
if (!isset($title)){
    $title = "Storm of time";
}
?>
<title><?php echo $title ?></title>

<?php
if (isset($include_css)){
    for ($i=0; $i<count($include_css); $i++){
        echo '<link rel="stylesheet" type="text/css" href="' . $include_css[$i] . '" />';
    }
}