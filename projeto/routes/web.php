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
    return view('welcome');
});

Auth::routes();
Route::post('func-login', ['as'=>'funcionario', 'use'=>'Auth\LoginController@loginFunc']);
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin');

Route::get('/indexfunc', 'FuncionarioController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('registerfunc', 'FuncionarioController');

Route::apiResource('registerfunc','FuncionarioController');

Route::resource('requerimento', 'RequerimentoController');

Route::apiResource('requerimento','RequerimentoController');

