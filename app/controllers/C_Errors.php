<?php

class C_Errors extends Controller {

    function action_index() {
        echo 'Неизвестная ошибка';
    }

    function action_404(){
        echo 'Страница не найдена';
    }
}