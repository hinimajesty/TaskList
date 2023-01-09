<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/task-lists', [TaskListController::class, 'index']);
Route::post('/task-lists', [TaskListController::class, 'store']);
Route::delete('/task-lists', [TaskListController::class, 'destroy']);

Route::get('/list-cards', [TaskController::class , 'index']);
Route::post('/list-cards', [TaskController::class, 'store']);
