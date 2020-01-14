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

Route::resource('/inquilino', 'InquilinoController')->middleware('auth');
Route::get('/inquilinos', 'InquilinoController@buscar');
Route::get('/inquilino/factura/{id}', 'FacturaController@show');

Route::resource('/arrendatario', 'arrendatarioController')->middleware('auth');
Route::get('/arrendatarios', 'arrendatarioController@buscar');

Route::resource('/inmueble', 'InmuebleController')->middleware('auth');
Route::get('/inmuebles', 'InmuebleController@buscar');

Route::resource('/contrato', 'ContratoController')->middleware('auth');
Route::get('/contratos', 'contratoController@buscar');

Route::resource('/factura', 'FacturaController')->middleware('auth');