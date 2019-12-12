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
Route::get('/sobre', function(){
    return view('sobre');
});
Route::get('/contato', function(){
    return view('contato');
});

//Route::get('/', 'RequerimentoController@index');

Auth::routes();
Route::post('func-login', ['as'=>'funcionario', 'use'=>'Auth\LoginController@loginFunc']);
Route::post('/login/admin', 'Auth\FuncController@login')->name('admin');

Route::get('requerimento/func/show/{id}', 'FuncionarioController@show')->name('showreqfunc');
Route::resource('registerfunc', 'FuncionarioController');
Route::apiResource('registerfunc','FuncionarioController');
Route::get('/indexfunc', 'FuncionarioController@index')->name('func');
Route::post('/pesquisarfunc', 'FuncionarioController@search')->name('pesquisarfunc');

Route::resource('requerimento', 'RequerimentoController');
Route::apiResource('requerimento','RequerimentoController');
Route::post('/pesquisar', 'RequerimentoController@search')->name('pesquisar');
Route::post('/redirecionar', 'RequerimentoController@redirecionar')->middleware('auth:funcionario')->name('redirecionar');
Route::post('/reabrir', 'RequerimentoController@reabrir')->middleware('auth:funcionario')->name('reabrir');
Route::post('/resposta', 'RequerimentoController@resposta')->middleware('auth:funcionario')->name('resposta');
Route::post('/contato', 'ContatoController@store')->name('contato');

Route::post('/printpdf', 'CustomController@printpdf')->name('pdf');
