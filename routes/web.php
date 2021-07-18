<?php

use App\Http\Controllers\UsuariosController;
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

/**
 * Ejemplos de vistas
 */
Route::get('/', function () {
    return view('sitio/sesion');
})->name('login');

Route::get('registrarme', function () {
    return view('sitio/registro');
})->name('register');

Route::get('dashboard', function () {
    return view('sitio/dashboard/dashboard');
})->name('dashboard');

Route::get('usuario', function () {
    return view('sitio/user/profile');
})->name('user');

Route::get('tablas', function () {
    return view('sitio/user/tables');
})->name('tables');

/**
 * Categorias
 */
Route::get('/categorias', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@index')->name('cat_index');
Route::post('categoria/save', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@save');
Route::get('categoria/refesh', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@refesh');
Route::post('categoria/changer', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@changer');
Route::get('/categoria/search', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@search');
/**
 * Usuarios
 */
Route::resource('usuarios', UsuariosController::class);

/**
 * Sesión
 */
