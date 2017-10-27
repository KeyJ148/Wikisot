<?php

class C_Profile extends DefaultPageController {

    function action_index() {
        $data = null;
        if (isset($_SESSION['login'])){
            $data = (new M_ProfileAuth())->getData();
        } else {
            $data = (new M_ProfileNoAuth())->getData();
        }

        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->content_description = $data['content_description'];
        $this->active_menu = 4;

        $template = $this->getTemplateMain();
        $template->head->addCSS(CSS_URL . 'parts/input.css');
        $template->display();
    }
}