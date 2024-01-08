<?php
namespace App\Controllers;
class ViewController
{
    public static function home()
    {
        require __DIR__ ."/../../Views/user/home.php";
    }
    public static function dashboard()
    {
        require __DIR__ ."/../../Views/Admin/Dashboard.php";
    }
    public static function categorie()
    {
        require __DIR__ ."/../../Views/Admin/Categories.php";
    }
    public static function Login()
    {
        require __DIR__ ."/../../Views/Login.php";
    }
    public static function sign_up()
    {
        require __DIR__ ."/../../Views/sign_up.php";
    }
}