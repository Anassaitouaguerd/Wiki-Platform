<?php
namespace App\Controllers;
use App\Models\Authentification;
class AuthController
{
protected static $log;
protected static $register;
public static function Login()
{
    if(isset($_POST['login']))
    {
        extract($_POST);
        $pass = MD5($password);
            self::$log = Authentification::login($email,$pass);
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
            $_SESSION['message'] = "the email or password is not valide";
            header('location:login');

        }
     }   
    }
    public static function Register()
    {
        if(isset($_POST['save']))
        {
                extract($_POST);
                $pass = MD5($password);
                self::$log = Authentification::login($email,$pass);
                $result = self::$log;
                if($result)
                {
                    $_SESSION['account_already'] = "the account is already registred";
                    header('location:sign_up');
                    
                }
                else
                {
                $pass = MD5($password);
                self::$register = Authentification::register($username , $email, $pass);
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