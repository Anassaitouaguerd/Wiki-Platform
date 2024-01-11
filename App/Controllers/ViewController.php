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
    public static function dash_auteur()
    {
        require __DIR__ ."/../../Views/Auteur/dash_autheur.php";
    }
    public static function my_wikis($data)
    {
        $all_myWiki = $data;
        require __DIR__ ."/../../Views/Auteur/All_My_Wiki.php";
    }
    public static function wiki($data_categorie ,$tags)
    {
        $allCategorie = $data_categorie;
        $allTags = $tags;
        require __DIR__ ."/../../Views/Auteur/wikis.php";
    }
    public static function categorie($data)
    {
        $getCategorie = $data ;
        require __DIR__ ."/../../Views/Admin/Categories.php";
    }
    public static function tage($data)
    {
        $getTag = $data ;
        require __DIR__ ."/../../Views/Admin/tags.php";
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