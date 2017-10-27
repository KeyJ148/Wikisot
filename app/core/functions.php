<?php

//Зашрузка указанного файла из указанной директории или поддиректории
function load_file($filename, $directory){
    $all_file = scandir($directory);

    foreach ($all_file as $file){
        if ($file !== '.' && $file !== '..'){
            if (!is_dir($directory . $file) && $file === $filename){
                require_once ($directory . $file);
                return true;
            }

            if (is_dir($directory . $file)){
                $result = load_file($filename, $directory . $file . '/');
                if ($result) return true;
            }
        }
    }

    return false;
}

//Поиск и загрузка файла из папки back-end'a и всех её подпапок
function load_file_from_app($filename){
    return load_file($filename, APP_FOLDER);
}

//Загрузка классов "на лету"
function __autoload($class_name) {
    $filename = $class_name . '.php';

    return load_file_from_app($filename);
}

