<?php
namespace App\Models;
use Core\Database;
class Crud_wiki
{
    protected static $conn;
    public static function conect()
    {
        if(!isset(self::$conn)){
            self::$conn = Database::connection();
        }
    }
    public static function insert()
    {
           $sql = "INSERT INTO wiki";
    }
}