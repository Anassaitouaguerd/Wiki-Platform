<?php
namespace App\Controllers;
use App\Models\Crud_wiki;
use App\Controllers\ViewController;
use App\Models\Crud_Tage;

class homeController
{
    
    public static function search()
    {
        $data = json_decode(file_get_contents("php://input"));
        $title = $data->wiki;
        $categori = $data->categorie;
        $page = $data->showMore;
        $itemCount = 5;
        $result = Crud_wiki::show_AllWiki($title, $categori,$page,$itemCount);
        if($result)
        {
            echo json_encode($result);
        }
    }
    public static function aficher_article()
    {
        $id = $_GET['id'];
        $data = Crud_wiki::show_ContentWiki($id);
        $tags = Crud_Tage::show_TagsWiki($id);
        if($data)
        {
            
            ViewController::about_article($data,$tags);
        }
    }
    public static function homeControll()
    {
        $result = Crud_Tage::displayAll();
    
        if($result)
        {
           ViewController::home($result);
        }
    }
}