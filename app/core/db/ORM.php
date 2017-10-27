<?php

/*
 * Все названия классов реализующих ORM должны начинаться с ORM_
 * Оставшася часть названия должна совпадать с названием таблицы в БД
 */
trait ORM {

    public $db_id;

    //Возвращает новый объект этого класса с уже присвоеным id
    public static function create(){
        $name = get_called_class();
        $table = self::get_table_name();
        $id = CRUD::create($table);

        $object = new $name();
        $object->db_id = $id;

        return $object;
    }

    //Возвращает объект этого класса c этим id и с присвоеными остальными параметрами
    public static function load_by_id($id){
        $name = get_called_class();
        $table = self::get_table_name();

        $result = CRUD::read_by_id($table, $id);
        if (!$result) return false;
        $result = mysqli_fetch_assoc($result);
        if (!$result) return false;

        $object = new $name();
        foreach ($result as $key => $value){
            $var_name = "db_".$key;
            $object->$var_name = $value;
        }

        return $object;
    }

    //Находит в базе первый объект этого класса у которого совпадают все не NULL параметры начинающиеся с db_
    //Заполняет все пустые поля и возвращает true, если такой объект был найден и false в противном случае
    public function load(){
        $result = $this->getLoadQueryResult();
        if (!$result) return false;
        $result = mysqli_fetch_assoc($result);
        if (!$result) return false;

        foreach ($result as $key => $value){
            $var_name = "db_".$key;
            $this->$var_name = $value;
        }

        return true;
    }

    //Находит в базе все объекты этого класса у которого совпадают все не NULL параметры начинающиеся с db_
    //Не трогает данный объект, но возвращает массив этих объектов с остальными заполненными полями
    //Если ни один объект не найден, возвращает пустой массив, в случае ошибки возвращает false
    public function loadAll(){
        $name = get_called_class();

        $result = $this->getLoadQueryResult();
        if (!$result) return false;

        $objects = array();
        $count = mysqli_num_rows($result);
        for ($i=0; $i<$count; $i++){
            $row = mysqli_fetch_assoc($result);
            $objects[$i] = new $name();

            foreach ($row as $key => $value){
                $var_name = "db_".$key;
                $objects[$i]->$var_name = $value;
            }
        }

        return $objects;
    }

    //Возврата рузультата запроса на загрузку по всем не NULL полям начинающимся с db_
    private function getLoadQueryResult(){
        $name = get_called_class();
        $table = self::get_table_name();
        $vars = get_class_vars($name);
        $column_array = [];
        $values_array = [];

        foreach ($vars as $key => $value){
            $value = $this->$key;
            if (substr($key, 0, 3) != "db_" || $value == NULL) continue;

            $column_array[] = substr($key, 3);
            $values_array[] = $value;
        }

        return CRUD::read($table, $column_array, $values_array);
    }


    //Находит в базе объект этого класса с таким же id как у него и заменяет у него все параметры на параметры класса
    //начинающиеся с db_, даже если этот параметр равен NULL
    public function save(){
        $name = get_called_class();
        $table = self::get_table_name();
        $vars = get_class_vars($name);
        $column_array = [];
        $values_array = [];

        foreach ($vars as $key => $value){
            $value = $this->$key;
            if (substr($key, 0, 3) != "db_" || $key == "db_id") continue;

            $column_array[] = substr($key, 3);
            $values_array[] = $value;
        }

        return CRUD::update($table, $column_array, $values_array, ["id"], [$this->db_id]);
    }

    //Находит в базе объект этого класса с таким же id как у него и удаляет его
    public function delete(){
        $name = get_called_class();
        $table = self::get_table_name();

        if (!isset($this->db_id)) $this->load();

        return CRUD::delete_by_id($table, $this->db_id);
    }

    public static function get_table_name(){
        return substr(get_called_class(), 4);
    }
}