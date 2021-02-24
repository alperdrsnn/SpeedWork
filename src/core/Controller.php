<?php

namespace SpeedWeb\core;

class Controller
{

    public static function view(string $name, array $data = [])
    {
        extract($data);
        require_once 'src/view/' . $name . '.php';
    }


    public static function model(string $name)
    {
        $file = '\SpeedWeb\model\\' . $name;
        return new $file();
    }
}