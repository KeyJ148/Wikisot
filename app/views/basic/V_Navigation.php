<?php


class V_Navigation extends View {

    public $heading, $content_description, $links;

    public function display(){
        ?>

        <div id="navigation">
            <h3><?=$this->heading?></h3>
            <p>
                <?=$this->content_description?>
            </p>
            <ul class="list">
                <?php
                for ($i=0; $i<count($this->links); $i++){
                    if ($i == 0) {
                        echo '<li class="first">';
                    } else {
                        echo '<li class="sidebar">';
                    }
                    echo '<a href="'.$this->links[$i]['link'].'">'.$this->links[$i]['name'].'</a></li>';
                }
                ?>
            </ul>
        </div>

        <?php
    }

}