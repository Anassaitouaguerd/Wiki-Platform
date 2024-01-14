<?php
namespace App\Controllers;
class ViewController
{
    public static function home($result)
    {
        $alltags = $result;
        require __DIR__ ."/../../Views/user/home.php";
    }
    public static function dashboard($allusers , $allWikis , $allTags , $allCategorie)
    {
        $count_users = $allusers;
        $count_wikis = $allWikis;
        $count_tags = $allTags;
        $count_allCategorie = $allCategorie;
        require __DIR__ ."/../../Views/Admin/Dashboard.php";
    }

    public static function my_wikis($data)
    {
        $all_myWiki = $data;
        require __DIR__ ."/../../Views/Auteur/All_My_Wiki.php";
    }
    public static function edite_page($tagsTo_Wikis, $alltags ,$wiki,$allCategorie)
    {
        $tags_to_wiki = $tagsTo_Wikis;
        $allTags = $alltags;
        $getwiki = $wiki;
        $getallCategorie = $allCategorie;
        require __DIR__ ."/../../Views/Auteur/Edit_page.php";
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
    public static function about_article($data,$tags)
    {
        $getTags = $tags;
        $getContent = $data ;
        require __DIR__ ."/../../Views/user/About_Article.php";
    }
    public static function tage($data)
    {
        $getTag = $data ;
        require __DIR__ ."/../../Views/Admin/tags.php";
    }
    public static function Wiki_Archive($data)
    {
        $getwiki = $data ;  
        require __DIR__ ."/../../Views/Admin/Wiki_Archive.php";
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