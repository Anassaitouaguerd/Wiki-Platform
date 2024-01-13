<?php
namespace App\Controllers\admin;
use App\Models\Crud_wiki;
use App\Controllers\ViewController;
class ArchiveWiki
{
    public static function archive_wiki()
    {
        extract($_POST);
        $archive = Crud_wiki::update_OneColumn($wiki_id);
        if($archive)
        {
            header('location: home');
        }
    }
    public static function view_Archive()
    {
        $data = Crud_wiki::show_Allwiki_archive();
        if($data)
        {
            ViewController::Wiki_Archive($data);
        }
    }
}