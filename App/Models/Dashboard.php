<?php
namespace App\Models;
use Core\Database;
class Dashboard
{
    protected static $conn ;
    public static function connect()
    {
        if(!isset(self::$conn))
        {
            self::$conn = Database::connection();
        }
    }
    public static function count_Allwiki()
    {
     self::connect();
     $sql = "SELECT COUNT(*) AS Allwikis FROM wikis";   
     $stmt = self::$conn->prepare($sql);
     $stmt->execute();
     return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function count_AllUsers()
    {
        self::connect();
        $sql = "SELECT COUNT(*) AS AllUsers FROM user";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function count_AllCategorie()
    {
        self::connect();
        $sql = "SELECT COUNT(*) AS AllCategorie FROM categories";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function count_AllTag()
    {
        self::connect();
        $sql = "SELECT COUNT(*) AS AllTag FROM tags";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}