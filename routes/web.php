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
     return view('welcome');
 });

//Rutas recolectores
//Route::get('/', 'RecolectorController@index');
Route::get('/recolector', 'RecolectorController@index');
Route::post('/recolector', 'RecolectorController@store');
Route::get('/recolector/editar/{id}', 'RecolectorController@edit');
Route::post('/recolector/editar/update', 'RecolectorController@update');
Route::get('/recolector/eliminar/{id}', 'RecolectorController@destroy');
//Rutas puntos
Route::get('/puntos', 'PuntoController@index');
Route::post('/puntoN', 'PuntoController@store');
Route::get('/puntos/editar/{id}', 'PuntoController@edit');
Route::post('/puntos/editar/update', 'PuntoController@update'); 
Route::get('/puntos/eliminar/{id}', 'PuntoController@destroy');
//Rutas asosiaciones
Route::get('/detalles', 'DetalleRecolectorController@index');
Route::get('/detalles/editar/{id}', 'DetalleRecolectorController@edit');
Route::get('/detalles/asociar/{idR} {idP}', 'DetalleRecolectorController@update');
Route::get('/detalles/elimina/{idR} {idP}', 'DetalleRecolectorController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
