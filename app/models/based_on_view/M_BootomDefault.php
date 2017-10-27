<?php

class M_BootomDefault extends Model {

    public function getData(){
        $view_bootom['sidebar_heading'] = 'Контакты';
        $view_bootom['list_1_link'] = 'http://vk.com/';
        $view_bootom['list_1_name'] = 'Группа ВКонтакте';
        $view_bootom['list_2_link'] = 'mailto:admin@wikisot.ru';
        $view_bootom['list_2_name'] = 'admin@wikisot.ru';
        $view_bootom['content_heading'] = 'Обратная связь';
        $view_bootom['content_text'] = 'Если у вас имеются какаие-либо вопросы или предложения по работе, структуре, 
                                        оформлению сайта или игры — мы с радостью вас выслушаем! Пишите нам на 
                                        почту либо в группу ВКонтакте.<br>Ответ не заставит себя ждать!';

        return $view_bootom;
    }
}