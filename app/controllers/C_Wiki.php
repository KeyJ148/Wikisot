<?php

class C_Wiki extends DefaultPageController {

    function action_index() {
        if (!isset($_GET['id'])) $_GET['id'] = 0;
        $this->action_view();
    }

    function action_view() {
        if (!ORM_Page::load_by_id($_GET['id'])) $_GET['id'] = 0;

        $data = (new M_Wiki($_GET['id']))->getData();
        $this->title = $data['title'];
        $this->content = array();
        $this->content_description = $data['content_description'];
        $this->active_menu = $data['active_menu'];

        $linkList = new V_LinkList();
        $linkList->title_list = $data['title_list'];
        $linkList->content_list = $data['content_list'];

        $content = new V_ContentWiki();
        $content->name = $data['name'];
        $content->text = $data['text_replace'];
        $content->linkList = $linkList;

        $sidebarConstructor = new M_SidebarConstructor();
        $sidebarConstructor->setContentDescription('');
        $sidebarConstructor->setLinks($data['links']);
        $navigation = $sidebarConstructor->getNavigationView();

        $wikiOptions = new V_WikiOptions();
        $wikiOptions->id = $data['id'];

        $lastChangeText = new V_Text();
        $lastChangeText->text = $data['last_change'];

        $sidebarWiki = new V_SidebarWiki();
        $sidebarWiki->navigation = $navigation;
        $sidebarWiki->wiki_option = $wikiOptions;
        $sidebarWiki->last_change_text = $lastChangeText;

        $template = $this->getTemplateMain();
        $template->head->addCSS(CSS_URL . 'parts/input.css');
        $template->content = $content;
        $template->sidebar = $sidebarWiki;
        $template->display();
    }

    function action_edit() {
        if (!ORM_Page::load_by_id($_GET['id'])) $_GET['id'] = 0;

        $data = (new M_Wiki($_GET['id']))->getData();
        $this->title = $data['title'];
        $this->content = array();
        $this->content_description = $data['content_description'];
        $this->active_menu = $data['active_menu'];

        $content = new V_ContentWikiEdit();
        $content->name = $data['name'];
        $content->text = $data['text'];
        $content->category = $data['category'];
        $content->all_categories = $data['all_categories'];
        $content->id = $data['id'];

        $sidebarConstructor = new M_SidebarConstructor();
        $sidebarConstructor->setContentDescription('');
        $sidebarConstructor->setLinks($data['links']);
        $navigation = $sidebarConstructor->getNavigationView();

        $wikiOptionsEdit = new V_WikiOptionsEdit();

        $lastChangeText = new V_Text();
        $lastChangeText->text = $data['last_change'];

        $sidebarWiki = new V_SidebarWiki();
        $sidebarWiki->navigation = $navigation;
        $sidebarWiki->wiki_option = $wikiOptionsEdit;
        $sidebarWiki->last_change_text = $lastChangeText;

        $template = $this->getTemplateMain();
        $template->head->addCSS(CSS_URL . 'parts/input.css');
        $template->content = $content;
        $template->sidebar = $sidebarWiki;
        $template->display();
    }

    function action_create(){
        if ($_POST['category'] == 0) $_POST['category'] = M_Wiki::MAIN_CATEGORY_ID;

        $name = $_POST['name'];
        $category_id = $_POST['category'];

        if ($name == null || $category_id == null){
            $this->redirect(M_Error::_ERROR_FIELD_EMPTY, 0);
            return;
        }

        if (!isset($_SESSION['login'])){
            $this->redirect(M_Error::_ERROR_NOT_LOGGED_IN, 0);
            return;
        }

        $result = (new M_Wiki(0))->create($_SESSION['login'], $name, $category_id);
        $this->redirect($result['error'], $result['id']);
    }

    function action_save(){
        $name = $_POST['name'];
        $page_id = $_POST['id'];
        $content = $_POST['content'];
        $category_name = $_POST['category'];

        if (!isset($page_id) || !$name || !$category_name){
            $this->redirect(M_Error::_ERROR_FIELD_EMPTY, $page_id);
            return;
        }

        if (!isset($_SESSION['login'])){
            $this->redirect(M_Error::_ERROR_NOT_LOGGED_IN, $page_id);
            return;
        }

        $result = (new M_Wiki($page_id))->save($name, $page_id, $content, $category_name, $_SESSION['login']);
        $this->redirect($result, $page_id);
    }

    function redirect($result, $id){
        if ($result === true) header('Location: ' . M_Wiki::LINK_PREFIX . $id);
        else header('Location: ' . M_Wiki::LINK_PREFIX . $id . '&error=' . $result);
    }

}