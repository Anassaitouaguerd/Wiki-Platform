<?php
namespace App\Models;
use Core\Database;
class Crud_Categorie
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
        $sql = "SELECT * FROM categories";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function show_OneCategorie($id)
    {
        self::conect();
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function insert($categoryName)
    {
        self::conect();
        $sql = "INSERT INTO categories (`name`) VALUES (?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $categoryName);
        $stmt->execute();
        return self::$conn->lastInsertId();
    }
    public static function update($categoryID,$categoryName)
    {
        self::conect();
        $sql = "UPDATE categories SET `name` = ? WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $categoryName);
        $stmt->bindParam(2 , $categoryID);
        return $stmt->execute();
        
    }
    
    public static function delete($id)
    {
        self::conect();
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        return  $stmt->execute();
    }
}