<?php
namespace App\Controllers\admin;
use App\Models\Crud_wiki;
use App\Controllers\ViewController;
class ArchiveWiki
{
    public static function archive_wiki()
    {
        extract($_POST);
        $changes = "archiv";
        $archive = Crud_wiki::update_OneColumn($wiki_id , $changes);
        if($archive)
        {
            header('location: home');
        }
    }
    public static function disarchiver_wiki()
    {
        extract($_POST);
        $changes = NULL;
        $disarchiver_wiki = Crud_wiki::update_OneColumn($wiki_id , $changes);
        if($disarchiver_wiki)
        {
            header('location: /');
        }
    }
    public static function view_Archive()
    {
        $data = Crud_wiki::show_Allwiki_archive();
            ViewController::Wiki_Archive($data);
    }
}