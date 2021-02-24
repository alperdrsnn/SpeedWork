<?php

namespace SpeedWeb\core;

use Medoo\Medoo;

class Database
{

    public static $database;

    public function __construct(string $type,  string $dbname, string $host, string $username, string $password)
    {
        self::$database = new Medoo([
            'database_type' => $type,
            'database_name' => $dbname,
            'server' => $host,
            'username' => $username,
            'password' => $password
        ]);
    }
}