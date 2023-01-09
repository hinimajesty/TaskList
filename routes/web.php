<?php

use Illuminate\Support\Facades\File;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
});

Route::get('/dump-db', function(){
    
    $filePath = storage_path('app/public/dump.sql');

    MySql::create()
        ->setDbName(env('DB_DATABASE'))
        ->setUserName(env('DB_USERNAME'))
        ->setPassword(env('DB_PASSWORD'))
        ->dumpToFile($filePath);

        return response()->download($filePath, "sql_db_dump_".Date('Y_m_d').".sql");
});
