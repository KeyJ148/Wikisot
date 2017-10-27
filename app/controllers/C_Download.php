<?php

class C_Download extends DefaultPageController {

    function action_index() {
        $data = (new M_Download())->getData();
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->content_description = $data['content_description'];
        $this->active_menu = 1;

        $template = $this->getTemplateMain();
        $template->display();
    }
}