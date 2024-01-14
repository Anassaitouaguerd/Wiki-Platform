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
    public static function show_MyWiki($id_user)
    {
        self::conect();
        $sql = "SELECT * FROM wikis WHERE user_id = ? ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id_user);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
    public static function display_OneWiki($id)
    {
        self::conect();
        $sql = "SELECT * FROM wikis WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    } 
    public static function show_ContentWiki($id)
    {
        self::conect();
        $sql = "SELECT * FROM wikis INNER JOIN categories ON categories.id_categorie = wikis.categorie_id INNER JOIN user ON user.id = wikis.user_id WHERE wikis.id = ? ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    } 
    
    public static function show_AllWiki($title, $categori, $page, $itemCount)
    {
        self::conect();
        $offset = ($page - 1) * 5;
     
        $sql = "SELECT * FROM wikis
                INNER JOIN categories ON categories.id_categorie = wikis.categorie_id
                WHERE title LIKE ? AND `name` LIKE ? AND deletedAt IS NULL
                LIMIT $itemCount OFFSET $offset";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, '%' . $title . '%');
        $stmt->bindValue(2, '%' . $categori . '%');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    
    public static function insert($title,$categorie_wiki,$user_id,$article,$description)
    {
        self::conect();
           $sql = "INSERT INTO wikis (title , description,  content , user_id , categorie_id) VALUES (?,?,?,?,?)";
           $stmt = self::$conn->prepare($sql);
           $stmt->bindParam(1 , $title);
           $stmt->bindParam(2 , $description);
           $stmt->bindParam(3 , $article);
           $stmt->bindParam(4 , $user_id);
           $stmt->bindParam(5 , $categorie_wiki);
           return $stmt->execute();
    }
    public static function update($id_wiki, $title, $description, $categorie_wiki, $article)
    {
        self::conect();
        $sql = "UPDATE wikis SET title = ?,
        description = ? ,content = ? ,
        categorie_id = ? WHERE id = ?  ";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $title);
        $stmt->bindParam(2 , $description);
        $stmt->bindParam(3 , $article);
        $stmt->bindParam(4 , $categorie_wiki);
        $stmt->bindParam(5 , $id_wiki);
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
    public static function update_OneColumn($wiki_id ,$changes)
    {
        self::conect();
        $sql = "UPDATE wikis SET deletedAt = ? WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $changes);
        $stmt->bindParam(2 , $wiki_id);
        return $stmt->execute();
    } 
    public static function show_Allwiki_archive()
    {
        self::conect();
        $sql = "SELECT * FROM wikis WHERE deletedAt IS NOT NULL ";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function delete($wiki_id)
    {
        self::conect();
        $sql = "DELETE FROM wikis WHERE id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $wiki_id);
        return $stmt->execute();
    }

}