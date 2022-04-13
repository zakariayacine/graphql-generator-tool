<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');
Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('create');
Route::get('/project/show/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('show');
Route::post('/project/store', [App\Http\Controllers\ProjectController::class, 'store']);
//model
Route::get('/project/model/show/{id}', [App\Http\Controllers\TableController::class, 'index'])->name('index');
Route::get('/project/model/create/{id}', [App\Http\Controllers\TableController::class, 'create'])->name('create');
Route::post('/project/model/store/{id}', [App\Http\Controllers\TableController::class, 'store']);