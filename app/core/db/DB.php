<?php

class DB {

    private static $instance;

    public static function connect(){
        if (!isset(self::$instance) || !self::$instance) {
            self::$instance = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
        }

        if (!self::$instance){
            throw new DBException("Error in connecting to MySQL.");
        }

        return self::$instance;
    }

    public static function query($query){
        self::connect();
        $result = mysqli_query(self::$instance, $query);

        if (!$result){
            throw new DBException("Error in query: $query");
        }

        return $result;
    }

    public static function get_last_id(){
        return mysqli_insert_id(self::$instance);
    }
}