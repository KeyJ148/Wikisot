<?php

class V_Sidebar extends View {

    public $navigation;

    public function display(){
        echo '<div id="sidebar">';
        $this->navigation->display();
        echo '</div>';
    }
}
?>