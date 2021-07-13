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
    return view('admin/sesion');
})->name('login');

Route::get('registrarme', function () {
    return view('admin/registro');
})->name('register');

Route::get('dashboard', function () {
    return view('admin/dashboard/dashboard');
})->name('dashboard');

Route::get('usuario', function () {
    return view('admin/user/profile');
})->name('user');

Route::get('tablas', function () {
    return view('admin/user/tables');
})->name('tables');

/**
 * Categorias
 */
Route::get('/add', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@index')->name('cat_index');
Route::post('categoria/save', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@save');
Route::get('categoria/mostrar', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@mostrar');

/**
 * Usuarios
 */
Route::resource('usuarios', UsuariosController::class);

/**
 * Sesión
 */
