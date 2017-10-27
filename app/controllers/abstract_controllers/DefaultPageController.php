<?php

abstract class DefaultPageController extends Controller {

    protected $title, $content, $content_description, $active_menu;

    function getTemplateMain(){
        $head = new V_Head();
        $head->title = $this->title;

        $error = new V_Empty();
        if (isset($_GET['error'])){
            $error = new V_ErrorMessage();
            $error->text = (new M_Error())->getErrorText($_GET['error']);
        }

        $header = new V_Header();
        $headerData = (new M_HeaderDefault())->getData();
        if (isset($this->active_menu)) $headerData['menu'][$this->active_menu]['active'] = true;
        $header->text = $headerData['text'];
        $header->header = $headerData['menu'];

        $bootom = new V_Bottom();
        $bootomData = (new M_BootomDefault())->getData();
        $bootom->sidebar_heading = $bootomData['sidebar_heading'];
        $bootom->content_heading = $bootomData['content_heading'];
        $bootom->content_text = $bootomData['content_text'];
        $bootom->list_1_name = $bootomData['list_1_name'];
        $bootom->list_1_link = $bootomData['list_1_link'];
        $bootom->list_2_name = $bootomData['list_2_name'];
        $bootom->list_2_link = $bootomData['list_2_link'];

        $footer = new V_Footer();
        $footer->text = (new M_FooterDefault())->getData();

        $content = new V_Content();
        $content->content = $this->content;

        $sidebarConstructor = new M_SidebarConstructor();
        $sidebarConstructor->genByContent($this->content);
        $sidebarConstructor->setContentDescription($this->content_description);
        $sidebar = $sidebarConstructor->getSidebarView();

        $template = new V_TemplateMain();
        $template->head = $head;
        $template->error = $error;
        $template->header = $header;
        $template->bottom = $bootom;
        $template->footer = $footer;
        $template->content = $content;
        $template->sidebar = $sidebar;

        return $template;
    }
}