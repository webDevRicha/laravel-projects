<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;
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

Route::get('/', [ToDoListController::class, 'index']);
Route::post('/add', [ToDoListController::class, 'add']);
Route::post('/list', [ToDoListController::class, 'list']);
Route::post('/update', [ToDoListController::class, 'update']);
Route::post('/delete', [ToDoListController::class, 'delete']);