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
    public static function show_OneWiki($id)
    {
        self::conect();
        $sql = "SELECT id FROM wikis WHERE user_id = ?  ORDER BY `createdAt` DESC LIMIT 1";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    } 
    public static function insert($title,$categorie_wiki,$user_id,$article)
    {
        self::conect();
           $sql = "INSERT INTO wikis (title , content , user_id , categorie_id) VALUES (?,?,?,?)";
           $stmt = self::$conn->prepare($sql);
           $stmt->bindParam(1 , $title);
           $stmt->bindParam(2 , $article);
           $stmt->bindParam(3 , $user_id);
           $stmt->bindParam(4 , $categorie_wiki);
           return $stmt->execute();
    }
    public static function table_wiki_tags($wiki_id , $tag_id)
    {
        self::conect();
        $sql = "INSERT INTO wiki_tags (wiki_id , tag_id) VALUES (? , ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $wiki_id);
        $stmt->bindParam(2 , $tag_id);
        return $stmt->execute();
    }

}