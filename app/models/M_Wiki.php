<?php

class M_Wiki extends Model{

    const LINK_PREFIX = '/wiki/view/?id=';
    const MAIN_CATEGORY_ID = -1;
    const DEFAULT_CATEGORY_NAME = 'Без категории';

    public $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function getData(){
        $data['title'] = 'Wiki';
        $data['active_menu'] = 2;
        $data['content_description'] = '';

        $page = ORM_Page::load_by_id($this->id);
        $data['id'] = $page->db_id;
        $data['name'] = $page->db_name;
        $data['text'] = $page->db_content;
        $data['text_replace'] = str_replace(chr(13), '<br>', $page->db_content);

        $lastChangePerson = ORM_Person::load_by_id($page->db_last_change_user_id);
        $data['last_change'] = 'Последние изменение:<br>' . $page->db_last_change . ', ' . $lastChangePerson->db_login;

        $data['title_list'] = 'Страницы в этой категории';
        $data['content_list'] = array();

        $subcategoriesFilter = new ORM_Page();
        $subcategoriesFilter->db_category_id = $page->db_id;
        $subcategories = $subcategoriesFilter->loadAll();
        for ($i=0; $i<count($subcategories); $i++){
            $data['content_list'][$i]['name'] = $subcategories[$i]->db_name;
            $data['content_list'][$i]['link'] = M_Wiki::LINK_PREFIX . $subcategories[$i]->db_id;
        }

        $mainCategoriesFilter = new ORM_Page();
        $mainCategoriesFilter->db_category_id = M_Wiki::MAIN_CATEGORY_ID;
        $mainCategories = $mainCategoriesFilter->loadAll();
        for ($i=0; $i<count($mainCategories); $i++){
            $data['links'][$i]['name'] = $mainCategories[$i]->db_name;
            $data['links'][$i]['link'] = M_Wiki::LINK_PREFIX . $mainCategories[$i]->db_id;
        }

        $data['category'] = M_Wiki::DEFAULT_CATEGORY_NAME;
        $categories = new ORM_Page();
        $categories->db_id = $page->db_category_id;
        if ($categories->load()) $data['category'] = $categories->db_name;

        $data['all_categories'] = array();
        $allCategoriesFilter = new ORM_Page();
        $allCategories = $allCategoriesFilter->loadAll();
        for ($i=0; $i<count($allCategories); $i++){
            $data['all_categories'][$i] = $allCategories[$i]->db_name;
        }

        return $data;
    }

    public function create($login, $name, $category_id){
        $answer = array();
        $answer['id'] = 0;

        $person = new ORM_Person();
        $person->db_login = $login;
        $person->load();

        $role = new ORM_Role();
        $role->db_id = $person->db_role_id;
        $role->load();

        if (!$role->db_add_pages){
            $answer['error'] = M_Error::_ERROR_NOT_PERMISSION;
            return $answer;
        }

        $pageFilter = new ORM_Page();
        $pageFilter->db_name = $name;
        if (count($pageFilter->loadAll()) > 0){
            $answer['error'] = M_Error::_ERROR_NAME_BUSY;
            return $answer;
        }

        $last_change = date($this->getDateFormat());
        $last_change_user_id = $person->db_id;

        $page = ORM_Page::create();
        $page->db_name = $name;
        $page->db_category_id = $category_id;
        $page->db_content = '';
        $page->db_last_change = $last_change;
        $page->db_last_change_user_id = $last_change_user_id;
        $page->save();

        $answer['id'] = $page->db_id;
        $answer['error'] = true;
        return $answer;
    }

    public function save($name, $page_id, $content, $category_name, $login){
        $person = new ORM_Person();
        $person->db_login = $login;
        $person->load();

        $role = new ORM_Role();
        $role->db_id = $person->db_role_id;
        $role->load();

        if (!$role->db_change_pages){
            return M_Error::_ERROR_NOT_PERMISSION;
        }

        $pageFilter = new ORM_Page();
        $pageFilter->db_name = $name;
        $resultFilter = $pageFilter->load();
        if ($resultFilter === true && $pageFilter->db_id != $page_id) {
            return M_Error::_ERROR_NAME_BUSY;
        }

        $categoryFilter = new ORM_Page();
        $categoryFilter->db_name = $category_name;
        $resultFilter = $categoryFilter->load();
        if ($resultFilter === false && $category_name !== M_Wiki::DEFAULT_CATEGORY_NAME){
            return M_Error::_ERROR_CATEGORY_NOT_EXIST;
        }

        $category_id = M_Wiki::MAIN_CATEGORY_ID;
        if ($resultFilter === true) $category_id = $categoryFilter->db_id;

        $last_change = date($this->getDateFormat());
        $last_change_user_id = $person->db_id;

        $changingPage = ORM_Page::load_by_id($page_id);
        $changingPage->db_name = $name;
        $changingPage->db_category_id = $category_id;
        $changingPage->db_content = $content;
        $changingPage->db_last_change = $last_change;
        $changingPage->db_last_change_user_id = $last_change_user_id;
        $changingPage->save();

        return true;
    }

    private function getDateFormat(){
        return 'd.m.y G:i';
    }
}