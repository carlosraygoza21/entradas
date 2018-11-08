<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin', function () {
    return view('admin/index_admin');
});

Route::get('usuarios', function () {
    return view('admin/usuarios');
});

Route::get('entradas', function () {
    return view('admin/entradas');
});

Route::get('estacionamiento', function () {
    return view('admin/estacionamiento');
});

Route::get('guardia', function () {
    return view('guardia/index_guardia');
});

Auth::routes();
// Autentificación
Route::get('/', 'HomeController@index')->name('home');
