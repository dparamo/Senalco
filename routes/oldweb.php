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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inquilino', 'InquilinoController@index');
Route::get('/inquilino/nuevo', function () {
    return view('inquilino.create');
});
Route::post('/inquilino/save', 'InquilinoController@save');
Route::get('/inquilino/editar/{id}', 'InquilinoController@edit');
Route::post('/inquilino/update/{id}', 'InquilinoController@update');
Route::delete('/inquilino/eliminar/{id}', 'InquilinoController@eliminar'); 


Route::get('/arrendador', 'ArrendadorControlle@index');
Route::get('/arrendador/nuevo', function () {
    return view('arrendador.create');
});
Route::post('/arrendador/save', 'ArrendadorController@save');
Route::get('/arrendador/editar/{id}', 'ArrendadorControlle@edit');
Route::post('/arrendador/update/{id}', 'ArrendadorControlle@update');
Route::delete('/arrendador/eliminar/{id}', 'ArrendadorControlle@eliminar'); 
