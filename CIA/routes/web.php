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

Auth::routes();
// Autentificación
Route::get('/', 'HomeController@index')->name('home');
//ADMIN index page
// Route::get('admin', 'AdminController@index');
Route::get('registro_guardia', 'AdminController@guardia');
Route::get('usuarios', 'UsuariosController@index');
Route::get('entradas', 'AdminController@entradas');
Route::get('entradas_g', 'GuardiaController@entradas');
//guardar un usuario
Route::post('usuarios', 'UsuariosController@store');
//guardar un guardia_puerta
Route::post('guardia_puerta', 'AdminController@guardia_puerta_store');
Route::post('guardar_visitante', 'GuardiaController@guardar_visitante');
Route::post('salida_visitante/{id}', 'GuardiaController@salida_visitante');
//return vistas
// Route::get('entradas', function () {
//     return view('');
// });

Route::get('estacionamiento', 'AdminController@estacionamiento');
/* function () {
    return view('admin/estacionamiento');
});
*/

//GUARDIA PANEL index page
Route::get('guardia', 'GuardiaController@index');

Route::post('cia-login','CIAController@login');
Route::post('spaces','CIAController@spacesAvailables');
