<?php

class V_Head extends View{

    public $title = 'Storm of time';
    public $css = '';

    public function addCSS($url){
        $this->css .= '<link rel="stylesheet" type="text/css" href="' . $url . '" />' . "\n";
    }

    public function display(){
        ?>

        <meta charset="UTF-8" />
        <meta name="description" content="Сайт об игре Storm of time" />
        <meta name="keywords" content="Игра, storm of time, storm, time, wiki, википедия, вики, wikipedia, гайд, информация" />

        <title><?= $this->title ?></title>
        <link rel="shortcut icon" href="<?=IMG_URL?>favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>main.css" />
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>page/head.css" />
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>page/content.css" />
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>page/bottom.css" />
        <?=$this->css?>

        <?php
    }
}
?>
