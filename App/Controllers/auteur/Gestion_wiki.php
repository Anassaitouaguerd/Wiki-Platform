<?php
namespace App\Controllers\auteur;
use App\Models\Crud_Categorie;
use App\Models\Crud_Tage;
use App\Controllers\ViewController;
use App\Models\Crud_wiki;

class Gestion_wiki
{
    protected static $wiki;
    protected static $categorie;
    protected static $tags;
    public static function getCategorie_tags()
    {
        $data_categorie = self::$categorie = Crud_Categorie::displayAll();
        $tags = self::$categorie = Crud_Tage::displayAll();
        ViewController::wiki($data_categorie ,$tags);
    }
    public static function add_wiki()
    {
        extract($_POST);
        $id = $_SESSION['id'];
        $result = self::$wiki = Crud_wiki::insert($title,$categorie_wiki,$id,$article);
        if($result)
        {
            $wiki_id = self::$wiki = Crud_wiki::show_OneWiki($id)['id'];
            for ($i = 0; $i < count($tags); $i++) {
                
                $tag_id = $tags[$i];
                 $insert_wikiTags = Crud_wiki::table_wiki_tags($wiki_id , $tag_id);
            }
            if($insert_wikiTags )
            {
                
                header('location: dash_autheur');
            }
            
        }
    }
}