<?php

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
    return view('admin/login');
})->name('login');

Route::get('registrarme', function () {
    return view('admin/register');
})->name('register');

Route::get('dashboard', function () {
    return view('admin/dashboard/dashboard');
})->name('dashboard');

Route::get('usuario', function () {
    return view('admin/user/profile');
})->name('user');
