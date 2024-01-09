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
    if(isset($_POST['login']))
    {
        extract($_POST);
        $Email_valid = self::Validation_email($email);
        $Password = self::Validation_pass($password);
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
                header('location:dash_autheur');
                
            }else if($_SESSION['role'] == "admin")
            {
                header('location:dashboard');
            }
        }
        else
        {
            $_SESSION['message'] = "the account is not found";
            header('location:login');

        }
     }   
}
public static function Register()
{
        if(isset($_POST['save']))
        {
                extract($_POST);
                $Email_valid = self::Validation_email($email);
                $Password = self::Validation_pass($password);
                $Pass = MD5($Password);
                self::$log = Authentification::login($Email_valid,$Pass);
                $result = self::$log;
                if($result)
                {
                    $_SESSION['account_already'] = "the account is already registred";
                    header('location:sign_up');
                    
                }
                else
                {
                $Email_valid = self::Validation_email($email);
                $Password = self::Validation_pass($password);
                $username_valid = self::Validation_name($username);
                    $Pass = MD5($Password);
                self::$register = Authentification::register($username_valid, $Email_valid, $Pass);
                $result = self::$register;
                if($result)
                {
                    $_SESSION['name'] = $result['username'];
                    $_SESSION['id'] = $result['id'];
                        header('location:dash_autheur');
                }

            }
         }  
}
}