<?php

class V_ErrorMessage extends View{

    public $text;

    public function display(){
        ?>

        <div id="error">
            Внимание: <?=$this->text?>!
        </div>

        <?php
    }
}
?>