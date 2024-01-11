<?php
namespace App\Controllers;
class homeController
{
    public static function search()
    {
        $data = json_decode(file_get_contents("php://input"));
    }
}