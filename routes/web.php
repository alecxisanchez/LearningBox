<?php

use App\Http\Controllers\AuthController;
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
})->name('login-view');

Route::get('registrarme', function () {
    return view('sitio/registro');
})->name('register');

Route::get('dashboard', function () {
    return view('sitio/dashboard/dashboard');
})->name('dashboard');

Route::get('usuario', function () {
    return view('sitio/user/profile');
})->name('user');

/**
 * Categorias
 */
Route::get('/categorias', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@index')->name('cat_index');
Route::post('categoria/save', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@save');
Route::get('categoria/refesh', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@refesh');
Route::post('categoria/changer', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@changer');
Route::get('/categoria/search', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@search');
/**
 * Sesión
 */
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

/**
 * Cursos
 */
Route::get('/cursos', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@index')->name('cur_index');
Route::get('/cursos/filter', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@filter');
Route::get('/curso/search', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@search');
Route::post('/curso/save', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@save');
Route::get('/curso/refesh', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@refesh');
/**
 * Modulos
 */
Route::get('/modulos', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@index')->name('mod_index');
Route::get('/modulos/filter', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@filter');
/**
 * Unidades
 */
Route::get('/unidades', 'App\Http\Controllers\Mantenedor\MantenedorUnidadesController@index')->name('und_index');
Route::get('/unidades/filter', 'App\Http\Controllers\Mantenedor\MantenedorUnidadesController@filter');
/**
 * Quiz
 */
Route::get('/quizes', 'App\Http\Controllers\Mantenedor\MantenedorQuizesController@index')->name('qui_index');
/**
 * Preguntas
 */
Route::get('/preguntas', 'App\Http\Controllers\Mantenedor\MantenedorPreguntasController@index')->name('pre_index');
/**
 * Usuarios
 */
Route::resource('usuarios', UsuariosController::class);
