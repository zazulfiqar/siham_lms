<?php

namespace App\Http\Controllers\SupportTeam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveCmdController extends Model
{
    use HasFactory;
    public  function  clear_cache()
    {
        dd('asdfsd');
        \Artisan::call('cache:clear');
        dd("Cache is cleared");

    }
    public  function view_clear()
    {
        \Artisan::call('view:clear');
        dd("View is cleared");
    }

    public  function optimize()
    {
        \Artisan::call('optimize');
        dd("optimize Done");

    }

    public  function storage_link()
    {
        \Artisan::call('storage:link');
        dd("Storage Link");
    }

    public  function migrate()
    {
        \Artisan::call('migrate');
        dd("Migration Done");
    }
    public  function db_seed()
    {
        \Artisan::call('db:seed');
        dd("Seeding Done");
    }



}
