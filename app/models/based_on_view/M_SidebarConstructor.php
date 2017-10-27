<?php

class M_SidebarConstructor extends Model {

    private $view_sidebar;

    public function __construct(){
        $this->view_sidebar['heading'] = 'НАВИГАЦИЯ';
        $this->view_sidebar['links'] = [];
    }

    public function getData(){
        return $this->view_sidebar;
    }

    public function getNavigationView(){
        $navigation = new V_Navigation();
        $navigation->links = $this->view_sidebar['links'];
        $navigation->heading = $this->view_sidebar['heading'];
        $navigation->content_description = $this->view_sidebar['content_description'];

        return $navigation;
    }

    public function getSidebarView(){
        $sidebar = new V_Sidebar();
        $sidebar->navigation = $this->getNavigationView();

        return $sidebar;
    }

    public function setHeading($text){
        $this->view_sidebar['heading'] = $text;
    }

    public function setContentDescription($text){
        $this->view_sidebar['content_description'] = $text;
    }

    public function setLinks($links){
        $this->view_sidebar['links'] = $links;
    }

    public function addLink($link, $name){
        $i = count($this->view_sidebar['links']);
        $this->view_sidebar['links'][$i]['link'] = $link;
        $this->view_sidebar['links'][$i]['name'] = $name;
    }

    public function genByContent($content){
        for ($i=0; $i<count($content); $i++){
            $this->addLink('#'. M_ContentConstructor::$TOPIC_PREFIX . $i, $content[$i]['name']);
        }
    }
}