<?php


class M_Players extends Model {

    public function getData(){
        $data['title'] = 'Игроки';
        $data['content_description'] = 'На данной странице вы можете сравнить свои результаты в топе игроков, 
                                        а также посмотреть подробную статистику своих игр.';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Топ-игроков';
        $text = 'В будущем на этой странице появится топ игроков.';
        $content->addTopic($name, $text);

        $name = 'Статистика';
        $text = 'Ваша статистика игр появится в этом разделе как только мы её сделаем. 
                 Осталось совсем чуть-чуть. <br>(07.11.2016)';
        $content->addTopic($name, $text);

        return $content->getData();
    }
}