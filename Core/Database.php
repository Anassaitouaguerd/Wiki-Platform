<?php
namespace Core;
use PDO;

class Database
{
    public static $database;
    public static function connection()
    {
        self::$database = new PDO("mysql:host=localhost;dbname=wiki;user=root");
        return self::$database;
    }
    
}
