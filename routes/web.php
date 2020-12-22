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


//Gets
Route::get('/getListas', 'ListasController@getListas');

//inserts
Route::post('/GuardarLista', 'ListasController@GuardarLista');

//inserts
Route::get('/DeleteListas/{id}', 'ListasController@EliminarLista');