<?php
namespace App\Models;

use Core\Database;

class Authentification 
{
    private static $con;
    
    private static function connect()
    {
        if (!isset(self::$con)) {
            self::$con = Database::connection();
        }
    }
    public static function login($email, $pass)
    {
        self::connect();

        $sql = "SELECT * FROM user WHERE email = ? AND password = ? ";
        $stmt = self::$con->prepare($sql);
        $stmt->bindParam(1 , $email);
        $stmt->bindParam(2 , $pass);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function register($username , $email, $pass)
    {
        self::connect();
        $sql = "INSERT INTO user (username , email , password , role) VALUES (?,?,?,?)";
        $stmt = self::$con->prepare($sql);
        $stmt->bindParam(1 , $username);
        $stmt->bindParam(2 , $email);
        $stmt->bindParam(3 , $pass);
        $role = "author";
        $stmt->bindParam(4 , $role);
        return $stmt->execute();
    } 
}
