<?php


class V_SidebarWiki extends View {

    public $navigation, $wiki_option, $last_change_text;

    function display(){
        echo '<div id="sidebar">';
        $this->navigation->display();
        $this->wiki_option->display();
        $this->last_change_text->display();
        echo '</div>';
    }
}