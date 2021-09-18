<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
 * Sesión
 */
Route::get('/', [AuthController::class, 'loginView'])->name('login-view');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('login-google', [AuthController::class, 'loginGoogle'])->name('login-google');

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('registrarme', function () {
    return view('sitio/registro');
})->name('register');

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {

    /**
     * Dashboard
     */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /**
     * Categorias
     */
    Route::get('/categorias', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@index')->name('cat_index');
    Route::post('categoria/save', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@save');
    Route::get('categoria/refesh', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@refesh');
    Route::post('categoria/changer', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@changer');
    Route::get('/categoria/search', 'App\Http\Controllers\Mantenedor\MantenedorCategoriasController@search');

    /**
     * Cursos
     */
    Route::get('/cursos', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@index')->name('cur_index');
    Route::get('/cursos/filter', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@filter');
    Route::get('/curso/search', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@search');
    Route::post('curso/save', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@save');
    Route::get('/curso/refesh', 'App\Http\Controllers\Mantenedor\MantenedorCursosController@refesh');
    Route::get('/detalles-curso/{curso}', 'App\Http\Controllers\CursosController@detallesCurso')->name('detalles_curso');
    Route::post('/rating-curso/{curso}/{estrellas}', 'App\Http\Controllers\CursosController@guardarRating')->name('rating_curso');
    Route::get('/curso/detalles-unidad/{unidad}', 'App\Http\Controllers\CursosController@detallesUnidad')->name('detalles_unidad');

    /**
     * Modulos
     */
    Route::get('/modulos', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@index')->name('mod_index');
    Route::get('/modulos/filter', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@filter');
    Route::get('/modulos/search_categoria', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@search_categoria');
    Route::get('/modulo/search', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@search');
    Route::post('modulo/save', 'App\Http\Controllers\Mantenedor\MantenedorModulosController@save');

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
     * Archivos
     */
    Route::get('/archivos', 'App\Http\Controllers\Mantenedor\MantenedorArchivosController@index')->name('arch_index');
    Route::post('/archivo/save', 'App\Http\Controllers\Mantenedor\MantenedorArchivosController@save');

    /**
     * Configuraciones
     */
    Route::get('/configuraciones', 'App\Http\Controllers\Mantenedor\MantenedorConfiguracionesController@index')->name('conf_index');

    /**
     * Pagos
     */
    Route::get('/pagos', 'App\Http\Controllers\Mantenedor\MantenedorPagosController@index')->name('pgo_index');

    /**
     * Preguntas
     */
    Route::get('/preguntas', 'App\Http\Controllers\Mantenedor\MantenedorPreguntasController@index')->name('pre_index');
    Route::post('/pregunta/save', 'App\Http\Controllers\Mantenedor\MantenedorPreguntasController@save');
    Route::get('/pregunta/refesh', 'App\Http\Controllers\Mantenedor\MantenedorPreguntasController@refesh');
    Route::get('/pregunta/search', 'App\Http\Controllers\Mantenedor\MantenedorPreguntasController@search');

    /**
     * Respuestas
     */
    Route::get('/respuestas', 'App\Http\Controllers\Mantenedor\MantenedorRespuestasController@index')->name('res_index');
    Route::post('/respuesta/save', 'App\Http\Controllers\Mantenedor\MantenedorRespuestasController@save');
    Route::get('/respuesta/refesh', 'App\Http\Controllers\Mantenedor\MantenedorRespuestasController@refesh');

    /**
     * Usuarios
     */
    Route::resource('usuarios', UsuariosController::class);
    Route::get('/usuarios', 'App\Http\Controllers\Mantenedor\MantenedorUsuariosController@index')->name('usu_index');
    Route::get('/usuario/search', 'App\Http\Controllers\Mantenedor\MantenedorUsuariosController@search');
    Route::get('/usuario/search', 'App\Http\Controllers\Mantenedor\MantenedorUsuariosController@search');
    Route::post('/usuario/save', 'App\Http\Controllers\Mantenedor\MantenedorUsuariosController@save');

    /**
     * Roles
     */
    Route::get('/roles', 'App\Http\Controllers\Mantenedor\MantenedorRolesController@index')->name('rol_index');

    /**
     * Permisos
     */
    Route::get('/permisos', 'App\Http\Controllers\Mantenedor\MantenedorPermisosController@index')->name('per_index');
    Route::get('/permiso/search', 'App\Http\Controllers\Mantenedor\MantenedorPermisosController@search');
    Route::get('permisos/all', 'App\Http\Controllers\Mantenedor\MantenedorPermisosController@gettodos');
    Route::post('/permiso/save', 'App\Http\Controllers\Mantenedor\MantenedorPermisosController@save');
    Route::get('/permiso/refesh', 'App\Http\Controllers\Mantenedor\MantenedorPermisosController@refesh');
});
