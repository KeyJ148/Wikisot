<?php

class V_Footer extends View{

    public $text;

    public function display(){
        ?>

        <div id="footer">
            <?=$this->text?>
        </div>

        <?php
    }
}
?>