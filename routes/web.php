<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TableController;
use App\Http\Middleware\ProjectOwnerMiddleware;
use App\Http\Middleware\ScheemaOwnerMiddleware;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/project', [ProjectController::class, 'index'])->name('home');
Route::get('/project/create', [ProjectController::class, 'create'])->name('create');
Route::post('/project/store', [ProjectController::class, 'store']);

Route::get('/project/show/{id}', [ProjectController::class, 'show'])->name('show')->middleware(ProjectOwnerMiddleware::class);

Route::middleware([ScheemaOwnerMiddleware::class])->group(function () {
    //model
    Route::get('/project/model/show/{id}', [TableController::class, 'index'])->name('index');
    Route::get('/project/model/create/{id}', [TableController::class, 'create'])->name('create');
    Route::get('/project/model/destroy/{id}', [TableController::class, 'destroy']);
    Route::post('/project/model/store/{id}', [TableController::class, 'store']);
});
