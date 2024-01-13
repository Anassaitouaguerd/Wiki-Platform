<?php
namespace App\Controllers\admin;
use App\Models\Dashboard;
use App\Controllers\ViewController;
class DashboardController
{
    public static function dashboard()
    {
        $allWikis = Dashboard::count_Allwiki();
        $allusers = Dashboard::count_AllUsers();
        $allCategorie = Dashboard::count_AllCategorie();
        $allTags = Dashboard::count_AllTag();
            if($allWikis)
            {
                ViewController::dashboard($allusers , $allWikis , $allTags , $allCategorie);
            }
    }
}