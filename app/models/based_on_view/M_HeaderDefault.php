<?php

class M_HeaderDefault extends Model{

    public function getData(){
        $header['text'] = 'Storm<br>of time';

        $header['menu'][0]['url'] = '/';
        $header['menu'][0]['name'] = 'Главная';
        $header['menu'][0]['active'] = false;

        $header['menu'][1]['url'] = '/download/';
        $header['menu'][1]['name'] = 'Скачать';
        $header['menu'][1]['active'] = false;

        $header['menu'][2]['url'] = '/wiki/';
        $header['menu'][2]['name'] = 'Wiki';
        $header['menu'][2]['active'] = false;

        $header['menu'][3]['url'] = '/players/';
        $header['menu'][3]['name'] = 'Игроки';
        $header['menu'][3]['active'] = false;

        $header['menu'][4]['url'] = '/profile/';
        $header['menu'][4]['name'] = 'Профиль';
        $header['menu'][4]['active'] = false;

        return $header;
    }
}
