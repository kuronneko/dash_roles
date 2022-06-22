<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PublicController;


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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Public controller regresa a la vista welcome con la ruta defecto /
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('welcome');
//Public controller con ruta personalizada apuntando a la función showContent
Route::get('planta/{id}/', [App\Http\Controllers\PublicController::class, 'showContent'])->name('public.content');

Auth::routes();

//Rutas protegidas utilizando Laravel Permissions
Route::group(['middleware' => 'auth'], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('images', ImageController::class);
});
