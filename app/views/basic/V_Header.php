<?php

class V_Header extends View{

    public $text, $header;

    public function display(){
        ?>

        <div id="header">
            <div id="menu">
                <ul>
                    <?php
                    for ($i=0; $i<count($this->header); $i++){
                        if ($this->header[$i]['active']) echo '<li class="active">';
                        else echo '<li>';

                        echo '<a href="' . $this->header[$i]['url'] . '">' . $this->header[$i]['name'] . '</a></li>';
                    }
                    ?>
                </ul>
                <br class="clearfix" />
            </div>
            <div id="logo">
                <h1><a href="/"><?=$this->text?></a></h1>
            </div>
        </div>

        <?php
    }
}
?>

