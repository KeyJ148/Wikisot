<?php


class M_Main extends Model {

    public function getData(){
        $data['title'] = 'Storm of time';
        $data['content_description'] = 'На данной странице отображена общая информация о сайте и игре.';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Storm of time';
        $text = 'Данный сайт посвещён игре Storm of time и бла-бла-бла...';
        $content->addTopic($name, $text);

        $name = 'Wiki';
        $text = 'На данном сайте имеется раздел Wiki в котором описана вся информация о игре Storm of time. 
                 Ну почти вся. Всё, что мы успели туда написать.';
        $content->addTopic($name, $text);

        $name = 'Статистика';
        $text = 'После создания аккаунта в разделе "Профиль" у вас появится возможность сохранять свою 
                 статистику игры на сайте и участвовать в рейтинге топ-игроков.';
        $content->addTopic($name, $text);

        return $content->getData();
    }
}