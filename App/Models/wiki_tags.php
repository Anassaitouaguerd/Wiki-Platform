<?php
namespace App\Models;
use Core\Database;
class wiki_tags
{
    protected static $conn;
    public static function conect()
    {
        if(!isset(self::$conn)){
            self::$conn = Database::connection();
        }
    }
    public static function update($id_wiki , $tag_id)
    {
        self::conect();
        $sql = "UPDATE wiki_tags SET tag_id = ? WHERE wiki_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $tag_id);
        $stmt->bindParam(2 , $id_wiki);
        return $stmt->execute();
    }
    public static function drop_Alltags($id_wiki)
    {
        self::conect();
        $sql = "DELETE FROM wiki_tags WHERE wiki_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id_wiki);
        return $stmt->execute();
    }
}