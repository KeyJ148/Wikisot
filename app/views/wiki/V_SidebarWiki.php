<?php


class V_SidebarWiki extends View {

    public $level_up, $navigation, $wiki_option, $last_change_text;

    function display(){
        echo '<div id="sidebar">';
        $this->level_up->display();
        $this->navigation->display();
        $this->wiki_option->display();
        $this->last_change_text->display();
        echo '</div>';
    }
}