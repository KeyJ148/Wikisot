<?php

class M_ContentConstructor extends Model{

    public static $TOPIC_PREFIX = 'topic_';

    private $data;

    public function getData(){
        return $this->data;
    }

    public function addTopic($name, $text){
        $i = count($this->data);
        $this->data[$i]['name'] = $name;
        $this->data[$i]['text'] = $text;
    }
}