<?php
namespace App\Controllers\admin;
use App\Models\Crud_Tage;
use App\Controllers\ViewController;
class TageController
{
    public static function display_Tags()
    {
        $data = Crud_Tage::displayAll();
        ViewController::tage($data);
    } 
    public static function Add_tag()
    {
        $tag_name = json_decode(file_get_contents("php://input"));
        $result = Crud_Tage::insert($tag_name);
        if($result)
        {
            $show = Crud_Tage::show_Onetage($result);
            echo json_encode($show);
        }
    }
    public static function update_Tag()
    {
        $data = json_decode(file_get_contents("php://input"));
        $tagID = $data->id;
        $tagName = $data->name;
        $update = Crud_Tage::update($tagID,$tagName);
        if($update)
        {
            echo json_encode($update);
        }
    }
    public static function delet_tag()
    {
        $data = json_decode(file_get_contents("php://input"));
        $idTags = $data;
        $delet = Crud_Tage::delete($idTags);
        if($delet)
        {
            echo json_encode($delet);
        }
        
    }
}