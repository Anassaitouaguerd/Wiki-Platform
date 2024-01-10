<?php
namespace App\Controllers\auteur;
use App\Models\Crud_Categorie;
use App\Models\Crud_Tage;
use App\Controllers\ViewController;
class Gestion_wiki
{
    protected static $wiki;
    protected static $categorie;
    protected static $tags;
    public static function getCategie_tags()
    {
        $data_categorie = self::$categorie = Crud_Categorie::displayAll();
        $tags = self::$categorie = Crud_Tage::displayAll();
        ViewController::wiki($data_categorie ,$tags);
    }
    // public static function add_wiki()
    // {
    //     extract($_POST);
    //     self::$wiki = ;
           
    // }
}