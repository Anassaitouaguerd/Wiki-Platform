<?php
namespace App\Controllers;
use App\Models\Authentification;
class AuthController
{
protected static $log;
protected static $register;
public static function Validation_email($email)
{
    $email_valid = trim($email);
    $email_valid = stripslashes($email);
    $email_valid = htmlspecialchars($email);
    return $email_valid;
}
public static function Validation_pass($password)
{
    $password = trim($password);   
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    return $password;
}
public static function Validation_name($username)
{
    $username_valid = trim($username);   
    $username_valid = stripslashes($username);
    $username_valid = htmlspecialchars($username);
    return $username_valid;
}
public static function Login()
{
        $data = json_decode(file_get_contents("php://input"));
        $Email_valid = self::Validation_email($data->email);
        $Password = self::Validation_pass($data->password);
        $Pass = MD5($Password);
            self::$log = Authentification::login($Email_valid,$Pass);
            $result = self::$log;
            if($result)
        {
            $_SESSION['name'] = $result[0]['username'];
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['role'] = $result[0]['role'];
            if($_SESSION['role'] == "author")
            {
                echo json_encode("OK");
                
            }else if($_SESSION['role'] == "admin")
            {
                echo json_encode("OK");
            }
        }
        else
        {
            $_SESSION['message'] = "the account is not found";
            echo json_encode("false");

        }
      
}
public static function Register()
{
    
                $data = json_decode(file_get_contents("php://input"));
                $Email_valid = self::Validation_email($data->email);
                $Password = self::Validation_pass($data->password);
                $Pass = MD5($Password);
                self::$log = Authentification::login($Email_valid,$Pass);
                $result = self::$log;
                if($result)
                {
                    $_SESSION['account_already'] = "the account is already registred";
                    echo json_encode("false");
                    
                }
                else
                {
                $Email_valid = self::Validation_email($data->email);
                $Password = self::Validation_pass($data->password);
                $username_valid = self::Validation_name($data->username);
                $Pass = MD5($Password);
                self::$register = Authentification::register($username_valid, $Email_valid, $Pass);
                $result = self::$register;
                self::$log = Authentification::login($Email_valid,$Pass);
                $data = self::$log;
                $_SESSION['name'] = $data[0]['username'];
                $_SESSION['id'] = $data[0]['id'];
                $_SESSION['role'] = $data[0]['role'];

                if($result)
                {
                        echo json_encode("OK");
                }

         }  
}
public static function log_out()
{
    session_destroy();
    header('location:home');
}
}