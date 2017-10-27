<?php

class CRUD{

    public static function create($table, $column_array = [], $values_array = []){
        if (count($column_array) != count($values_array)){
            throw new DBException('[CRUD::create] column_array != values_array');
        }

        $column_string = '';
        for ($i = 0; $i < count($column_array); $i++){
            $column_string .= $column_array[$i];
            if ($i != count($column_array)-1) $column_string .= ', ';
        }

        $values_string = '';
        for ($i = 0; $i < count($values_array); $i++){
            if (!is_bool($values_array[$i])){
                $values_string .= "'".$values_array[$i]."'";
            } else {
                $values_string .= ($values_string[$i])?'true':'false';
            }
            if ($i != count($values_array)-1) $values_string .= ', ';
        }

        $query = "INSERT INTO $table ($column_string) values($values_string)";
        DB::query($query);
        return DB::get_last_id();
    }

    public static function read($table, $column_array = [], $values_array = []){
        if (count($column_array) != count($values_array)){
            throw new DBException('[CRUD::read] column_array != values_array');
            exit;
        }

        $condition = '';
        for ($i = 0; $i < count($column_array); $i++){
            $condition .= $column_array[$i] . '='."'$values_array[$i]'";
            if ($i != count($column_array)-1) $condition .= ' AND ';
        }

        $query = "SELECT * FROM $table";
        if (count($column_array) != 0){
            $query .= ' WHERE ' . $condition;
        }

        return DB::query($query);
    }

    public static function update($table, $set_column_array, $set_values_array, $condition_column_array = [], $condition_values_array = []){
        if (count($condition_column_array) != count($condition_values_array) || count($set_column_array) != count($set_values_array)){
            throw new DBException('[CRUD::update] column_array != values_array');
        }
        if (count($set_column_array) == 0 || count($set_values_array) == 0){
            throw new DBException('[CRUD::update] set_column_array=0 || set_values_array=0');
        }

        $set = '';
        for ($i = 0; $i < count($set_column_array); $i++){
            $set .= $set_column_array[$i] . '=';
            if (isset($set_values_array[$i])) $set .= "'$set_values_array[$i]'";
            else $set .= 'NULL';

            if ($i != count($set_column_array)-1) $set .= ', ';
        }

        $condition = '';
        for ($i = 0; $i < count($condition_column_array); $i++){
            $condition .= $condition_column_array[$i] . '='."'$condition_values_array[$i]'";
            if ($i != count($condition_column_array)-1) $condition .= ' AND ';
        }

        $query = "UPDATE $table SET $set";
        if (count($condition_column_array) != 0){
            $query .= ' WHERE ' . $condition;
        }

        return DB::query($query);
    }

    public static function delete($table, $column_array = [], $values_array = []){
        if (count($column_array) != count($values_array)){
            throw new DBException('[CRUD::delete] column_array != values_array');
        }

        $condition = '';
        for ($i = 0; $i < count($column_array); $i++){
            $condition .= $column_array[$i] . '='."'$values_array[$i]'";
            if ($i != count($column_array)-1) $condition .= ' AND ';
        }

        $query = "DELETE FROM $table";
        if (count($column_array) != 0){
            $query .= ' WHERE ' . $condition;
        }

        return DB::query($query);
    }

    public static function read_by_id($table, $id){
        $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
        return DB::query($query);
    }

    public static function delete_by_id($table, $id){
        $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
        return DB::query($query);
    }
}