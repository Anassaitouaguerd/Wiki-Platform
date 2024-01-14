<?php
namespace App\Controllers\admin;
use App\Models\Crud_Categorie;
use App\Controllers\ViewController;
class CategorieController
{
    public static function display_categorie()
    {
        $data = Crud_Categorie::displayAll();
        ViewController::categorie($data);
    } 
    public static function Add_categorie()
    {
        $data = json_decode(file_get_contents("php://input"));
        $categoryName = $data->name;
        $result = Crud_Categorie::insert($categoryName);
        if($result)
        {
            $show = Crud_Categorie::show_OneCategorie($result);
            echo json_encode($show);
        }
    }
    public static function update_Categorie()
    {
        $data = json_decode(file_get_contents("php://input"));
        $categoryID = $data->id;
        $categoryName = $data->name;
        $update = Crud_Categorie::update($categoryID,$categoryName);
        if($update)
        {
            echo json_encode($update);
        }
    }
    public static function delet_categporie()
    {
        $data = json_decode(file_get_contents("php://input"));
        $categorieID = $data;
        $delet = Crud_Categorie::delete($categorieID);
        if($delet)
        {
            echo json_encode($delet);
        }
        
    }
}