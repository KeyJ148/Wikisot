<?php

class C_Players extends DefaultPageController {

    function action_index() {
        $data = (new M_Players())->getData();
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->content_description = $data['content_description'];
        $this->active_menu = 3;

        $template = $this->getTemplateMain();
        $template->display();
    }
}