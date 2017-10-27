<?php

class M_FooterDefault extends Model {

    public function getData(){
        $year = getdate()['year'];

        return '&copy; 2016 - ' . $year . '| Storm of time';
    }

}