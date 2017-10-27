<?php


class M_Download extends Model {

    public function getData(){
        $data['title'] = 'Скачать игру';
        $data['content_description'] = 'На данной странице вы можете скачать игру или её движок, 
                                                а также посмотреть проект на github.';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Скачать игру';
        $text = 'Скачать игру можно по следующему адресу:
                 <a href="https://github.com/KeyJ148/RPG/archive/master.zip">Zip-file</a><br>
                 Ссылка на страницу github игры:
                 <a href="https://github.com/KeyJ148/RPG">Github</a>';
        $content->addTopic($name, $text);

        $name = 'Скачать движок';
        $text = 'Скачать движок игры можно по следующему адресу:
                 <a href="https://github.com/KeyJ148/Engine/archive/master.zip">Zip-file</a><br>
                 Ссылка на страницу github движка игры:
                 <a href="https://github.com/KeyJ148/RPG">Github</a>';
        $content->addTopic($name, $text);

        return $content->getData();
    }
}