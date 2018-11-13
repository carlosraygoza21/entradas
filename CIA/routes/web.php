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

//ADMIN index page
Route::get('admin', 'AdminController@index');

Route::get('usuarios', 'UsuariosController@index');

Route::get('entradas', function () {
    return view('admin/entradas');
});

Route::get('estacionamiento', function () {
    return view('admin/estacionamiento');
});

//GUARDIA index page
Route::get('guardia', 'GuardiaController@index');


Auth::routes();
// Autentificación
Route::get('/', 'HomeController@index')->name('home');
