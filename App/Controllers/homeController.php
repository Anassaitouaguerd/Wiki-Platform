<?php
namespace App\Controllers;
class homeController
{
    public static function home()
    {
        require __DIR__ ."/../../Views/home.php";
    }
}