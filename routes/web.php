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

Route::get('/recolector', 'RecolectorController@index');
Route::post('/recolector', 'RecolectorController@store');
Route::get('/recolector/editar/{id}', 'RecolectorController@edit');
Route::post('/recolector/editar/update', 'RecolectorController@update');
Route::get('/recolector/eliminar/{id}', 'RecolectorController@destroy');
