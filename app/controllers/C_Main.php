<?php

class C_Main extends DefaultPageController {

    function action_index() {
        $data = (new M_Main())->getData();
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->content_description = $data['content_description'];
        $this->active_menu = 0;

        $template = $this->getTemplateMain();
        $template->display();
    }
}