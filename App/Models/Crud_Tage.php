<?php
namespace App\Models;
use Core\Database;
class Crud_Tage
{
    protected static $conn;
    public static function conect()
    {
        if(!isset(self::$conn)){
            self::$conn = Database::connection();
        }
    }
    public static function displayAll()
    {
        self::conect();
        $sql = "SELECT * FROM tags";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function show_Onetage($id)
    {
        self::conect();
        $sql = "SELECT * FROM tags WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function insert($tagName)
    {
        self::conect();
        $sql = "INSERT INTO tags (`name`) VALUES (?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $tagName);
        $stmt->execute();
        return self::$conn->lastInsertId();
    }
    public static function update($tagID,$tagName)
    {
        self::conect();
        $sql = "UPDATE tags SET `name` = ? WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $tagName);
        $stmt->bindParam(2 , $tagID);
        return $stmt->execute();
        
    }
    public static function delete($id)
    {
        self::conect();
        $sql = "DELETE FROM tags WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        return  $stmt->execute();
    }
}