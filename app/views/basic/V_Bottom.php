<?php

class V_Bottom extends View{

    public $sidebar_heading, $content_heading, $content_text;
    public $list_1_link, $list_1_name;
    public $list_2_link, $list_2_name;

    public function display(){
        ?>

        <div id="page-bottom">
            <div id="page-bottom-sidebar">
                <h3><?=$this->sidebar_heading?></h3>
                <ul class="list">
                    <li class="first"><a href="<?=$this->list_1_link?>"><?=$this->list_1_name?></a></li>
                    <li class="sidebar"><a href="<?=$this->list_2_link?>"><?=$this->list_2_name?></a></li>
                </ul>
            </div>
            <div id="page-bottom-content">
                <h3><?=$this->content_heading?></h3>
                <p>
                    <?=$this->content_text?>
                </p>
            </div>
            <br class="clearfix" />
        </div>

        <?php
    }
}
?>